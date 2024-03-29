<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .logo {
            max-width: 100px;
            height: auto;
            margin: 20px auto;
        }

        .jumbotron {
            background-color: #F8B600;
            color: #333;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <img src="{{ asset('fundflex.png') }}" alt="Fundflex Logo" class="logo d-block">
            <h1 class="display-4 d-block">Fundflex</h1>
            <p class="lead d-block">Your university's trusted Fund Wallet</p>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title bg-dark p-3 text-white">Hello {{ $data['name'] }}</h5>
                <h3 class="mb-4">
                    <span class="badge bg-dark">{{ $data['message'] }}</span>
                </h3>

                <p class="card-text mt-3">If you didn't perform this action, please report to customer care.</p>
            </div>
        </div>
    </div>
</body>

</html>
