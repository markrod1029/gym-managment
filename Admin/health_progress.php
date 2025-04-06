<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "health";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Health Progress</h3>
        <p class="text-subtitle text-muted">Dashboard/Health</p>
    </div>

    <?php
    include 'action/conn.php';
    $id = $_GET['id'];
    $qry = "select * from members where user_id='$id'";
    $result = mysqli_query($conn, $qry);
    while ($row = mysqli_fetch_array($result)) {
    ?>

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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-primary">Update Progress of Member</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" action="action/member_progress.php" method="POST">
                        <div class="form-body">
                            <div class="row">


                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Full Name</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="fullname" value="<?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?>" placeholder="FullName" readonly>

                                            <div class="form-control-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Initial Weight</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control" value='<?php echo $row['ini_weight']; ?>' name="ini_weight" placeholder="Weight" id="city-id-icon" required>
                                            <div class="form-control-icon">
                                                <i>(kG)</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Current Weight</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control" value='<?php echo $row['curr_weight']; ?>' name="curr_weight" placeholder="Weight" id="city-id-icon" required>
                                            <div class="form-control-icon">
                                                <i>(kG)</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Initial Body Type</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value='<?php echo $row['ini_bodytype']; ?>' name="ini_bodytype" placeholder="BodyType" id="city-id-icon" required>
                                            <div class="form-control-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Current Body Type</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value='<?php echo $row['curr_bodytype']; ?>' name="curr_bodytype" placeholder="BodyType" id="city-id-icon" required>
                                            <div class="form-control-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 d-flex justify-content-end">
                                    <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                                    <button type="submit" name="save" class="btn btn-primary mr-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
    }
        ?>
        </section>

</div>


<?php include 'layout/footer.php' ?>