<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="../images/logo.jpg" style="height:140px; width:160px; border-radius:50%; " alt=""
                        srcset="">

                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        <p class='sidebar-title ' style="margin-bottom:-5px; text-align:center;">
                            <?php echo $user['fname'] . ' ' . $user['mname'] . ' ' . $user['lname'] ?></p>
                        <p class='sidebar-sub-title text-white ' style="margin-bottom:-5px; text-align:center;">Trainer
                        </p>

                        <li class='sidebar-title'>Personal</li>



                        <li class="sidebar-item  <?php if ($page == 'task') {
                            echo 'active';
                        } ?>">
                            <a href="home.php" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="sidebar-item  <?php if ($page == 'members') {
                            echo 'active';
                        } ?>">
                            <a href="member.php" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Member List</span>
                            </a>
                        </li>



                        <li class="sidebar-item  has-sub <?php if ($page == 'workout') {
                            echo 'active';
                        } ?>">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="activity" width="20"></i>
                                <span>Workout</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="workout.php"> List</a>
                                </li>
                                <li>
                                    <a href="add_workout.php">Add </a>
                                </li>
                            </ul>
                        </li>








                        <li class="sidebar-item  <?php if ($page == 'health') {
                            echo 'active';
                        } ?>">
                            <a href="health.php" class='sidebar-link'>
                                <i data-feather="heart" width="20"></i>
                                <span>Health Status</span>
                            </a>

                        </li>


                        <li class="sidebar-item  <?php if ($page == 'scanner') {
                            echo 'active';
                        } ?>">
                            <a href="scanner.php" class='sidebar-link'>
                                <i data-feather="file" width="20"></i>
                                <span>Scanner</span>
                            </a>
                        </li>







                        <li class="sidebar-item  has-sub  <?php if ($page == 'report') {
                            echo 'active';
                        } ?>">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file" width="20"></i>
                                <span>Report</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="customer_report.php">Member Progress</a>
                                </li>
                                <li>
                                    <a href="attendance_report.php">Attendance Report</a>
                                </li>
                            </ul>
                        </li>
















                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <style>
            #sidebar-menu li a.active {
                color: black;
                font-weight: bold;
            }

            .sidebar-wrapper {
                width: 260px;
                height: 100vh;
                position: fixed;
                top: 0;
                z-index: 10;
                background-color: #D4A941;
                bottom: 0;
                border-right: 1px solid #eee;
                box-shadow: 0 0 10px #ececec;
                left: -260px;
                transition: left 0.6s ease-out;
            }


            .sidebar-wrapper .menu .submenu li a {
                padding: 0.7rem 3rem;
                display: block;
                color: #ececec;
                font-size: 0.75rem;
                font-weight: 500;
                letter-spacing: 0.5px;
                transition: all 0.2s;
            }

            .sidebar-wrapper .menu .sidebar-title {
                padding: 1.5rem 1.8rem 0.5rem;
                font-size: 0.8rem;
                font-weight: 600;
                color: #ececec;
                text-transform: uppercase;
            }

            .sidebar-wrapper .sidebar-header {
                padding: 2rem 3rem 1rem;
                font-size: 2rem;
                font-weight: bold;
                margin-top: -30px;
                margin-bottom: -50px;
            }

            .sidebar-wrapper .menu .sidebar-link>span {
                color: #fff;
                font-weight: 500;
                margin-left: 1rem;
                opacity: 0.8;
            }

            .sidebar-wrapper .menu .sidebar-item.active .sidebar-link {
                background-color: #000000;
            }


            * {
                font-family: "Raleway";
            }

            svg.feather,
            i {
                font-size: 14px;
                height: 1rem;
                color: white;
            }
        </style>