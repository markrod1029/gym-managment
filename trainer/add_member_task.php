<?php include 'layout/session.php'?>
<?php include 'layout/header.php'?>
<?php $page = "task"; include 'layout/sidebar.php'?>
<?php include 'layout/menu.php'?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Task List</h3>
        <p class="text-subtitle text-muted">Dashboard/Task</p>
    </div>


    <section class="section">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title text-primary">Add New Task</h4>
            </div>
            <div class="card-body">
            <form class="form form-vertical" action="action/task_add.php" method="POST">
                <div class="form-body">
                    <div class="row">


                    <?php
$ID = $_GET['id'];
 $view = "SELECT * from members where user_id = '$ID'";
 $result = $conn->query($view);
 $view = $result->fetch_assoc();
 
 ?>     



                                
                    <div class="col-12">
                            <label for="first-name-icon ">Select a Title</label>

                                    <fieldset class="form-group">
                                        <select name="title" class="form-select" id="basicSelect" required>
                                            <option value="Day 1"> Day 1</option>
                                            <option value="Day 2">Day 2</option>
                                            <option value="Day 3">Day 3</option>
                                            <option value="Day 4">Day 4</option>
                                            <option value="Day 5">Day 5</option>
                                            <option value="Day 6">Day 6</option>
                                            <option value="Day 7">Day 7</option>
                                            <option value="Rest">Rest</option>
                                        </select>
                                    </fieldset>
                    </div>
                    <br>

                    <div class="col-12">
                            <label for="first-name-icon ">Workout Plan</label>

                                    <fieldset class="form-group">
                                        <select class="form-select" name="workout_id" required onchange="myplandetail(this.value)">
                                            <option value ="0"> --Please Select--</option>
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



                                    </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div id="plandetls">
                                            </div>
                                        </div>
                                    </div>

                    <br>


                   

                    
              
            
                    <div class="col-12">
                            <label for="first-name-icon">Select a Status</label>

                                    <fieldset class="form-group">
                                        <select name="task_status" class="form-select" id="basicSelect" required>
                                            <option value="On Going"> On Going</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </fieldset>
                    </div>


                    </div>

                  



                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Start Workout</label>
                            <div class="position-relative">
                                <input type="date" class="form-control"  name="start_datetime" id="start_datetime" placeholder="Start of Workout"  id="city-id-icon" required>
                                <div class="form-control-icon">
                                <i data-feather="clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">End Workout</label>
                            <div class="position-relative">
                                <input type="date" class="form-control"  name="end_datetime" id="end_datetime" placeholder="End of Workout"  id="city-id-icon" required>
                                <div class="form-control-icon">
                                <i data-feather="clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 d-flex justify-content-end">
                    <input type="hidden" name="id" value="<?php echo $view['user_id']; ?>">
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


         function myplandetail(str){
                 
                if(str==""){
                    document.getElementById("plandetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("plandetls").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","plandetail.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
    </script>
        
<?php 
include 'layout/footer.php'?>
    