<?php
include 'random-numbers-plugin.php'; // Include the plugin file

// Test generate_random_numbers() function
$numbers = generate_random_numbers();

// Display the generated numbers
echo "Generated numbers: ";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

// Test quicksort() function
echo "Before sorting: ";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

quicksort($numbers, 0, count($numbers) - 1);

echo "After sorting: ";
foreach ($numbers as $number) {
    echo $number . " ";
}
