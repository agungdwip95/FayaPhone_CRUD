<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">


    <title>Login | FAYA PHONE</title>
  </head>
  <body id="bg-login">

    <div class="container section-utama">
        <div class="row">
          <div class="col-lg-12 col-md-12 text-center user-login-header">
            <h1>Login Form</h1>
            <p>FAYA PHONE</p>
          </div>
        </div>
      
      <form action="" method="POST">
        <div class="row">
          <div class="col-md-4 col-sm-8 col-xs-12 offset-md-4 offset-sm-2 login-image-main text-center">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 user-image-section">
                <img src="img/businessman.png">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 user-login-box">
                <div class="mb-3">
                  <input type="text" name="user" class="form-control" placeholder="User Name" id="usr">
                </div>
                <div class="mb-3">
                  <input type="password" name="pass" class="form-control" placeholder="Password" id="usr">
                </div>
                <input type="submit" id="submit" name="submit" value="Login" class="btn btn-defualt">
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 last-part">
                <p>Not registered?<a href="#"> Create an account</a></p>
              </div>
            </div>
          </div>     
        </div> 
      </form>
      <?php
           if(isset($_POST['submit'])){
            session_start();
            include 'koneksi.php';
                
                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){
                  $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->id_admin;
                  echo "<script>window.location='dashboard.php'</script>";
                }else{
                  echo "<script>alert('Username atau Password Anda Salah!')</script>";
                }

           } 
       ?>
    </div>       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

  </body>
</html>