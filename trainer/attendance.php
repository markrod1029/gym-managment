<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "attendance";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Attendace List</h3>
    <p class="text-subtitle text-muted">Dashboard/Attendace</p>
  </div>
  <?php
  if (isset($_SESSION['error'])) {
    echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4 class ='text-white'> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
    unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
    echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4 class ='text-white'> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
    unset($_SESSION['success']);
  }
  ?>

  <section class="section">
    <div class="card ">
      <div class="card-header">

      </div>
      <div class="card-body w-75 mx-auto">


        <form id="attendance" action="action/check_attendance.php" method="POST">

          <div class="form-group">
            <div class="col-12">
              <select class="form-control" name="status">
                <option value="Time_In">Time In</option>
                <option value="Time_Out">Time Out</option>
              </select>
            </div>
          </div>




          <div class="form-group has-feedback">
            <input type="text" class="form-control input-lg" id="employee" name="username" required>
            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
          </div>

          <div class="row mt-3">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
          </div>
        </form>

        <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
        </div>
        <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
        </div>



      </div>
    </div>

  </section>

</div>


<?php include 'layout/footer.php' ?>