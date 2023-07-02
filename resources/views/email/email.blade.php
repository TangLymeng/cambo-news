<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
        }

        p {
            margin-bottom: 10px;
            color: #666666;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3085d6;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .button:hover {
            background-color: #2574b9;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="{{ asset('uploads/logo.png') }}" alt="Logo">
    </div>
    <h1>Email Title</h1>
    <p>{!! $body !!}</p>
    <p>
        If you have any questions or need further assistance, please feel free to contact us.
    </p>
    <p>
        Thank you for your support!
    </p>
    <p>
        Best regards,
        Your Cambo-News Team
    </p>
    <p>
        <a href="https://mengs.me/" class="button">Visit Website</a>
    </p>
</div>
</body>
</html>
