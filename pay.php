<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Tax Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="" rel="stylesheet">
    <style>
        body {background-color: #8296c8;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<center>
    <img class="slide"src="image4.jpeg">
<body class="bg-gray-100 p-6 rounded-lg">
    <div class="container max-w-md mx-auto bg-white shadow-md p-8 rounded-lg">
        <h1 class="text-2xl font-semibold text-blue-600 text-center mb-6">Online Tax Payment</h1>

        <form id="taxForm" class="space-y-4">
            <div>
                <label for="treasurerName" class="block text-gray-700 text-sm font-bold mb-2">Treasurer's Name:</label><br><br>
                <input type="text" id="treasurerName" name="treasurerName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <div id="treasurerNameError" class="text-red-500 text-xs italic" style="display: none;"></div>
            </div>

            <div>
                <label for="taxType" class="block text-gray-700 text-sm font-bold mb-2">Type of Tax:</label><br><br>
                <select id="taxType" name="taxType" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled selected>Select Tax Type</option>
                    <option value="land">Land Tax</option>
                    <option value="building">Building Tax</option>
                    <option value="business">Business Tax</option>
                </select>
                <div id="taxTypeError" class="text-red-500 text-xs italic" style="display: none;"></div>
            </div>

            <div>
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount to Pay (RWF):</label><br><br>
                <input type="text" id="amount" name="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" readonly value="0">
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Pay Tax</button>
        </form>

        <div id="messageArea" class="mt-6 text-center font-semibold text-gray-800"></div>
    </div>

    <script>
        document.getElementById('taxForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission to prevent page reload

            // Reset error messages
            document.getElementById('treasurerNameError').style.display = 'none';
            document.getElementById('taxTypeError').style.display = 'none';
            document.getElementById('messageArea').textContent = ''; // Clear previous messages

            // Get form values
            const treasurerName = document.getElementById('treasurerName').value.trim();
            const taxType = document.getElementById('taxType').value;

            // Validate inputs
            let hasErrors = false;

            if (!treasurerName) {
                document.getElementById('treasurerNameError').textContent = 'Please enter the treasurer\'s name.';
                document.getElementById('treasurerNameError').style.display = 'block';
                hasErrors = true;
            }

            if (!taxType) {
                document.getElementById('taxTypeError').textContent = 'Please select the type of tax.';
                document.getElementById('taxTypeError').style.display = 'block';
                hasErrors = true;
            }

            if (hasErrors) {
                return; // Stop processing if there are errors
            }

            // Calculate tax amount (replace with your actual logic)
            let amount = 0;
            switch (taxType) {
                case 'land':
                    amount = 50000; // Example amount
                    break;
                case 'building':
                    amount = 75000; // Example amount
                    break;
                case 'business':
                    amount = 100000; // Example amount
                    break;
                default:
                    amount = 0;
            }

            // Update the amount field
            document.getElementById('amount').value = amount;

            // Display success message
            document.getElementById('messageArea').textContent = `Tax payment of ${amount} RWF for ${taxType} is processed for Treasurer ${treasurerName}.`;
            document.getElementById('messageArea').style.color = 'brown';
        });
    </script></center>
</body>
</html>
