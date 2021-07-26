<?php
/**
 * Estimated Reading Time
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

if ( ! function_exists( 'get_reading_time' ) ) {
    /**
     * Return estimated article reading time.
     *
     * @since 1.0
     *
     * @return string
     */
    function get_reading_time() {
        $reading_time   = '';
        $post           = get_post();

        if ( empty( $post ) ) {
            return $reading_time;
        }

        $words      = str_word_count( strip_tags( $post->post_content ) );
        $minutes    = round( $words / 200 );

        $minutes = $minutes < 1 ? 1 : $minutes;

        if ( $minutes < 60 ) {
            $reading_time   = "{$minutes}min";
        } else {
            $hours          = round( $minutes / 60 );
            $reading_time   = "{$hours}h";
        }

        $reading_time = "Read Time <strong>{$reading_time}</strong>";

        return $reading_time;
    }
}

if ( ! function_exists( 'the_reading_time' ) ) {
    /**
     * Display estimated article reading time.
     *
     *  @since 1.0
     */
    function the_reading_time() {
        $reading_time = get_reading_time();

        echo $reading_time;
    }
}