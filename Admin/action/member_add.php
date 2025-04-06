<?php
include 'session.php';
require_once "../../libs/phpqrcode/qrlib.php";

if (isset($_POST['save'])) {
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $contact = $_POST["contact"];
    $status = "Active";
    $amount = $_POST["amount"];
    $p_year = date('Y');
    $paid_date = date("Y-m-d");
    $plan = $_POST["plan"];
    $trainer_id = $_POST["trainer_id"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Secure password hashing

    $totalamount = $amount * $plan;

    // 🔍 **Check if email already exists in members**
    $checkQuery = "SELECT * FROM members WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'Email already exists. Please use a different email.';
        echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
    } else {
        // 🏷 **Generate Unique QR Code**
        function generateRandomString($length = 8) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
            return substr(str_shuffle($characters), 0, $length);
        }

        $codeContents = generateRandomString(8); // Random string for QR Code
        $qrFilename = $codeContents . '.png';   // Unique filename for QR
        $pathDir = '../../images/qrcode/';

        // 🖼 **Generate QR Code**
        if (!file_exists($pathDir)) {
            mkdir($pathDir, 0777, true); // Create directory if not exists
        }
        QRcode::png($codeContents, $pathDir . $qrFilename, QR_ECLEVEL_L, 5);

        // 📝 **Insert new member if email is unique**
        $qry = "INSERT INTO members (qrcode, fname, mname, lname, email, password, date, gender, amount, p_year, paid_date, plan, address, contact, status, trainer_id) 
                VALUES ('$codeContents', '$fname', '$mname', '$lname', '$email', '$hashed_password', NOW(), '$gender', '$totalamount', '$p_year', '$paid_date', '$plan', '$address', '$contact', '$status', '$trainer_id')";

        if ($conn->query($qry)) {
            $_SESSION['success'] = 'Member Added Successfully';
            echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
        } else {
            $_SESSION['error'] = $conn->error;
            echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
        }
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
    echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
}
?>
