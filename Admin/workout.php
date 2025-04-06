<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "workout";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>
<div class="main-content container-fluid">
  <div class="page-title">
    <h3>Workout List</h3>
    <p class="text-subtitle text-muted">Dashboard/Workout List</p>
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
              <th>Task Service</th>
              <th>Member Excersise</th>
              <th>Workout List</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php
          $qry = "SELECT *, exercises.id AS eid, workout.id AS wid 
                            FROM workout LEFT JOIN exercises ON exercises.id=workout.workout_id 
                            ORDER BY exercises.Exercises DESC";

          $cnt = 1;
          $query = $conn->query($qry);

          while ($row = $query->fetch_assoc()) {

          ?>
            <tr>
              <td><?php echo $cnt ?></td>

              <td><?php echo $row['Exercises'] ?> Exercises</td>
              <td><?php echo $row['exercises'] ?></td>
              <td><?php echo $row['task'] ?></td>

              <td>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="edit_workout.php?id=<?php echo $row['wid'] ?>">Update</a>
                  <a class="dropdown-item" onclick="return confirm('Are you sure you want to remove this Workout?')" href="action/delete_workout.php?id=<?php echo $row['wid'] ?>">Delete</a>

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