<!DOCTYPE html>

<html>

<head>

    <title>Teachers Portal</title>

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #ffffff;
        }
        .sidebar .nav-link:hover {
            background: #495057;
            border-radius: 5px;
        }
        .main-content {
            margin-left: 260px;
            padding: 20px;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>

<body>

  

<div class="container">

    @yield('content')

</div>

   

</body>

</html>