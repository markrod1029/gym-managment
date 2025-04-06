<?php include 'layout/header.php'?>
<?php include 'layout/session.php'?>

<?php $page="members"; include 'layout/sidebar.php'?>
<?php include 'layout/menu.php'?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Member List</h3>
        <p class="text-subtitle text-muted">Dashboard/Member</p>
    </div>
 

    <section class="section">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title text-primary">Update Member</h4>
            </div>
            <div class="card-body">
            <form class="form form-vertical" action="action/update_member.php" method="POST">
                <div class="form-body">
                    <div class="row">

                    <?php
                    $id=$_GET['id'];
                    $qry= "select * from members where user_id='$id'";
                    $result=mysqli_query($conn,$qry);
                    while($row=mysqli_fetch_array($result)){
                    ?> 


                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">First Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="fname" placeholder="First Name"  value='<?php echo $row['fname']; ?>'  id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Middle Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="mname" placeholder="Middle Name"  value='<?php echo $row['mname']; ?>'  id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Last Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name"  value='<?php echo $row['lname']; ?>'  id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Email</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" name="email"  value='<?php echo $row['email']; ?>'  placeholder="Email Address" id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="envelop"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control"name="password" placeholder="**********"   id="first-name-icon" >
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                                
                    <div class="col-12">
                            <label for="first-name-icon">Gender</label>

                                    <fieldset class="form-group">
                                        <select name="gender" class="form-select" id="basicSelect" required>
                                            <option value="Male"> Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </fieldset>
                    </div>


                                 
                    <div class="col-12">
                            <label for="first-name-icon">Plan</label>

                                    <fieldset class="form-group">
                                        <select name="plan" class="form-select" id="basicSelect" required>
                                            <option value="1" selected="selected">One Month</option>
                                            <option value="3">Three Month</option>
                                            <option value="6">Six Month</option>
                                            <option value="12">One Year</option>
                                        </select>
                                    </fieldset>
                    </div>




                   
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Mobile</label>
                            <div class="position-relative">
                                <input type="number" class="form-control" name="contact" value='<?php echo $row['contact']; ?>' placeholder="9876543210" id="mobile-id-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Location</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="address" value='<?php echo $row['address']; ?>' placeholder="Address" id="city-id-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="home"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                            <label for="first-name-icon">Services</label>

                                    <fieldset class="form-group">
                                        <select name="services" class="form-select" id="basicSelect" required>
                                            <option selected="selected">Select Service</option>
                                            <option value="Fitness" >55 per month</option>
                                            <option value="Sauna" >35 per month</option>
                                            <option value="Cardio">40 per month</option>
                                        </select>
                                    </fieldset>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Total Amount</label>
                            <div class="position-relative">
                                <input type="number" class="form-control" name="amount" value='<?php echo $row['amount']; ?>' placeholder="100 Pesos" id="city-id-icon" required>
                                <div class="form-control-icon">
                                    <i>P</i>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                  
                    <div class="col-12 d-flex justify-content-end">
                        <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
                        <button type="submit" name="save" class="btn btn-primary mr-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>

    </section>

</div>
    
<?php
}
?>

<?php include 'layout/footer.php'?>
    