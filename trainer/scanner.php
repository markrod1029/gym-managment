<?php include 'layout/session.php'; ?>
<?php include 'layout/header.php'; ?>
<?php $page = "scanner";
include 'layout/sidebar.php'; ?>
<?php include 'layout/menu.php'; ?>

<div class="main-content container-fluid">
  <div class="page-title ">
    <h3>QR Code Scanner</h3>
    <p class="text-subtitle text-muted">Dashboard / QR Code Scanner</p>
  </div>

  <section class="section">
    <div class="mt-3 d-flex flex-column align-items-center">
      <div class="page-title ">
        <h3>Scanner</h3>
      </div>
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

      <div class="mb-3">
        <label class="btn btn-primary active">
          <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
        </label>
        <label class="btn btn-secondary">
          <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
        </label>
      </div>

      <!-- Camera Preview -->
      <div class="text-center">
        <video id="preview" class="camera-preview"></video>
      </div>

      <!-- Form for QR Code Submission -->
      <form action="action/scanner.php" method="POST" id="qrForm" class="form-horizontal text-center mt-3">
        <label><b>SCAN QR CODE</b></label>
        <input type="text" name="member_qrcode" id="member_qrcode" placeholder="Scan QR Code" class="form-control text-center" required>
      </form>

      <hr />
    </div>
  </section>
</div>

<!-- CSS for Bigger Camera -->
<style>
  .camera-preview {
    width: 100%;
    max-width: 650px;
    height: 450px;
    border: 4px solid #007bff;
    border-radius: 10px;
    object-fit: cover;
  }
</style>

<!-- JavaScript Dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script>
  let scanner = new Instascan.Scanner({
    video: document.getElementById('preview'),
    scanPeriod: 1, // Reduce scan period for faster detection (was 5)
    mirror: false
  });

  Instascan.Camera.getCameras().then(function(cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
      $('[name="options"]').on('change', function() {
        let selectedCamera = $(this).val() == 1 ? cameras[0] : cameras[1];
        if (selectedCamera) {
          scanner.start(selectedCamera);
        } else {
          alert('Selected camera not found!');
        }
      });
    } else {
      console.error('No cameras found.');
      alert('No cameras found.');
    }
  }).catch(function(e) {
    console.error(e);
  });

  // QR Code Scanning Event (Auto Submit)
  scanner.addListener('scan', function(content) {
    let qrInput = document.getElementById('member_qrcode');
    let form = document.getElementById('qrForm');

    qrInput.value = content;

    // Ensure the form submits only once
    if (!form.dataset.submitted) {
      form.dataset.submitted = "true";
      form.submit();
    }
  });

  // Optimize camera settings for faster focus & frame rate
  document.getElementById('preview').setAttribute('autofocus', true);
</script>

<script>
  document.oncontextmenu = document.body.oncontextmenu = function() {
    return false;
  };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'layout/footer.php'; ?>