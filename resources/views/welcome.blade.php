<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Kawish Welfare Foundation') }}</title>
    <link rel="apple-touch-icon" href="{{asset('adminTheme/images/logo.png')}}">
    <link rel="shortcut icon" href="{{asset('adminTheme/images/logo.png')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            background-color: #343a40!important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            flex-direction: column;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #343a40;
            color: white;
            position: absolute;
            top: 20px;
        }

        .logo {
            width: 50px; /* Adjust width as needed */
            margin-right: 10px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .circle-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px; /* Adjust spacing between header and circles */
        }

        .circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 10px;
        }

        .circle a {
            text-decoration: none;
            color: white;
        }

        @media (max-width: 768px) {
            

            .circle {
               
                margin: 10px 0;
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="header" style="display: block">
        <div class="logo">
            <img src="{{asset('adminTheme/images/logo.png')}}" alt="Logo">
        </div>
        <div class="title">Kawish Welfare Foundation</div>
    </div>
    <div class="circle-container">
        <div class="circle" style="background-color:#0080a9;">
            <a href="{{url('login/admin')}}" class="btn btn-success">Admin Login</a>
        </div>
        <div class="circle" style="background-color: #af3649;">
            <a href="{{url('login')}}" class="btn btn-primary">User Login</a>
        </div>
        <div class="circle" style="background-color: #57a957;">
            <a href="{{url('login/donor')}}" class="btn btn-warning">Donor Login</a>
        </div>
    </div>
</body>
</html>
