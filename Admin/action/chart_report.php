<?php include 'conn.php';

  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
  ?>



            
            <div class="card-body">
                          <!-- Small boxes (Stat box) -->
      <div class="row">
          <!-- small box -->



      
            <div class="box-tools pull-right">

      




                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2022; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>

                  </div>
                </form>

              </div>
            <canvas id="bar-chart" width="800" height="450"></canvas>

            


            
<?php
$and = 'AND YEAR(date) = '.$year;
$months = array();
$Chest = array();
$Triceps = array();
$Biceps = array();
$Legs = array();
$Back = array();
for( $m = 1; $m <= 12; $m++ ) {

  $sql = "SELECT *, exercises.id AS eid, todo.id AS wid 
  FROM todo LEFT JOIN exercises ON exercises.id=todo.workout_id 
  WHERE MONTH(date) = '$m' AND exercises.Exercises = 'Chest' $and ";
  $oquery = $conn->query($sql);
  array_push($Chest, $oquery->num_rows);


  $sql = "SELECT *, exercises.id AS eid, todo.id AS wid 
  FROM todo LEFT JOIN exercises ON exercises.id=todo.workout_id 
  WHERE MONTH(date) = '$m' AND exercises.Exercises = 'Triceps' $and ";
  $lquery = $conn->query($sql);
  array_push($Triceps, $lquery->num_rows);


  $sql = "SELECT *, exercises.id AS eid, todo.id AS wid 
  FROM todo LEFT JOIN exercises ON exercises.id=todo.workout_id 
  WHERE MONTH(date) = '$m' AND exercises.Exercises = 'Biceps' $and ";
  $bquery = $conn->query($sql);
  array_push($Biceps, $bquery->num_rows);


  $sql = "SELECT *, exercises.id AS eid, todo.id AS wid 
  FROM todo LEFT JOIN exercises ON exercises.id=todo.workout_id 
  WHERE MONTH(date) = '$m' AND exercises.Exercises = 'Legs' $and ";
  $lequery = $conn->query($sql);
  array_push($Legs, $lequery->num_rows);


  $sql = "SELECT *, exercises.id AS eid, todo.id AS wid 
  FROM todo LEFT JOIN exercises ON exercises.id=todo.workout_id 
  WHERE MONTH(date) = '$m' AND exercises.Exercises = 'Back' $and ";
  $baquery = $conn->query($sql);
  array_push($Back, $baquery->num_rows);


  $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
  $month =  date('M', mktime(0, 0, 0,  $m, 1));
  array_push($months, $month);
}

$months = json_encode($months);
$Triceps = json_encode($Triceps);
$Chest = json_encode($Chest);
$Biceps = json_encode($Biceps);
$Legs = json_encode($Legs);
$Back = json_encode($Back);

?>
                            
                                <Script>
    
                                // Bar chart
                                    new Chart(document.getElementById("bar-chart"), {
                                        type: 'bar',
                                        data: {
                                        labels:  <?php echo $months ; ?>,
                                        datasets: [
                                            {
                                                label               : 'Triceps Excersise',
                                                backgroundColor: "#3e95cd",
                                            data:  <?php echo $Triceps ; ?>,
                                            },
                                            {
                                                label               : 'Chest Excersise',
                                                backgroundColor:"#3cba9f",
                                            data: <?php echo $Chest ; ?>,
                                            },

                                            {
                                                label               : 'Biceps Excersise',
                                                backgroundColor:"#bfa839",
                                            data: <?php echo $Biceps ; ?>,
                                            },
                                            {
                                                label               : 'Legs Excersise',
                                                backgroundColor:"#E45C12",
                                            data: <?php echo $Legs ; ?>,
                                            },
                                            
                                            {
                                                label               : 'Back Excersise',
                                                backgroundColor:"#bc292e",
                                            data: <?php echo $Back ; ?>,
                                            },

                                           
                                             


                                            
                                            
                                        ]
                                        },
                                        options: {
                                        legend: { display: false },
                                        title: {
                                            display: true,
                                        }
                                        }
                                    });


                                 
                                    </Script>
                                    <script>
                                    $(function(){
                                    $('#select_year').change(function(){
                                    window.location.href = 'home.php?year='+$(this).val();
                                    });
                                    });
                                        </script>

              
            </div>
        </div>

        
    </section>

<?php include 'layout/footer.php'?>
    