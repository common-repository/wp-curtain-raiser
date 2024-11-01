<?php
/**
 * @package WP_Curtain_Raiser
 * @version 0.6
 */
/*
Plugin Name: Curtain Raiser for Inaugural Ceremony
Plugin URI: http://wordpress.org/plugins/wp-curtain-raiser/
Description: Need Curtain for Inaugural of your website, here's your timesaver.
Author: Team Peenak
Version: 0.6
Author URI: https://www.peenak.com/
License: GPLv2 or later
*/

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;

// Define Argument in url param
function wp_curtain_raiser_query_vars( $qvars ) {
    $qvars[] = 'curtain_ceremony';
    return $qvars;
}
add_filter( 'query_vars', 'wp_curtain_raiser_query_vars' );

// Check if Query Variable exist, Remove if Found. If not removed, if affects Static homepages. 
function wp_curtain_raiser_query_var_check( $request ) {
    if ( isset( $request['curtain_ceremony'] ) ) {
        // Load assets and Remove Query Variable.
        wp_curtain_raiser_assets(); 
        unset( $request['curtain_ceremony'] );
    }
    return $request;
}
add_filter( 'request', 'wp_curtain_raiser_query_var_check' );

function wp_curtain_raiser_assets() {
    wp_enqueue_script( 'wp-curtain-raiser', esc_url( plugin_dir_url( __FILE__ ) . 'js/wp-curtain-raiser-public.js' ), array( 'jquery', 'jquery-effects-core' ), '0.1', true );
    wp_enqueue_style( 'wp-curtain-raiser', esc_url( plugin_dir_url( __FILE__ ) . 'css/wp-curtain-raiser-public.css' ), array(), '0.1', 'all' );

    add_action( 'wp_footer', 'wp_curtain_raiser_public_html' );
}

function wp_curtain_raiser_public_html() {
    ?>
    <div class="leftcurtain">
        <img src="<?php echo esc_url( plugins_url( 'assets/frontcurtain.jpg', __FILE__ ) ); ?>" alt="Left Curtain" />
    </div>
    <div class="rightcurtain">
        <img src="<?php echo esc_url( plugins_url( 'assets/frontcurtain.jpg', __FILE__ ) ); ?>" alt="Right Curtain" />
    </div>
    <a class="rope" href="#">
        <img src="<?php echo esc_url( plugins_url( 'assets/rope.png', __FILE__ ) ); ?>" alt="Curtain Rope" />
    </a>
    <?php
}

?>
