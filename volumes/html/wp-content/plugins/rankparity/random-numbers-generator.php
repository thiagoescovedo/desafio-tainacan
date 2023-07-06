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
        'permission_callback' => '__return_true',
    ) );
}

add_action( 'rest_api_init', 'register_rankparity_endpoint' );

// Callback function for the API endpoint
function generate_rankparity_numbers() {
    $numbers = generate_random_numbers();
    $pairs = array();
    $odd = array();

    // Separate the numbers into pairs and odds
    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            $pairs[] = $number;
        } else {
            $odd[] = $number;
        }
    }

    // Sort the pairs in ascending order using Quicksort
    quicksort($pairs, 0, count($pairs) - 1);

    // Sort the odds in descending order using Quicksort
    quicksort($odd, 0, count($odd) - 1);
    $odd = array_reverse($odd);

    // Prepare the response
    $response = array(
        'pairs' => $pairs,
        'odd' => $odd,
    );

    return $response;
}

// Helper function to generate random numbers
function generate_random_numbers() {
    $numbers = array();
    $count = 0;

    // Generate 50 random numbers
    while ($count < 50) {
        $number = rand(1, 200);
        $numbers[] = $number;
        $count++;
    }

    return $numbers;
}

// Quicksort algorithm implementation
function quicksort(&$array, $low, $high) {
    if ($low < $high) {
        $pivotIndex = partition($array, $low, $high);
        quicksort($array, $low, $pivotIndex - 1);
        quicksort($array, $pivotIndex + 1, $high);
    }
}

function partition(&$array, $low, $high) {
    $pivot = $array[$high];
    $i = $low - 1;

    for ($j = $low; $j < $high; $j++) {
        if ($array[$j] < $pivot) {
            $i++;
            swap($array, $i, $j);
        }
    }

    swap($array, $i + 1, $high);
    return $i + 1;
}

function swap(&$array, $i, $j) {
    $temp = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $temp;
}

// Include the interface file
function include_rankparity_interface() {
    include plugin_dir_path( __FILE__ ) . 'random-numbers-interface.php';
}

// Register a shortcode to display the interface
function register_rankparity_shortcode() {
    add_shortcode( 'rankparity', 'display_rankparity_interface' );
}
add_action( 'init', 'register_rankparity_shortcode' );

// Include the interface file
include_rankparity_interface();
