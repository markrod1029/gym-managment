
<?php
include '../layout/conn.php';
//include('../constant/layout/head.php');
$pid=$_GET['q'];
$query="SELECT * FROM workout 
LEFT JOIN exercises ON workout.workout_id = exercises.id WHERE workout.workout_id = $pid";
  $result=mysqli_query($conn,$query);
if($result){
  while($row=mysqli_fetch_assoc($result)){?>


<div class="col-12">
<label for="first-name-icon ">task Plan</label>

        <fieldset class="form-group">
            <select class="form-select" name="exercises" required  onchange="work(this.value);">
                <option value ="0"> --Please Select--</option>
                <?php
                    $query="SELECT * FROM workout 
                    LEFT JOIN exercises ON workout.workout_id = exercises.id WHERE workout.workout_id = $pid ";
                    $result=mysqli_query($conn,$query);
                    if(mysqli_affected_rows($conn)!=0){
                        while($row1=mysqli_fetch_row($result)){
                            echo "<option value=".$row1[0].">".$row1[2]." </option>";
                        }
                    }

                ?>
            </select>
        </fieldset>
</div>


                  <?php


}
}

?>

