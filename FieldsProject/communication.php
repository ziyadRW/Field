<?php
session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["account_type"])) {
    include("connection.php");
    include("header.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle sending a message
        if (isset($_POST["receiver"]) && isset($_POST["message"])) {
            $sender = $_SESSION["username"];
            $receiver = mysqli_real_escape_string($conn, $_POST["receiver"]);
            $message = mysqli_real_escape_string($conn, $_POST["message"]);

            $query = "INSERT INTO messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$message')";
            if (mysqli_query($conn, $query)) {
                // Message inserted successfully
                echo json_encode(['success' => true]);
                exit;
            } else {
                // Error inserting message
                echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
                exit;
            }
        }
    }

    // Fetch messages for the current user
    $currentUser = $_SESSION["username"];
    $query = "SELECT * FROM messages WHERE sender='$currentUser' OR receiver='$currentUser' ORDER BY timestamp DESC";
    $result = mysqli_query($conn, $query);
    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Communication Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <style>
            .justify-end {
                display: flex;
                justify-content: flex-end;
            }

            #logout-btn {
                margin-left: 10px;
            }

            .container {
                margin-top: 80px;
            }

            #messages-container {
                margin-bottom: 20px;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                padding: 15px;
                background-color: #ffffff;
            }

            #message-form {
                margin-top: 20px;
            }

            label {
                margin-right: 10px;
            }

            textarea {
                width: 100%;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand mainBG fixed-top">
            <div class="container">
                <a class="navbar-brand mb-0 h1 rounded-3 shadow p-2 bg-light bg-opacity-25" href="#">
                    <img src="football.webp" style="width: 45px" />
                    Stadiums
                </a>

                <div id="navbarNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="homepage.php" class="nav-link active ml-2 position-relative current">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a href="my_reservations.php" class="nav-link position-relative">My Reservations</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative">Help</a>
                        </li>
                        <!-- Add more navigation items as needed -->
                    </ul>
                </div>

                <div class="justify-end">
                    <button id="logout-btn" class="btn btn-danger h1 shadow">Logout</button>
                    <script>
                        let loggedBtn = document.querySelector('#logout-btn');
                        loggedBtn.addEventListener(`click`, () => {
                            location.href = "logged-out.php";
                        });
                    </script>
                </div>
            </div>
        </nav><br><br><br><br><br>
        <div class="mt-6"></div>
        <div class="container mt-6">
            <h2 class="text-center">Communication Page</h2>

            <!-- Display messages -->
            <div id="messages-container">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p><strong>{$row['sender']}:</strong> {$row['message']} ({$row['timestamp']})</p>";
                }
                ?>
            </div>

            <!-- Form for sending messages -->
            <form id="message-form">
                <div class="mb-3">
                    <label for="receiver" class="form-label">Receiver:</label>
                    <input type="text" class="form-control" id="receiver" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" id="message" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                // Handle form submission
                $("#message-form").submit(function (event) {
                    event.preventDefault();

                    var receiver = $("#receiver").val();
                    var message = $("#message").val();

                    // AJAX request to communicate.php
                    $.ajax({
                        type: 'POST',
                        url: 'communication.php',
                        data: { receiver: receiver, message: message },
                        dataType: 'json',
                        success: function (response) {
                            // Reload the page to update messages
                            location.reload();
                        },
                        error: function () {
                            alert('Error sending message. Please try again.');
                        }
                    });
                });
            });
        </script>
    </body>

    </html>

    <?php
} else {
    header("location:index.php?error=Please login first!");
    exit();
}
?>