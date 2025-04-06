<?php include 'layout/session.php'?>
<?php include 'layout/header.php'?>
<?php $page='report'; include 'layout/sidebar.php'?>
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
                            <th>Fullname</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                    </thead>
              
                    <?php
                    $qry = "SELECT *, members.user_id AS cid, attendance.id AS attid FROM attendance 
                    LEFT JOIN members ON members.user_id=attendance.user_id ORDER BY attendance.curr_date 
                    DESC, attendance.time_in DESC";
                    $cnt = 1;
                    $query = $conn->query($qry);
                    while($row = $query->fetch_assoc()){?>

                                <tr>
                                <td><?php echo $cnt ?></td>
                                <td><?php echo $row['curr_date']?></td>
                                <td><?php echo $row['fname'].' ' .$row['mname']. ' ' .$row['lname']?></td>
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
    