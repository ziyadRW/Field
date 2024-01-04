<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>

<body class="wrapper">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row rounded-5 shadow p-4 bg-white bg-opacity-75" style="width: 500px">
      <form action="checkLogin.php" method="post" novalidate >
        <div
          class="featured-image d-flex flex-column justify-content-center align-items-center mb-3 mainBG p-2 rounded-4 ">
          <div class=" rounded-3 p-2 shadow bg-light bg-opacity-25 d-flex  justify-content-center align-items-center">
            <img src="football.webp" style="width: 65px" />
            <h1>Stadiums</h1>
          </div>
        </div>
        <div id="alert" class="alert alert-danger text-center d-none">
          <?php
          if (isset($_GET['error'])) {
            echo "
                  <script>
                  const tmp = document.getElementById('alert');
                  if(tmp.classList.contains('d-none')){
                    tmp.classList.remove('d-none');
                  }
                  </script>
                  ";
            echo $_GET['error'];
          } else {
            echo "
                  <script>
                  const tmp = document.getElementById('alert');
                  if(! tmp.classList.contains('d-none')){
                    tmp.classList.add('d-none');
                  }
                  </script>
                  ";
          }
          ?>
        </div>
        <div id="alertSss" class="alert alert-success text-center d-none">
          <?php
          if (isset($_GET['success'])) {
            echo "
                  <script>
                  const temp = document.getElementById('alertSss');
                  if(temp.classList.contains('d-none')){
                    temp.classList.remove('d-none');
                  }
                  </script>
                  ";
            echo $_GET['success'];
          } else {
            echo "
                  <script>
                  const temp = document.getElementById('alertSss');
                  if(! temp.classList.contains('d-none')){
                    temp.classList.add('d-none');
                  }
                  </script>
                  ";
          }
          ?>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-white">@</span>
          <div class="form-floating">
            <input id="username" name="username" type="text" class="form-control bg-light fs-6" placeholder=""
              required />
            <label for="username">username</label>
          </div>
        </div>
        <div class="form-floating mb-3">
          <input id="password" name="password" type="password" class="form-control bg-light fs-6" placeholder=""
            required />
          <label for="password">password</label>
        </div>
        <div class="input-group d-flex justify-content-center">
          <input type="submit" name="submit" value="Sign in" class="btn btn-primary w-100 fs-5" />
        </div>
      </form>
      <div class="mt-3">
        You don't have an account? <a href="signup.php">Sign up now!</a>
      </div>
    </div>
  </div>
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
</body>

</html>