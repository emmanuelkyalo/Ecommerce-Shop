<?php
session_start();
$_SESSION["admin"] = "";
$_SESSION["user_id"] = "";
include 'header.php';
include 'databaseconnect.php';
if (isset($_POST["login"])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
    $myemail = @trim(stripslashes($email));
    $mypassword = @trim(stripslashes($mypassword));

    $hashedpassword = md5($mypassword);

    $query = "select * from users where email='$myemail' && password='$hashedpassword' ";

    $res = mysqli_query($conn, $query);

    while ($row3 = mysqli_fetch_array($res)) {

        $_SESSION["admin"] = $row3["email"];

        $query = "select * from users where email='$myemail'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($res);

        if ($row["access"] != 1) {
            ?>
            <script type="text/javascript">
                alert("Account access denied");
                window.location = "login.php";
            </script>

            <?php
            }

            $_SESSION["user_id"] = $row["user_id"];
            ?> 

            <script type="text/javascript">
                 alert("Success");
                window.location = "dashboard.php";
            </script>

        <?php }
        ?>
        <script type = "text/javascript">
            alert("Incorrect details");

        </script>
        <?php
    }
    ?>

?>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" >
                    </div>
                    <div class="form-group">
                        <div class="form-row center">
                            <button class="btn btn-primary" type="submit" name="login">Log in</button>
                        </div
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.php">Register an Account</a>
                    <a class="d-block small" href="forgot_password.php">Forgot Password?</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
