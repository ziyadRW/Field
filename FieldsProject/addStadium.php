<?php
session_start();
if (isset($_POST['submit'])) {
    if (isset($_POST['numOfSeats']) && isset($_POST['stadiumDescription']) && isset($_POST['stadiumName'])) {
        $stadiumName = $_POST['stadiumName'];
        $stadiumDesc = $_POST['stadiumDescription'];
        $stadiumNumOfSeats = $_POST['numOfSeats'];
        $stadiumCountry = $_POST['countryName'];
        $stadiumCity = $_POST['cityName'];
        $stadiumStreet = $_POST['street'];
        if (
            !empty($stadiumName) && !empty($stadiumNumOfSeats) && !empty($stadiumDesc)
            && !empty($stadiumCity) && !empty($stadiumCountry) && !empty($stadiumStreet)
        ) {
            include "connection.php";
            $totalFiles = count($_FILES['stadiumImages']['name']);
            $filesArray = array();
            for ($i = 0; $i < $totalFiles; $i++) {
                print($i);
                $imageName = $_FILES['stadiumImages']['name'][$i];
                $tmpName = $_FILES['stadiumImages']['tmp_name'][$i];
                $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                $newImageName = uniqid() . '.' . $imageExt;
                $imageUploadPath = 'uploads/' . $newImageName;
                move_uploaded_file($tmpName, $imageUploadPath);
                $filesArray[] = $newImageName;
            }
            $filesArray = json_encode($filesArray);
            $sql = "INSERT INTO staduim_info(stadium_owner, stadium_name, stadium_description, stadium_seats, stadium_img_url, stadium_country, stadium_city, stadium_street) VALUES('$_SESSION[first_name]', '$stadiumName', '$stadiumDesc', '$stadiumNumOfSeats', '$filesArray', '$stadiumCountry', '$stadiumCity', '$stadiumStreet')";
            $result = mysqli_query($conn, $sql);

            header("location: homepage.php");
            exit();
        }
    }
} else {
    header('loaction: homepage.php');
    exit();
}

?>