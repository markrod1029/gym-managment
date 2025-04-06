<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "report";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Member Status</h3>
        <p class="text-subtitle text-muted">Dashboard/Member</p>
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
        <div class="card">
            <div class="card-header">
                <table class='table table-striped' id="">
                    <thead>
                        <tr>

                            <th>Fullname</th>
                            <th class="head1 right">Initial Weight</th>
                            <th class="head0 right">Current Weight</th>
                            <th class="head0 right">Plans </th>

                        </tr>
                    </thead>
                    <?php
                    $id = $user['user_id'];
                    $qry = "select * from members where user_id='$id'";
                    $cnt = 1;
                    $query = $conn->query($qry);
                    while ($row = $query->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?></td>
                            <td><?php echo $row['ini_weight'] ?> KG</td>
                            <td><?php echo $row['curr_weight'] ?> KG</td>
                            <td><?php echo $row['plan'] ?> Month/s</td>


                        </tr>


                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                    $id = $user['user_id'];
                    $qry = "SELECT * FROM todo WHERE user_id='$id' AND task_status = 'Done' ";
                    $cnt = 1;
                    $query = $conn->query($qry);
                    while ($row = $query->fetch_assoc()) {
                        $status = '<button class="btn btn-success btn">' . $row["task_status"] . '</button>';



                    ?>
                        <tr>
                            <td><?php echo $cnt ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $status ?></td>
                        </tr>


                    <?php
                        $cnt++;
                    }
                    ?>
                </table>




            </div>
        </div>

    </section>

</div>


<?php include 'layout/footer.php' ?>