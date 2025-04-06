<?php
	session_start();
	include 'conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


		$sql = "SELECT * FROM staffs WHERE email = '$email' AND role = 'Admin'";
		$query = $conn->query($sql);

        $sql1 = "SELECT * FROM members WHERE email = '$email' AND status ='Active'";
		$query1 = $conn->query($sql1);

		$sql2 = "SELECT * FROM staffs WHERE email = '$email'  AND status ='Active' AND role = 'Trainer' ";
		$query2 = $conn->query($sql2);

        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['user_id'];
			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
        } 



        else if ($query1->num_rows >= 1) {

            $row1 = $query1->fetch_assoc();
			if(password_verify($password, $row1['password'])){
				$_SESSION['member'] = $row1['user_id'];
			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
    }


	else if ($query2->num_rows >= 1) {

		$row2 = $query2->fetch_assoc();
		if(password_verify($password, $row2['password'])){
			$_SESSION['trainer'] = $row2['user_id'];
		}

		else{
			$_SESSION['error'] = 'Incorrect password';
		}


}

    else{
        $_SESSION['error'] = 'Cannot find account with the email';


    }



}




	header('location: index.php');

?>