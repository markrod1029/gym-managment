<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "trainer";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Trainer List</h3>
    <p class="text-subtitle text-muted">Dashboard/Trainer</p>
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
              <th>trainer Name</th>
              <th>Email</th>
              <th>Position</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Contact</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php

          $qry = "SELECT * FROM staffs WHERE role = 'Trainer' AND status = 'Active'";
          $cnt = 1;
          $query = $conn->query($qry);
          while ($row = $query->fetch_assoc()) {

            if ($row["status"] == 'Active') {
              $status = '<button type="button" name="status_button" class="btn btn-primary btn-sm status_button" data-id="' . $row["user_id"] . '" data-status="' . $row["user_id"] . '">Active</button>';
            } else {
              $status = '<button type="button" name="status_button" class="btn btn-danger btn-sm status_button" data-id="' . $row["user_id"] . '" data-status="' . $row["user_id"] . '">Inactive</button>';
            }
          ?>
            <tr>
              <td><?php echo $cnt ?></td>
              <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['designation'] ?></td>
              <td><?php echo $row['gender'] ?></td>
              <td><?php echo $row['address'] ?></td>
              <td><?php echo $row['contact'] ?></td>
              <td>
                <?php
                if ($row["status"] == 'Active') { ?>

                  <a type="button" name="active" href="action/active.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want to Deactive the Trainer?')" class="btn btn-primary btn-sm status_button">Active</a>
                <?php
                } else { ?>

                  <a type="button" name="deactive" href="action/deactive.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want to Active the Trainer?')" class="btn btn-danger btn-sm status_button">Deactive</a>
                <?php
                } ?>




              </td>
              <td>


                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>


                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="edit_trainer.php?id=<?php echo $row['user_id'] ?>">Update</a>
                  <a class="dropdown-item" onclick="return confirm('Are you sure you want to remove this Trainer?')" href="action/delete_trainer.php?id=<?php echo $row['user_id'] ?>">Delete</a>

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

<script>
  $(document).ready(function() {


    $(document).on('click', '.status_button', function() {
      var id = $(this).data('id');
      var status = $(this).data('status');
      var next_status = 'Active';
      if (status == 'Active') {
        next_status = 'Inactive';
      }
      if (confirm("Are you sure you want to " + next_status + " it?")) {

        $.ajax({

          url: "trainer_add.php",

          method: "POST",

          data: {
            id: id,
            action: 'change_status',
            status: status,
            next_status: next_status
          },

          success: function(data) {

            $('#message').html(data);

            dataTable.ajax.reload();

            setTimeout(function() {

              $('#message').html('');

            }, 5000);

          }

        })

      }
    });


  });
</script>