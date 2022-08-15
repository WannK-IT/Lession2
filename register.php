<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PHP Intern Test</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">

    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container w-50">
        <div class="border border-success mt-4 px-5 py-3">
            <div class="nav-header">
                <div class="row">
                    <div class="col-sm-6 d-flex align-items-center">
                        <a href="index.php"><div class="btn btn-white px-3">Home</div></a>
                        <a href="register.php"><div class="btn btn-primary px-3">Register</div></a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <img class="img-fluid" width="70" src="image/lampart-logo.jpg" alt="logo">
                    </div>
                </div>
            </div>

            <div class="content border border-secondary my-4 mx-5">
                <form method="POST" action="" class="m-4">
                    <div class="form-group">
                        <label for="fullname">Full name</label>
                        <input type="text" class="form-control" id="fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm password</label>
                        <input type="password" class="form-control" id="confirm-password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Register</button>

                    <p class="mt-3 text-14">Already have an account ? <a class="text-decoration-none" href="login.php">Login now</a></p>
                </form>
            </div>

            <div class="footer">
                <p class="text-muted pl-5 text-12">Copyright © 2022 - All rights reserved</p>
            </div>
        </div>

    </div>


    <!-- Script -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/65d4d0d692.js"></script>
</body>

</html>