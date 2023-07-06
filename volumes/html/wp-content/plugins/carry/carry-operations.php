<?php
/**
 * Plugin Name: Carry Endpoint
 * Description: Custom endpoint to calculate carry operations
 */

// Register the custom endpoint
add_action('rest_api_init', function () {
    register_rest_route('operation', '/carry', array(
        'methods' => 'POST',
        'callback' => 'calculate_carry_operations',
    ));
});

// Callback function to handle the request
function calculate_carry_operations($request) {
    $params = $request->get_json_params();

    // Check if 'term1' and 'term2' parameters are present in the request body
    if (isset($params['term1']) && isset($params['term2'])) {
        $term1 = (int) $params['term1'];
        $term2 = (int) $params['term2'];

        // Calculate the number of carry operations
        $carryOperations = 0;
        $carry = 0;

        while ($term1 > 0 || $term2 > 0) {
            $digit1 = $term1 % 10;
            $digit2 = $term2 % 10;
            $sum = $digit1 + $digit2 + $carry;

            if ($sum >= 10) {
                $carryOperations++;
                $carry = 1;
            } else {
                $carry = 0;
            }

            $term1 = (int) ($term1 / 10);
            $term2 = (int) ($term2 / 10);
        }

        // Return the response as JSON
        return rest_ensure_response(array(
            'carryOperations' => $carryOperations,
        ));
    } else {
        // If the parameters are not present, return an error
        return new WP_Error('missing_parameters', 'The term1 and term2 parameters are required.', array('status' => 400));
    }
}
