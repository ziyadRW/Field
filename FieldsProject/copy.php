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
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
            rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
        </script>
        <style>
            .item {
                transition: 0.5s ease-in-out;
            }

            .item:hover {
                filter: brightness(80%);
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand mainBG fixed-top">
            <div class="container">
                <a class="navbar-brand mb-0 h1 rounded-3 shadow p-2 bg-light bg-opacity-25" href="#">
                    <img src="411766_1c2bb3d0f20c4b209b5b9b5cba70b462~mv2.webp" style="width: 45px" />
                    Stadiums
                </a>

                <div id="navbarNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="#" class="nav-link active ml-2 position-relative current">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative">Help</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative"></a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link position-relative"></a>
                        </li>
                    </ul>
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
            <div data-mdb-animation="fade-in-down" class="row justify-content-center text-center mb-3  ">
                <h1 class="w-25 bg-light shadow rounded-4  p-4">
                    <?php
                    echo 'Hi ' . $_SESSION["first_name"];
                    ?>
                </h1>
            </div>

            <div id="addStadium" class="row d-flex justify-content-end mb-5 rounded-3 d-none">
                <div class="col-2 d-flex">
                    <button class="btn btn-primary p-3" data-bs-toggle="modal" data-bs-target="#addingStadium">
                        + Add A New Stadium
                    </button>
                </div>
            </div>
            <?php
            if ($_SESSION["account_type"] === "owner") {

                echo "
                <script>
                const tmp = document.querySelector('#addStadium');
                if(tmp.classList.contains('d-none')){
                    tmp.classList.remove('d-none');
                }
                
                </script>
                ";

            } else {
                echo "
                <script>
                const tmp = document.querySelector('#addStadium');
                if(! tmp.classList.contains('d-none')){
                    tmp.classList.add('d-none');
                }
                
                </script>
                ";
            }

            ?>
            <div class="modal fade" id="addingStadium">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 rounded-4 ">
                        <div class="modal-header h3 justify-content-center">Adding a new Stadium</div>
                        <div class="modal-body">
                            <form action="addStadium.php" method="post" novalidate enctype="multipart/form-data">
                                <!-- <div class="input-group mb-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" placeholder="" id="OwnerFirstName" required />
                                        <label for="OwnerFirstName">Owner's first name</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="OwenrLastName" placeholder="" required />
                                        <label for="OwenrLastName">Owner's last name</label>
                                    </div>
                                </div> -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="stadiumName" placeholder=""
                                        name="stadiumName" required />
                                    <label for="stadiumName">Stadium name</label>
                                </div>
                                <hr class="hr">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="stadiumDescription" name="stadiumDescription"
                                        placeholder="" style="height:150px;" required></textarea>
                                    <label for="stadiumDescription">Stadium Description</label>
                                </div>
                                <hr class="hr">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Number of seats:</span>
                                    <input type="number" id="numOfSeats" class="form-control" min="10" max="100"
                                        name="numOfSeats" required>
                                    <span class="input-group-text">seats</span>
                                </div>
                                <div id='reachMaxMinSeats' class="mb-3 alert alert-warning d-none">
                                    <p class="d-none" id="pp1">Sorry, you've reached the minmumm number of seats</p>
                                    <p class="d-none" id="pp2">Sorry, you've reached the maxiumum number of seats</p>
                                </div>
                                <script>
                                    let numOfSeats = document.getElementById(`numOfSeats`);

                                    numOfSeats.addEventListener(`input`, () => {

                                        if (numOfSeats.value == numOfSeats.getAttribute(`max`)) {
                                            ;
                                            let tmp = document.getElementById('reachMaxMinSeats');
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }

                                            tmp = document.getElementById(`pp2`);
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }
                                            tmp = document.getElementById(`pp1`);
                                            if (!tmp.classList.contains('d-none')) {
                                                tmp.classList.add('d-none');
                                            }
                                        }
                                        else if (numOfSeats.value == numOfSeats.getAttribute(`min`)) {

                                            let tmp = document.getElementById('reachMaxMinSeats');
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }
                                            tmp = document.getElementById(`pp1`);
                                            if (tmp.classList.contains('d-none')) {
                                                tmp.classList.remove('d-none');
                                            }
                                            tmp = document.getElementById(`pp2`);
                                            if (!tmp.classList.contains('d-none')) {
                                                tmp.classList.add('d-none');
                                            }
                                        }
                                        else {
                                            let tmp = document.getElementById('reachMaxMinSeats');
                                            if (!tmp.classList.contains('d-none')) {
                                                tmp.classList.add('d-none');
                                            }
                                        }
                                    })
                                </script>

                                <div class=" mb-3">
                                    <label for="stadiumImages" class="form-label">Please insert stadium's
                                        images:</label>
                                    <input type="file" id="stadiumImages" class="form-control" name="stadiumImages[]"
                                        accept=".png, .jpg, .jpeg" required multiple>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if ($_SESSION["account_type"] === "owner") {
                    $query = "SELECT * FROM staduim_info WHERE stadium_owner='$_SESSION[first_name]'";
                } else {
                    $query = "SELECT * FROM staduim_info";
                }
                $result = mysqli_query($conn, $query);

                foreach ($result as $row) {


                    ?>
                    <div class="col-4 mb-5 ">
                        <div class="card shadow" style="cursor:pointer;" data-hello=<?php echo $row['id']; ?>>
                            <img src="uploads/<?php $jsony = json_decode($row['stadium_img_url']);
                            echo $jsony[0]; ?>" class="card-img-top " data-hello=<?php echo $row['id']; ?> alt="" />
                            <div class="card-body " data-hello=<?php echo $row['id']; ?>>
                                <h2 class="card-title text-center " data-hello=<?php echo $row['id']; ?>>
                                    <?php echo $row['stadium_name']; ?>
                                </h2>
                                <div class="card-text " data-hello=<?php echo $row['id']; ?>>
                                    <?php echo $row['stadium_description']; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                } ?>
            </div>
            <div class="modal fade" id="previewStadium">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 rounded-4 ">
                        <div class="modal-header h3 justify-content-center">Preview stadium info</div>
                        <div class="modal-body">
                            <?php



                            $query = "SELECT * FROM staduim_info WHERE id='$_GET[stadiumId]'";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                echo "
    <script>console.log('hi');</script>
    ";
                                // print_r($result);
                            }
                            $row = mysqli_fetch_assoc($result);
                            // print_r($row);
                            /*
                             foreach (json_decode($row['stadium_img_url']) as $img):
                        ?>
                        <img src="uploads/<?php echo $img; if(!isset($firstImg))$firstImg=$img;?>" width=200>
                    <?php endforeach; ?>
                             */
                            ?>
                            <div class="row mb-3  align-items-center justify-content-evenly">
                                <?php
                                foreach (json_decode($row['stadium_img_url']) as $img): ?>
                                    <div class="item  mb-3 d-flex align-items-center bg-light rounded-4 shadow justify-content-center "
                                        style="width:180px; height:180px;">
                                        <a href="uploads/<?php echo $img; ?>" data-fancybox="gallery1" class="fancybox">
                                            <img src="uploads/<?php echo $img; ?>" alt="" width="150px" height="150px"
                                                class="p-2 ">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    Stadium name:
                                </span>
                                <input type="text" class="form-control" disabled
                                    value='<?php echo $row['stadium_name']; ?>' />

                            </div>
                            <hr class="hr">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="stadiumDescription" name="stadiumDescription"
                                    placeholder="" style="height:150px;"
                                    disabled><?php echo $row['stadium_description']; ?></textarea>

                            </div>
                            <hr class="hr">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Number of seats:</span>
                                <input type="number" id="numOfSeats" class="form-control" disabled
                                    value="<?php echo $row['stadium_seats']; ?>">
                                <span class="input-group-text">seats</span>
                            </div>
                            <div class="form-outline form-floating">
                                <input type="text" class="form-control" id="Datepicker" placeholder="" min="" />
                                <label for="Datepicker" class="form-label">Select a date</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script>

            $(document).ready(function () {

                $(function () {
                    $("#Datepicker").datepicker();
                });
            });
            var date = new Date();
            var tmpDate = date.getDate();
            var month = date.getMonth() + 1;
            if (month < 10) {
                month = "0" + month;
            }

            // $(document).ready(function () {
            //     var rejectedDate = '11/25/2023';
            //     $('.datepicker-class').find('.datepicker-day').each(function () {

            //         var date = $(this).attr('data-date');

            //         // Apply green color to approved dates



            //         // Apply red color to rejected dates

            //         if (rejectedDates = date) {

            //             $(this).css('background-color', 'red');

            //         }
            //     })
            // });
        </script>
        <script>
            function sendDataGet(tmp) {
                let tmppp = document.getElementById("subTemp");

                tmppp.setAttribute("value", tmp);
                document.getElementById("subTemp").click();

            }
        </script>
        <form action="" method="get">
            <input type="submit" id="subTemp" name="stadiumId" value="">
        </form>

        <script>

            document.addEventListener('click', (e) => {

                if (e.target.dataset.hello != null) {

                    let ajaxTmp = e.target.dataset.hello;
                    console.log(ajaxTmp);
                    sendDataGet(ajaxTmp);

                    $('#previewStadium').modal('toggle');

                }
            })

        </script>

        <script>
            let form = document.querySelector(`form`);
            form.addEventListener(`submit`, (e) => {
                if (!form.checkValidity()) e.preventDefault();
                form.classList.add(`was-validated`);
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

        <?php if (isset($_GET['stadiumId'])) { ?>
            <script>
                $(window).load(function () {
                    $('#previewStadium').modal('toggle');
                });
            </script>
        <?php } ?>
    </body>

    </html>
    <?php

} else {
    header("location:index.php?error=Please login first!");
    exit();
}
?>