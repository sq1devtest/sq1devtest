<?php
/**
 * Import posts from external API.
 *
 */

if ( !defined( 'WPINC' ) ) {
	die;
}

sq1devtest_sync_posts_admin::get_instance();
class sq1devtest_sync_posts_admin {
    /**
	 * Holds a singleton instance of this class.
	 */
	private static $instance = null;

    /**
	 * @var string
	 */
	private $api_url = 'https://sq1-api-test.herokuapp.com/posts';

    /**
	 * Retrieve a singleton instance of this class.
	 */
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    private function __construct() {
        add_action( 'admin_menu', array( $this, 'posts_menu' ) );
    }

    /**
    * Adds a submenu item to the "Posts" menu in the admin.
    */
    function posts_menu() {
        add_posts_page(
            'Sync Posts',
            'Sync Posts',
            'publish_posts',
            'sq1devtest-sync-posts',
            array( $this, 'sync_posts_admin' )
        );
    }

    function sync_posts_admin() {
        if ( !current_user_can( 'publish_posts' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }

        ?>
        <div class="wrap">
            <h2>Sync Posts</h2>
            <?php $this->sync_posts(); ?>
        </div>
        <?php
    }

    function sync_posts() {
        $this->print_message( "Syncing Posts..." );
        $this->print_message( "Getting posts from: '{$this->api_url}'" );

        $args = array(
            'timeout' => 15
        );
        $request = wp_remote_get( $this->api_url, $args );

        if ( is_wp_error( $request ) ) {
            $this->print_message( "<strong>An error occurred trying to retrieve new posts, please try again later</strong>" );
            $err_msg = $request->get_error_message();
            $this->print_message( "Error: {$err_msg}" );
            return;
        }

        $body = wp_remote_retrieve_body( $request );
        $data = json_decode( $body );

        if ( empty( $data) ) {
            $this->print_message( "<strong>An error occurred trying to retrieve new posts, please try again later</strong>" );
            return;
        }

        $posts_count = count( (array)$data->data );
        $this->print_message( "Posts found: <strong>{$posts_count}</strong>" );

	    foreach( $data->data as $post ) {
            $this->create_post( $post );
	    }

        $this->print_message( "Syncing Posts Completed!" );
    }

    function create_post( $post ) {
        if ( empty( $post ) || empty( $post->title ) ) {
            return;
        }

        $title      = wp_strip_all_tags( $post->title );
        $content    = isset( $post->description ) ? $post->description : '';
        $date       = isset( $post->publication_date ) ? $post->publication_date : '';

        // Check if post exists matching title and publication_date
        $post_exists = post_exists( $title, '', $date );

        if ( $post_exists ) {
            $this->print_message( "Post already exists, skipping. ID: {$post_exists}, Title:'{$title}'" );
            return;
        }

        // Default post_author is the current user ID
        $post_args = array(
            'post_title'    => $title,
            'post_content'  => $content,
            'post_date'     => $date,
            'post_status'   => 'publish',
        );

        $post_id = wp_insert_post( $post_args, true );

        if ( is_wp_error( $post_id ) ) {
            $this->print_message( "<strong>An error occurred trying to publish a new post</strong>" );
            $err_msg = $post_id->get_error_message();
            $this->print_message( "Error: {$err_msg}" );
            return;
        } else {
            $this->print_message( "Successfully created new post. Post ID: <strong>{$post_id}</strong>" );
        }
    }

    function print_message( $message, $isHeading = false ) {
        if ( empty( $message ) ) {
            return;
        }
        $output = $isHeading ? "<h3>{$message}</h3>" : "<p>{$message}</p>";
        echo $output;
    }
}

