<?php include 'layout/session.php'?>
<?php include 'layout/header.php'?>
<?php $page="report"; include 'layout/sidebar.php'?>
<?php include 'layout/menu.php'?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Attendace List</h3>
        <p class="text-subtitle text-muted">Dashboard/Attendace</p>
    </div>


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
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                    </thead>
              
                    <?php
                    $id =$user['user_id'];
                    $qry = "SELECT * FROM attendance where user_id ='$id'";
                    $cnt = 1;
                    $query = $conn->query($qry);
                    while($row = $query->fetch_assoc()){?>

                                <tr>
                                <td><?php echo $cnt ?></td>
                                <td><?php echo $row['curr_date']?></td>
                                <td><?php echo $row['time_in']?></td>
                                <td><?php echo $row['time_out']?></td>

                              
                                
                               
                <?php 
              ?>      
              </tbody>
           <?php $cnt++; } ?>
           
                </table>
            </div>
        </div>

    </section>

</div>
    

<?php include 'layout/footer.php'?>
    