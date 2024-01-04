<?php
session_start();
if (isset($_POST['submit'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);
    if (!empty($username) && !empty($password)) {
        include "connection.php";
        $sql = "SELECT * FROM users_info WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_array($result);
                if ($row["username"] === $username && $row["password"] === $password) {
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["first_name"] = $row["first_name"];
                    $_SESSION["last_name"] = $row["last_name"];
                    $_SESSION["account_type"] = $row["account_type"];
                    header("location: homepage.php");
                    exit();
                } else {

                    header("location:index.php?error=The username or password is incorrect");
                    exit();
                }
            } else {
                header("location:index.php?error=The username or password is incorrect");
                exit();
            }

        } else {
            header("location:index.php?error=Connection failed!");
            exit();
        }
    } else {
        header("location:index.php?error=Make sure to enter all required data");
        exit();
    }
} else {

    header('location:index.php?error=Please submit the data');
    exit();
}
?>