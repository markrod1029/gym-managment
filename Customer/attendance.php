<?php include 'layout/session.php' ?>
<?php include 'layout/header.php' ?>
<?php $page = "attendance";
include 'layout/sidebar.php' ?>
<?php include 'layout/menu.php' ?>

<div class="main-content container-fluid">
    <div class="page-title">
        <h3>QR Code</h3>
        <p class="text-subtitle text-muted">Dashboard / QR Code</p>
    </div>

    <section class="section">
        <?php
        if (isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4 class ='text-white'> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4 class ='text-white'> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
            unset($_SESSION['success']);
        }
        ?>

        <div class="card">
            <div class="card-header text-center">
                <h5>Scan Your QR Code to Mark Attendance</h5>
            </div>
            <div class="card-body w-75 mx-auto text-center">

                <!-- 🔄 Display Current Date & Time -->
                <h4 id="currentDate" class="text-primary"></h4>
                <h5 id="currentTime" class="text-danger"></h5>

                <!-- 🔄 QR Code Image -->
                <img src="../images/qrcode/<?php echo $user['qrcode']; ?>.png" alt="Scan QR Code" class="img-fluid" width="350px">

            </div>
        </div>
    </section>
</div>

<?php include 'layout/footer.php' ?>

<!-- ✅ JavaScript for Live Date & Time -->
<script>
    function updateDateTime() {
        let now = new Date();
        let date = now.toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        let time = now.toLocaleTimeString();

        document.getElementById("currentDate").innerText = date;
        document.getElementById("currentTime").innerText = time;
    }

    setInterval(updateDateTime, 1000); // Update every second
    updateDateTime(); // Initial call
</script>