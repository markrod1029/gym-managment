<?php include 'layout/header.php'?>
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
            <h4 class="card-title text-primary">Add New Member</h4>
            </div>
            <div class="card-body">
            <form class="form form-vertical" action="action/member_add.php" method="POST">
                <div class="form-body">
                    <div class="row">


                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Full Name</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="fullname" placeholder="FullName" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">UserName</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="username" placeholder="Username" id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="first-name-icon">Password</label>
                            <div class="position-relative">
                                <input type="text" class="form-control"name="password" placeholder="**********"  id="first-name-icon">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                                
                    <div class="col-12">
                            <label for="first-name-icon">Gender</label>

                                    <fieldset class="form-group">
                                        <select name="gender" class="form-select" id="basicSelect">
                                            <option value="Male"> Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </fieldset>
                    </div>


                                 
                    <div class="col-12">
                            <label for="first-name-icon">Plan</label>

                                    <fieldset class="form-group">
                                        <select name="plan" class="form-select" id="basicSelect">
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
                                <input type="text" class="form-control" name="contact" placeholder="9876543210" id="mobile-id-icon">
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
                                <input type="text" class="form-control" name="address" placeholder="Address" id="city-id-icon">
                                <div class="form-control-icon">
                                    <i data-feather="home"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                            <label for="first-name-icon">Services</label>

                                    <fieldset class="form-group">
                                        <select name="services" class="form-select" id="basicSelect">
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
                                <input type="text" class="form-control" name="amount" placeholder="100 Pesos" id="city-id-icon">
                                <div class="form-control-icon">
                                    <i>P</i>
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
    