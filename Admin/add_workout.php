<?php include 'layout/session.php'?>
<?php include 'layout/header.php'?>
<?php $page = "workouts"; include 'layout/sidebar.php'?>
<?php include 'layout/menu.php'?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Workout List</h3>
        <p class="text-subtitle text-muted">Dashboard/Workout</p>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title text-primary">Add New Workout</h4>
            </div>
            <div class="card-body">
            <form class="form form-vertical" action="action/work_add.php" method="POST">
                <div class="form-body">
                    <div class="row">



                    <div class="col-12">
                            <label for="first-name-icon">Choose Exercises</label>

                            <fieldset class="form-group">
                                        <select name="workout_id" class="form-select" required>
                                            <?php
                                                $query="select * from exercises";
                                                $result=mysqli_query($conn,$query);
                                                if(mysqli_affected_rows($conn)!=0){
                                                    while($row=mysqli_fetch_row($result)){
                                                        echo "<option value=".$row[0].">".$row[1]." Exercises</option>";
                                                    }
                                                }

                                            ?>
                                        </select>
                                    </fieldset>
                    </div>


                    <div class="col-12">
                            <label for="first-name-icon">Member Exercises</label>

                                    <fieldset class="form-group">
                                        <select name="exercises" class="form-select" id="basicSelect" required>
                                            <option value="Basic"> Basic</option>
                                            <option value="Intermidiate">Intermidiate</option>
                                            <option value="Hard">Hard</option>
                                        </select>
                                    </fieldset>
                    </div>




                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon ">Workout Task</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="task" placeholder="Workout" required>
                                <div class="form-control-icon">
                                    <i data-feather="activity"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" name="save" class="btn btn-primary mr-1 mb-1">ADD TASK</button>
                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>

    </section>

</div>
<script>
        $(document).ready(function() {
            $("#submit").click(function() {
                alert($("#myselection").val());
            });
        });
    </script>
        
<?php 
include 'layout/footer.php'?>
    