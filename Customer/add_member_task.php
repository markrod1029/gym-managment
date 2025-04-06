<?php include 'layout/header.php'?>
    <script src="../calendar/fullcalendar/lib/main.min.js"></script>
    <link rel="stylesheet" href="../calendar/fullcalendar/lib/main.css">
    <script src="../calendar/js/bootstrap.min.js"></script> 
    
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


                    
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Enter Your Task</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="task_desc" placeholder="I'll be doing 12 set" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="activity"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                                
                    <div class="col-12">
                            <label for="first-name-icon">Select a Status</label>

                                    <fieldset class="form-group">
                                        <select name="task_status" class="form-select" id="basicSelect">
                                            <option value="On Going"> On Going</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </fieldset>
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
    

<?php include 'layout/footer.php'?>
    