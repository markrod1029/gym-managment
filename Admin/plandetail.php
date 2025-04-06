<?php include 'layout/session.php'?>

<?php
  //include('../constant/layout/head.php');
  $pid=$_GET['k'];
  $query="SELECT * FROM workout WHERE id = $pid";
    $result1=mysqli_query($conn,$query);
  if($result1){
    while($row1=mysqli_fetch_assoc($result1)){
if($row1['exercises'] == "Basic"){


  	echo "
    <ul class='widget-todo-list-wrapper'>
    <h5>Basic Exercises</h5>
    <li class='widget-todo-item completed'>
        
    <div class='widget-todo-title-area d-flex align-items-center'>
            <div class='checkbox checkbox-shadow'>
                <input type='checkbox' class='form-check-input' name='workout[]' value ='".$row1['task']."' id='checkbox3'>
            </div>
            <span class='widget-todo-title ml-50'>".$row1['task']."</span>
        </div>
       
    </li>
    </ul>

  		
  	";
  	       
  }


 else if($row1['exercises'] == "Intermidiate"){


  	echo "
    <ul class='widget-todo-list-wrapper'>
    <h5>Intermidiate Exercises</h5>
    <li class='widget-todo-item completed'>
        
    <div class='widget-todo-title-area d-flex align-items-center'>
            <div class='checkbox checkbox-shadow'>
                <input type='checkbox' class='form-check-input' name='workout[]' value ='".$row1['task']."' id='checkbox3'>
            </div>
            <span class='widget-todo-title ml-50'>".$row1['task']."</span>
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
                <input type='checkbox' class='form-check-input' name='workout[]' value ='".$row1['task']."' id='checkbox3'>
            </div>
            <span class='widget-todo-title ml-50'>".$row1['task']."</span>
        </div>
       
    </li>
    </ul>

  		
  	";
  	       
  }

  	       



  }
}

  ?>