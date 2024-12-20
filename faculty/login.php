<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../build/scss/stylde.css">

    <style>
    a {
        color: #0088cc !important;
    }

    a:hover {
        color: #000099 !important;
        text-decoration: underline !important;
    }

    .form-container {
        background: #ecf0f3;
        font-family: 'Nunito', sans-serif;
        padding: 40px 40px 26px;
        border-radius: 20px;
        box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
        min-width: 360px;
    }

    .form-header {
        text-align: center;
    }

    .login-title {
        font-size: 24px;
        font-weight: 700;
        margin: 14px 0 30px;
    }
    </style>
</head>

<?php require_once('../config.php') ?>
<?php require_once('inc/header.php') ?>

<body class="hold-transition login-page bg-purple text-dark" style="background-color: #f4f6f9 !important">
    <script>
    start_loader()
    </script>

    <!-- form starts -->
    <div class="form-wrapper">
        <div class="form-container">

            <div class="form-header">
                <img src="../images/faculty.png" alt="faculty user">
                <h3 class="login-title">Faculty Login</h3>
            </div>

            <form id="flogin-frm" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="email">Faculty ID</label>
                    <input class="form-control" type="text" name="faculty_id" placeholder="F-12345">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="primary-button w-100 mt-2">Login</button>
                <br>

                <div class="mt-5 text-center">
                    <a href="<?php echo base_url ?>">Back To Home</a>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <script>
    $(document).ready(function() {
        end_loader();
    })
    </script>
</body>

</html>