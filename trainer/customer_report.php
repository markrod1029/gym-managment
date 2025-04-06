<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "report";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Members Report</h3>
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

            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Plan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $cnt = 1;
                    $id = $user['user_id'];
                    $qry = "select * from members where trainer_id ='$id' ";
                    $query = $conn->query($qry);
                    while ($row = $query->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $cnt ?></td>
                            <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?></td>
                            <td><?php echo $row['plan'] ?> Month/s</td>
                            <td><a href="view_progress_report.php?id=<?php echo $row['user_id'] ?>"><button class='btn btn-primary btn'>View Progress Report</button></a></td>
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