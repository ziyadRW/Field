<?php
session_start();

if (isset($_SESSION["username"]) && isset($_POST["reservation_id"])) {
    include("connection.php");

    // Sanitize and get reservation ID from POST data
    $reservationId = mysqli_real_escape_string($conn, $_POST["reservation_id"]);

    
    $query = "DELETE FROM temp_table WHERE id = '$reservationId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Send a success response
        echo json_encode(["success" => true]);
    } else {
        // Send an error response
        echo json_encode(["error" => "Failed to cancel reservation"]);
    }

    exit();
} else {
    // Send an error response if session or reservation ID is not set
    echo json_encode(["error" => "Invalid request"]);
    exit();
}
?>
