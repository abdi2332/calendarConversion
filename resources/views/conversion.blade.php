<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        form h2 {
            margin-top: 0;
        }

        input[type="date"],
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        div {
            font-size: 1.2em;
            color: #007bff;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Conversion App</h1>
    
    <h2>Gregorian to Ethiopian</h2>
    <form id="gregorian-to-ethiopian-form">
        <input type="date" name="date" required>
        <button type="submit">Convert</button>
    </form>
    <div id="ethiopian-date"></div>
    
    <h2>Ethiopian to Gregorian</h2>
    <form id="ethiopian-to-gregorian-form">
        <input type="text" name="date" placeholder="YYYY-MM-DD" required>
        <button type="submit">Convert</button>
    </form>
    <div id="gregorian-date"></div>
    
    <h2>ETB to USD</h2>
    <form id="etb-to-usd-form">
        <input type="number" name="amount" step="0.01" required>
        <button type="submit">Convert</button>
    </form>
    <div id="usd-amount"></div>
    
    <h2>USD to ETB</h2>
    <form id="usd-to-etb-form">
        <input type="number" name="amount" step="0.01" required>
        <button type="submit">Convert</button>
    </form>
    <div id="etb-amount"></div>

    <script>
        document.getElementById('gregorian-to-ethiopian-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch('/gregorian-to-ethiopian', {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            const data = await response.json();
            document.getElementById('ethiopian-date').innerText = `Ethiopian Date: ${data.ethiopian_date}`;
        });

        document.getElementById('ethiopian-to-gregorian-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch('/ethiopian-to-gregorian', {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            const data = await response.json();
            document.getElementById('gregorian-date').innerText = `Gregorian Date: ${data.gregorian_date}`;
        });

        document.getElementById('etb-to-usd-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch('/etb-to-usd', {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            const data = await response.json();
            document.getElementById('usd-amount').innerText = `USD Amount: ${data.usd_amount}`;
        });

        document.getElementById('usd-to-etb-form').addEventListener('submit', async (event) => {
            event.preventDefault();
            const formData = new FormData(event.target);
            const response = await fetch('/usd-to-etb', {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            const data = await response.json();
            document.getElementById('etb-amount').innerText = `ETB Amount: ${data.etb_amount}`;
        });
    </script>
</body>
</html>
