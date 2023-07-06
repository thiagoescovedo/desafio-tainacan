<?php
function display_rankparity_interface() {
    ob_start(); ?>

    <div id="rankparity-interface">
        <button style="width: 200px; height: 50px" id="generate-numbers">Generate Numbers</button>
        <div id="numbers-result"></div>
    </div>

    <script>
        // Execute the following code once the DOM content has finished loading
        document.addEventListener('DOMContentLoaded', function() {
            var generateButton = document.getElementById('generate-numbers');
            var numbersResult = document.getElementById('numbers-result');

            // Attach an event listener to the "Generate Numbers" button
            generateButton.addEventListener('click', function() {
                // Fetch random numbers from the server
                fetch('/wp-json/generator/randomnumbers/rankparity')
                    .then(response => response.json())
                    .then(data => {
                        var pairs = data.pairs.join(', ');
                        var odd = data.odd.join(', ');

                        // Display the generated numbers in the HTML
                        numbersResult.innerHTML = `
                         <p>Pairs: ${pairs}</p>
                         <p>Odd: ${odd}</p>
                     `;
                    })
                    .catch(error => {
                        // Handle any errors that occur during the fetch request
                        console.error('Error fetching numbers:', error);
                        numbersResult.innerHTML = 'Error fetching numbers. Please try again.';
                    });
            });
        });
    </script>

    <?php
    return ob_get_clean();
}
?>
