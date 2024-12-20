<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../build/scss/stylde.css">

    <style>
        /* General form styles */
        .form-content {
            max-width: 500px;
            margin: 0 auto;
            background: #ecf0f3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header img {
            width: 50px;
            margin-bottom: 10px;
        }

        .form-header h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }

        .primary-button {
            display: block;
            width: 100%;
            background: #0088cc;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-align: center;
        }

        .primary-button:hover {
            background: #005f99;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input:focus {
            border-color: #0088cc;
            outline: none;
        }

        .text-center {
            text-align: center;
        }

        .accordion {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .accordion-header {
            background: #0088cc;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .accordion-header:hover {
            background: #005f99;
        }

        .accordion-content {
            display: none;
            padding: 15px;
            background: #ecf0f3;
            border-top: 1px solid #ccc;
        }

        .accordion-content.active {
            display: block;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-grid .form-group {
            margin-bottom: 10px;
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
            <div id="login-form" class="form-content">
                <div class="form-header">
                    <img src="../images/student.png" alt="student user">
                    <h3 class="login-title">Student Login</h3>
                </div>

                <form id="slogin-frm" class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="email">Student ID</label>
                        <input class="form-control" type="text" name="student_id" placeholder="1277">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button type="submit" class="primary-button w-100 mt-2">Login</button>
                    <br>

                    <div class="mt-5 text-center">
                        <a href="#" id="show-signup">Sign Up</a> | <a href="<?php echo base_url ?>">Back To Home</a>
                    </div>
                </form>
            </div>
            <div id="signup-form" class="form-content" style="display: none;">
    <div class="form-header">
    <img src="../images/student.png" alt="student user">
        <h3 class="login-title">Sign Up</h3>
    </div>
    <form id="signup-frm" class="form-horizontal" method="post">
        <!-- Accordion Section 1 -->
        <div class="accordion">
            <div class="accordion-header">Personal Information</div>
            <div class="accordion-content">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input class="form-control" type="text" name="student_id" id="student_id" placeholder="1277" required>
                    </div>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" name="firstname" id="firstname" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="middlename">Middle Name</label>
                        <input class="form-control" type="text" name="middlename" id="middlename" placeholder="Middle Name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordion Section 2 -->
        <div class="accordion">
            <div class="accordion-header">Contact Information</div>
            <div class="accordion-content">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input class="form-control" type="text" name="contact" id="contact" placeholder="+92" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input class="form-control" type="text" name="gender" id="gender" placeholder="Gender" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordion Section 3 -->
        <div class="accordion">
            <div class="accordion-header">Security</div>
            <div class="accordion-content">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <button type="button" id="send-otp" class="primary-button mt-2">Send OTP</button>
                </div>
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input class="form-control" type="text" name="otp" id="otp" placeholder="Enter OTP" required>
                </div>
            </div>
        </div>

        <button type="submit" class="primary-button w-100 mt-2">Sign Up</button>
        <div class="mt-5 text-center">
            <a href="#" id="show-login">Back to Login</a>
        </div>
    </form>
</div>

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
        $('.accordion-header').on('click', function() {
            $(this).next('.accordion-content').toggleClass('active');
        });
        // Toggle forms
        $('#show-signup').click(function(e) {
            e.preventDefault();
            $('#login-form').hide();
            $('#signup-form').show();
        });

        $('#show-login').click(function(e) {
            e.preventDefault();
            $('#signup-form').hide();
            $('#login-form').show();
        });
    });
    </script>
</body>

</html>
