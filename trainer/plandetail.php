<?php
include 'layout/conn.php';

  //include('../constant/layout/head.php');
  $pid=$_GET['q'];
  $query="SELECT * FROM workout WHERE workout_id = $pid";
    $result=mysqli_query($conn,$query);
  if($result){
    while($row=mysqli_fetch_assoc($result)){

if($row['exercises'] == "Basic"){


  	echo "
    <ul class='widget-todo-list-wrapper'>
    <h5>Basic Exercises</h5>
    <li class='widget-todo-item completed'>
        
    <div class='widget-todo-title-area d-flex align-items-center'>
            <div class='checkbox checkbox-shadow'>
                <input type='checkbox' class='form-check-input' name='workout[]' value ='".$row['task']."' id='checkbox3'>
            </div>
            <span class='widget-todo-title ml-50'>".$row['task']."</span>
        </div>
       
    </li>
    </ul>

  		
  	";
  	       
  }


 else if($row['exercises'] == "Intermidiate"){


  	echo "
    <ul class='widget-todo-list-wrapper'>
    <h5>Intermidiate Exercises</h5>
    <li class='widget-todo-item completed'>
        
    <div class='widget-todo-title-area d-flex align-items-center'>
            <div class='checkbox checkbox-shadow'>
                <input type='checkbox' class='form-check-input' name='workout[]' value ='".$row['task']."' id='checkbox3'>
            </div>
            <span class='widget-todo-title ml-50'>".$row['task']."</span>
        </div>
       
    </li>
    </ul>

  		
  	";
  	       
  }


  else{


  	echo "
    <ul class='widget-todo-list-wrapper'>
    <h5>Hard Exercises</h5>
    <li class='widget-todo-item completed'>
        
    <div class='widget-todo-title-area d-flex align-items-center'>
            <div class='checkbox checkbox-shadow'>
                <input type='checkbox' class='form-check-input' name='workout[]' value ='".$row['task']."' id='checkbox3'>
            </div>
            <span class='widget-todo-title ml-50'>".$row['task']."</span>
        </div>
       
    </li>
    </ul>

  		
  	";
  	       
  }

  }
}

  ?>