<?php
include 'databaseconnect.php';
if (isset($_POST["register"])) {

    $firstname = $_POST["first_name"];
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = $_POST["last_name"];
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $email = $_POST["email"];

    $email = mysqli_real_escape_string($conn, $email);
    $password = $_POST["password"];
    $password = mysqli_real_escape_string($conn, $password);
    $confirm_password = $_POST["confirm_password"];
    $confirm_password = mysqli_real_escape_string($conn, $confirm_password);
    $display_name = $_POST["display_name"];
    $display_name = mysqli_real_escape_string($conn, $display_name);

    if ($password == $confirm_password) {
        if (strlen($password) < 6) {
            ?>
            <script>
                alert('Password too short');
                history.back();


            </script>
            <?php
        } else {
            $password = md5($password);

            $query = "insert into users(first_name,last_name,email,password,display_name)"
                    . "values('$firstname','$lastname','$email','$password','$display_name')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                ?>

                <script>
                    alert('Succesfully created a seller account');
                    window.location = "login.php";


                </script>
            <?php } else {
                ?>
                <script>
                    alert(<?php echo mysqli_error($conn); ?>);
                    window.location = "login.php";


                </script>
                <?php
            }
        }
    } else {
        ?>
        <script>
            alert('The passwords you entered do no match');
            history.back();


        </script>
        <?php
    }
}
?>
