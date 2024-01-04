<?php
if (isset($_POST["submit"])) {
    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"]) && isset($_POST["accountType"]) && isset($_POST["username"])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $firstName = validate($_POST["firstName"]);
        $lastName = validate($_POST["lastName"]);
        $username = validate($_POST["username"]);
        $password = validate($_POST["password"]);
        $confirmPass = validate($_POST["confirmPassword"]);
        $accountType = validate($_POST["accountType"]);
        if (!empty($firstName) && !empty($lastName) && !empty($username) && !empty($password) && !empty($confirmPass) && !empty($accountType)) {
            if ($password == $confirmPass) {
                include "connection.php";
                $sql = "SELECT * FROM users_info WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        header("location:signup.php?error=Username is already exist!");
                        exit();
                    } else {
                        $sql = "INSERT INTO users_info(first_name, last_name, username, password, account_type) VALUES('$firstName', '$lastName', '$username', '$password', '$accountType')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {


                            header("location:index.php?success=Signed-up successfully !");
                            exit();
                        } else {
                            echo "
                            <script> alert('failed');</script>;
                            ";

                        }

                    }
                }

            } else {
                header("location:signup.php?error=Password dosen't match the confirmed password!");
                exit();

            }
        } else {

            header("location:signup.php?error=Check that you've filled all fields correctly");
            exit();
        }


    } else {
        header("location:signup.php?error=Check that you've filled all fields");
        exit();
    }
} else {
    header("location:signup.php?error=Don't try!");
    exit();
}
?>
