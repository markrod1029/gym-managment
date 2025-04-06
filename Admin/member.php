<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "members";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Member List</h3>
    <p class="text-subtitle text-muted">Dashboard/Member</p>
  </div>


  <section class="section">


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

    <div class="card">
      <div class="card-header">

      </div>
      <div class="card-body">
        <table class='table table-striped' id="table1">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Contact Number</th>
              <th>Address</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Joining Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php

          $qry = "select * from members";
          $cnt = 1;
          $query = $conn->query($qry);
          while ($row = $query->fetch_assoc()) {

            if ($row['status'] == 'Active') {
              $status = '<button class="btn btn-success btn"> Active</button>';
            } else if ($row['status'] == 'Expired') {
              $status = '<button class="btn btn-danger btn"> Expired</button>';
            } else {
              $status = '<button class="btn btn-warning btn"> Pendding</button>';
            } ?>
            <tr>
              <td><?php echo $cnt ?></td>
              <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['gender'] ?></td>
              <td><?php echo $row['contact'] ?></td>
              <td><?php echo $row['address'] ?></td>
              <td><?php echo $row['amount'] ?>Peso</td>
              <td><?php echo $status ?></td>

              <td><?php echo $row['date'] ?></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="edit_member.php?id=<?php echo $row['user_id'] ?>">Update</a>
                    <a class="dropdown-item" onclick="return confirm('Are you sure you want to remove this User?')" href="action/delete_member.php?id=<?php echo $row['user_id'] ?>">Delete</a>

                  </div>
                </div>
              </td>
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