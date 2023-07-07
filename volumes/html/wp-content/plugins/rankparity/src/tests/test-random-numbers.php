<?php

require_once 'vendor/autoload.php';
use WP_Mock\Tools\TestCase;

class RandomNumbersPluginTest extends TestCase {

    public function testGenerateRankparityNumbers() {
        // Simulate the register_rest_route() function
        \WP_Mock::userFunction('register_rest_route')->andReturn(true);

        // Simulate the generate_random_numbers() function
        \WP_Mock::userFunction('generate_random_numbers')->andReturn([1, 2, 3]);

        // Call the function to be tested
        $response = generate_rankparity_numbers();

        // Check if the response is an array
        $this->assertIsArray($response);

        // Check if the 'pairs' and 'odd' keys are present in the response
        $this->assertArrayHasKey('pairs', $response);
        $this->assertArrayHasKey('odd', $response);

        // Check if the 'pairs' and 'odd' arrays are correct
        $this->assertEquals([2], $response['pairs']);
        $this->assertEquals([3, 1], $response['odd']);
    }
}

WP_Mock::setUp();
// Instantiate and execute the test class
$test = new RandomNumbersPluginTest();
$test->testGenerateRankparityNumbers();
WP_Mock::tearDown();


// Run the tests
test_generate_random_numbers();
test_quicksort();
test_partition();
test_swap();
?>