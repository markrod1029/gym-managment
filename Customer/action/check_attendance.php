<?php
	 

		include 'session.php';
		include 'timezone.php';

		$username = $_POST['email'];
		$status = $_POST['status'] ;

		$sql = "SELECT * FROM members WHERE email = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$id = $row['user_id'];

			$date_now = date('Y-m-d');

			if($status == 'Time_In'){
				$sql = "SELECT * FROM attendance WHERE user_id = '$id' AND curr_date = '$date_now' AND time_in IS NOT NULL";
				$query = $conn->query($sql);
				if($query->num_rows > 0){
					$_SESSION['success'] = 'You have timed in for today';
					echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";
 




				}
				else{
				
					$sql = "INSERT INTO attendance (user_id, curr_date,present,time_in)
               VALUES ('$id','$date_now',1, NOW())";

					if($conn->query($sql)){


                  $attend_count = 0;
                  $attend = "select * from members where user_id = '$id'";
                  $result_attend = $conn->query($attend);
                  $row_attend = mysqli_fetch_array($result_attend);
                  $cnt = $row_attend['attendance_count'];
                  $attend_count = $attend_count + 1;
                  $sql1 = "UPDATE members SET attendance_count = attendance_count + '$attend_count' where user_id='$id'";
                  $conn->query($sql1) ;

				  $_SESSION['success'] = 'You have timed in for today';

					}
					else{
						$_SESSION['error'] = $conn->error;
                  echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";
					}
				}
			}
			else{
				$sql = "SELECT *, attendance.id AS uid FROM attendance LEFT JOIN members ON members.user_id=attendance.user_id WHERE attendance.user_id = '$id' AND curr_date = '$date_now'";
				$query = $conn->query($sql);
				if($query->num_rows < 1){
				
					$_SESSION['success'] = 'Cannot Timeout. No time in.';

               echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";

				}
				else{
					$row = $query->fetch_assoc();
					if($row['time_out'] != '00:00:00'){
				
					$_SESSION['success'] = 'You have timed out for today';

               echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";

					}
					else{
						
						$sql = "UPDATE attendance SET time_out = NOW() WHERE id = '".$row['uid']."'";

					$_SESSION['success'] = 'You have timed out';

                  echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";

                  
						if($conn->query($sql)){
							

                     echo "<html><head><script>alert(''You have timed out');</script></head></html>";
                     echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";

						
						}
						else{
							$_SESSION['error'] = $conn->error;
                     echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";


							
						}
					}
					
				}
			}
		}
 
	
		echo "<meta http-equiv='refresh' content='0; url=../attendance.php'>";

?>