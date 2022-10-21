<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>XSHOP ADMIN LOGIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
    }

    .form-group.invalid .form-control {
      border-color: #f33a58;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">ADMIN XSHOP</h5>
            <form id="form-1">
              <div class="form-floating form-group mb-3">
                <input type="text" name="username" class="form-control" id="username" placeholder="@username">
                <label for="floatingInput">Username</label>
                <div class="form-message text-danger mt-2"><br></div>
              </div>
              <div class="form-floating form-group mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <div class="form-message text-danger mt-2"><br></div>
              </div>
              <div class="d-grid mt-5">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" id="btn_login_admin" type="button" name="sign_in_admin">Sign
                  in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="js/validate.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Validator({
        form: '#form-1',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
          Validator.isRequired('#username', 'Vui lòng nhập username'),
          Validator.isRequired('#password', 'Vui lòng nhập passwword'),
          Validator.minLength('#username', 6),
          Validator.minLength('#password', 6)
        ]
      })
    });

    $(document).ready(function() {
      $("#btn_login_admin").click(function(e) {

        var username = $("#username").val();
        var password = $("#password").val();
        if (username == '' && password == '') {
          alert("Please enter a username and password");
        } else {
          var dataString = 'data=' + username + '&password=' + password;
          $.ajax({
            type: "POST",
            url: 'sign_in',
            data: dataString,
            success: function() {
              alert('Đăng nhập thành công');
              location.href = 'admin.php';
            }
          });
        }
      });
    });
  </script>
</body>

</html>