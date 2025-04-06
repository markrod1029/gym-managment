<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "announce";
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
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Fullname</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $qry = "SELECT *, members.user_id AS cid, attendance.id AS attid FROM attendance 
                    LEFT JOIN members ON members.user_id=attendance.user_id ORDER BY attendance.curr_date 
                    DESC, attendance.time_in DESC";
                    $cnt = 1;
                    $query = $conn->query($qry);
                    while ($row = $query->fetch_assoc()) { ?>

                        <tr>
                            <td><?php echo $cnt ?></td>
                            <td><?php echo $row['curr_date'] ?></td>
                            <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?></td>
                            <td><?php echo $row['time_in'] ?></td>
                            <td><?php echo $row['time_out'] ?></td>




                            <td>


                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to remove this Report?')" href="action/delete_attendance.php?id=<?php echo $row['attid'] ?>">Delete</a>

                                    </div>
                                </div>
                                <?php
                                ?>
                                </tbody>
                            <?php $cnt++;
                        } ?>

                </table>
            </div>
        </div>

    </section>

</div>


<?php include 'layout/footer.php' ?>