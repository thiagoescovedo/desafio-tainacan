<?php
/**
 * Plugin Name: Random Numbers Plugin
 * Description: Generates and classifies random numbers.
 */

// Create the endpoint for the API
function register_rankparity_endpoint() {
    register_rest_route( 'generator/randomnumbers', '/rankparity', array(
        'methods' => 'GET',
        'callback' => 'generate_rankparity_numbers',
    ) );
}
add_action( 'rest_api_init', 'register_rankparity_endpoint' );

