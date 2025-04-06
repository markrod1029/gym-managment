<?php include 'layout/session.php'?>
<?php include 'layout/header.php'?>
<?php $page="trainer"; include 'layout/sidebar.php'?>
<?php include 'layout/menu.php'?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Trainer List</h3>
        <p class="text-subtitle text-muted">Dashboard/Trainer</p>
    </div>
 

    <section class="section">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title text-primary">Add New Trainer</h4>
            </div>
            <div class="card-body">
            <form class="form form-vertical" action="action/trainer_add.php" method="POST">
                <div class="form-body">
                    <div class="row">


                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">First Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" id="first-name-icon" required>
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
                                <input type="text" class="form-control" name="mname" placeholder="Middle Name" id="first-name-icon" required>
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
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Email Address</label>
                            <div class="position-relative">
                                <input type="email" class="form-control" name="email" placeholder="Email" id="first-name-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="mail"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control"name="password" placeholder="**********"  id="first-name-icon" required>
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
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Mobile</label>
                            <div class="position-relative">
                                <input type="number" class="form-control" name="contact" placeholder="9876543210" id="mobile-id-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="phone"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="mobile-id-icon">Address</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="address" placeholder="Address" id="city-id-icon" required>
                                <div class="form-control-icon">
                                    <i data-feather="home"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                   

                  
                   
                  
                    <div class="col-12 d-flex justify-content-end">
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
    

<?php include 'layout/footer.php'?>
    