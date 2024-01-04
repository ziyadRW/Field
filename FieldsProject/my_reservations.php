<?php
session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["first_name"]) && isset($_SESSION["last_name"]) && isset($_SESSION["account_type"])) {
    include("connection.php");
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Reservations</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

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
                            <a href="mymsg.php" class="nav-link position-relative"></a>
                        </li>
                        <li class="nav-item active">
                            <a href="communication.php" class="nav-link position-relative">chat</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative"></a>
                        </li>
                    </ul>
                    <form action="search.php" method="POST" id="searchform">
                        <div class="input-group">
                            <input id="searchtxt" name="search" pattern=".*\S.*" placeholder="Search.." required
                                class="form-control">
                            <button name="submit-search" type="submit" class="input-group-text" style="border-radius:5px;">
                                <span class="material-symbols-outlined"> search </span>
                            </button>
                            <script>
                                let searchTemp = document.querySelector(".search-btn");
                                searchTemp.onsubmit = () => {
                                    location.href = "search.php";
                                };
                            </script>
                        </div>
                    </form>

                </div>
                <div class="justify-end">
                    <button id="logout-btn" class="btn btn-danger h1 shadow  ">Logout</button>
                    <script>
                        let loggedBtn = document.querySelector('#logout-btn');
                        loggedBtn.addEventListener(`click`, () => {
                            location.href = "logged-out.php"

                        });

                    </script>
                </div>
            </div>
        </nav>


        <div class="container mt-6">
            <div class="row">
                <h2 class="text-center">My Reservations</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Stadium Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT temp_table.*, staduim_info.stadium_name
                                  FROM temp_table
                                  JOIN staduim_info ON temp_table.stadium_id = staduim_info.id
                                  WHERE temp_table.stadium_renter='$_SESSION[username]'";
                        $result = mysqli_query($conn, $query);

                        foreach ($result as $row) {
                            $tempValue = json_decode($row['tmpVal']);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['stadium_name']; ?>
                                </td>
                                <td>
                                    <?php echo $tempValue[0]; ?>
                                </td>
                                <td>
                                    <button class="btn btn-danger cancelReservationBtn" data-toggle="modal"
                                        data-target="#confirmationModal" data-reservation-id="<?php echo $row['id']; ?>">
                                        Cancel Reservation
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>

                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel this reservation?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmCancelBtn" data-toggle="modal"
                            data-target="#success_tic">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div class="modal fade" id="success_tic" tabindex="-1" role="dialog" aria-labelledby="success_tic_Label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="page-body">
                        <div class="alert alert-success text-centerd p-3">
                            <h3>your reservation has been cancelled</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Bootstrap and custom scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                $('.cancelReservationBtn').on('click', function () {
                    var reservationId = $(this).data('reservation-id');
                    $('#confirmCancelBtn').data('reservation-id', reservationId);

                    // Show the confirmation modal
                    $('#confirmationModal').modal('show');
                });

                $('#confirmCancelBtn').on('click', function () {
                    var reservationId = $(this).data('reservation-id');

                    // AJAX request to cancel_reservation.php
                    $.ajax({
                        type: 'POST',
                        url: 'cancel_reservation.php',
                        data: { reservation_id: reservationId },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                // Cancellation was suc cessful
                                // Close the modal and optionally remove the row from the table
                                $('#confirmationModal').modal('hide');
                                $('#success_tic').modal('show')
                                // Example: $('#reservationRow_' + reservationId).remove();
                                setTimeout(function () {
                                    location.reload();
                                }, 1500);
                            } else {
                                // Show an error message if cancellation fails
                                alert('Failed to cancel reservation. Please try again.');
                            }
                        },
                        error: function () {
                            // Show an error message if the AJAX request fails
                            alert('Error during cancellation. Please try again.');
                        }
                    });
                });
            });
        </script>

    </body>

    </html>

    </body>

    </html>

    <?php
} else {
    header("location:index.php?error=Please login first!");
    exit();
}
?>