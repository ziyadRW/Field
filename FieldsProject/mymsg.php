<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
    integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


  <nav class="navbar navbar-expand mainBG fixed-top">
    <div class="container">
      <a class="navbar-brand mb-0 h1 rounded-3 shadow p-2 bg-light bg-opacity-25" href="homepage.php">
        <img src="football.webp" style="width: 45px" />
        Stadiums
      </a>

      <div id="navbarNav" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a href="homepage.php" class="nav-link active ml-2 position-relative current">Home</a>
          </li>
          <li class="nav-item active">
            <a href="mymsg.php" class="nav-link position-relative">Help</a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link position-relative"></a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link position-relative"></a>
          </li>
        </ul>
        <!--                         <form action="" method="POST" class="search-bar" id="searchform">
                            <input id="searchtxt" name="search" pattern=".*\S.*" placeholder="Search.." required>
                             <button class="search-btn" name="submit-search" type="submit">
                                <span class="material-symbols-outlined"> search </span>
                            </button>
                        </form>
 -->
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

  <br><br><br>
  <!-- page Container -->
  <div class="container">
    <div class="row">
      <hr>
      <div class="col-md-12">
        <hr>
        <h1 class="text-center" style="color: #79f266;">Messages</h1>

        <button class="btn btn-danger" style="background-color: #79f266; border-color: #79f266;" data-toggle="modal"
          data-target="#msgmodal">Send Message</button>
        <hr />
        <div style="overflow-y: scroll; height:300px ;">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Message content</th>
                <th>Message is from</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>


            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>


  <!-- Modal Delete-->
  <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Stadium</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want delete this Message?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="" id="dellink" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>


  <!-- msg modal -->
  <div class="modal fade" id="msgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="../php/msg.php">

            <div class="form-group">
              <label for="my-input">To</label>
              <select class="form-control" name="to" id="">

              </select>
            </div>
            <input type="hidden" name="from" value="">
            <div class="form-group">
              <label for="my-input">Message</label>
              <textarea class="form-control" name="msg" id="" cols="30" rows="6"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="sendmsg">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
  <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const msg = urlParams.get('msg');
    if (msg != undefined) {
      alert(msg);
    }


    function delres(id) {
      document.getElementById("dellink").href = "../php/msg.php?delete=" + id;
    }
  </script>
</body>

</html>