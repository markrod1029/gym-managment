<?php
  session_start();


  if(isset($_SESSION['admin'])){
    header('location:student/home.php');
  }




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="dist/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Metamorph Fitness GYM</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>

    
    <section class="login-content">
      <div class="logo">
        <h1>Metamorph Fitness GYM</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="login_process.php" method="post">
          <h3 class="login-head">SIGN IN</h3>
        


          
<?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
           
          <div class="form-group">
            <label class="control-label">EMAIL </label>
            <input class="form-control" name="email" id="email" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
      
  <!--             <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> -->
            </div>
          </div>
          <div class="form-group btn-container">
           
            <input type="submit" name="login" id="submit" value="SIGN IN" class="btn btn-secondary btn-block mb-3" style="background:#716D6E; border-color:#716D6E; font-size:18px;">
          </div>
      </form >

       
        
      </div>
      </div>
    </section>


  </body>
</html>



<style>

  .material-half-bg .cover {
  background-color: #716D6E;
  height: 50vh;
}
  .login-content .logo {
  margin-bottom: 40px;
  color: #fff;
}

.login-content .logo h1 {
  font-size: 52px;
  font-weight: 400;
}

.lockscreen-content .logo {
  margin-bottom: 40px;
  color: #fff;
}

.lockscreen-content .logo h1 {
  font-size: 52px;
  font-weight: 400;
}


.login-content .login-box {
  position: relative;
  min-width: 450px;
  min-height: 390px;
  background-color: #fff;
  -webkit-box-shadow: 0px 29px 147.5px 102.5px rgba(0, 0, 0, 0.05), 0px 29px 95px 0px rgba(0, 0, 0, 0.16);
          box-shadow: 0px 29px 147.5px 102.5px rgba(0, 0, 0, 0.05), 0px 29px 95px 0px rgba(0, 0, 0, 0.16);
  -webkit-perspective: 800px;
          perspective: 800px;
  -webkit-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
}

.login-content .login-box .login-head {
  margin-top: 0;
  margin-bottom: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid #ddd;
  text-align: center;
}

.login-content .login-box label {
  color: #666;
  font-weight: 700;
}

.login-content .login-box .utility {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding: 1px;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.form-control:focus {
  color: #495057;
  background-color: #FFF;
  border-color: #716D6E;
  outline: 0;
  -webkit-box-shadow: none;
          box-shadow: none;
}



  </style>