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
    <div class="row rounded-5 bg-white p-3 shadow box-area bg-opacity-75">
      <div
        class="col-md-6 left-box rounded-4 d-flex justify-content-center align-items-center flex-column shadow mainBG">
        <div class="featured-image mb-3">
          <img src="football.webp" class="img-fluid" style="width: 250px" alt="" />
        </div>
        <p class="fs-3">Join Us Now !</p>
        <small class="mb-3 c-white fs-5">A huge opprtunity is waiting you!</small>
      </div>

      <div class="col-md-6 right-box">
        <div class="row align-items-center">
          <div class="header-text mb-2 text-center">
            <p class="fs-3">Hello !</p>
            <p class="fs-5">We Are So Excited For Your Contribution !</p>
          </div>
          <form action="check.php" method="post" novalidate>
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
            <div class="input-group mb-3">
              <div class="form-floating">
                <input id="firstName" name="firstName" type="text" class="form-control bg-light" placeholder=""
                  required />
                <label for="firstName">First Name</label>
              </div>
              <div class="form-floating">
                <input id="lastName" name="lastName" type="text" class="form-control bg-light" placeholder=""
                  required />
                <label for="lastName">Last Name</label>
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text bg-white">@</span>
              <div class="form-floating">
                <input id="username" name="username" type="text" class="form-control bg-light fs-6" placeholder=""
                  required />
                <label for="username">Username</label>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input id="password" name="password" type="password" class="form-control bg-light fs-6" placeholder=""
                required />
              <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
              <input id="confirmPassword" name="confirmPassword" type="password" class="form-control bg-light fs-6"
                placeholder="" required />
              <label for="confirmPassword">Confirm password</label>
            </div>

            <div class="form-check mb-1">
              <input type="radio" class="form-check-input" value="owner" name="accountType" id="check1" required />
              <label for="check1" class="form-check-label">Owner</label>
            </div>


            <div class="form-check mb-4">
              <input type="radio" class="form-check-input" value="customer" name="accountType" id="check2" required />
              <label for="check2" class="form-check-label">Coustomer</label>
            </div>

            <div class="mb-3">
              <input type="submit" name="submit" class="btn btn-primary w-100 fs-5" value="Sign Up" />
            </div>
          </form>
          <div class="mb-3">
            You're already have an account?
            <a href="index.php">Login here</a>
          </div>
        </div>
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