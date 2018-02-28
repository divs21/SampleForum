
<?php 
include "harsh_words.php";
$msg = "";
$count1 = NULL;
$count2 = NULL;
$block = "";
if (isset($_SESSION['active']) ) {
      if ($_SERVER["REQUEST_METHOD"] == "POST" )  {
        // collect value of input field
         
			$date = date_create(date("Y-m-d h:i:sa"));
			date_timezone_set($date,timezone_open("Asia/Calcutta"));
			$date_ind = date_format($date,"Y-m-d h:i:sa");
			$email = $_SESSION['email'];


			if (isset($_POST['new_post'])){
			   

				$title = preg_replace($patterns,"#####", $_POST['new_Ques'],-1,$count1);
				$subject = preg_replace($patterns,"#####", $_POST['new_subject'],-1,$count2);
			
				$topic = $_POST['new_Topic'];
				$messagerRegister = md5($_POST['new_Topic']. $_POST['new_Ques'] . $_POST['new_subject']);
				$sessionMessageRegister = isset($_SESSION['messagerRegister'])?$_SESSION['messagerRegister']:'';

				
				if($messagerRegister!=$sessionMessageRegister){

				if ($count1 != NULL OR $count2 != NULL ){
					$connect->autocommit(FALSE);
				}
				$sql_new = "INSERT INTO user_threads(topic, title, email, subject, time) VALUES ('$topic','$title','$email','$subject','$date_ind')";
				if ($connect->query($sql_new) === TRUE) {
    				$msg = "You have posted successfully!";
			   } else {
   		      $msg = "Error: " . $sql_new . "<br>" . $connect->error;
			   }
			   
				if ($count1 != NULL OR $count2 != NULL ){
					$type = "";
					if($count1 != NULL){
					 $type = "T"; }
				 	else {
			 		 $type = "S"; }
			 		 
			 		 $type = "N_" . $type  ;
			
			
			
					$sql_tid = "SELECT * FROM user_threads WHERE email = '$email' AND time = '$date_ind' AND title = '$title'";
 	      		$result_tid = $connect->query($sql_tid);
 	      
         		if ($result_tid->num_rows) {   
	      			$row = $result_tid->fetch_assoc() ;
			
						$tid = $row['tid'];
						$title = $_POST['new_Ques'];
						$subject = $_POST['new_subject'];
						$sql_block = "UPDATE user_details SET block = 1 WHERE email = '$email'";
						$connect->query($sql_block);
						$sql_harsh = "INSERT INTO harsh_threads(tid, type, email, title,subject) VALUES ('$tid','$type','$email','$title','$subject')";
						$connect->query($sql_harsh);
						$connect->commit();
						
				
			
					}

				}   
				$_SESSION['messagerRegister'] = $messagerRegister;
			
			}else
			{
			$msg = "You have already posted the same Question! Do not Refresh"; }

			}else{

			
				$title = preg_replace($patterns,"#####", $_POST['reply'],-1,$count1);
				$subject = preg_replace($patterns,"#####", $_POST['subject'],-1,$count2);
				$tid = $_POST['reply_submit'];
				
				$messagerRegister = md5($_SESSION['email'] . $_POST['reply'] . $_POST['subject']);
				$sessionMessageRegister = isset($_SESSION['messagerRegister'])?$_SESSION['messagerRegister']:'';
				
				if($messagerRegister!=$sessionMessageRegister){

				
				if ($count1 != NULL OR $count2 != NULL ){
					$connect->autocommit(FALSE);
				}
				$sql_insert = "INSERT INTO reply_threads (tid, title,email,subject, time) VALUES ('$tid','$title', '$email', '$subject' ,'$date_ind')";

				if ($connect->query($sql_insert) === TRUE) {
    				$msg = "You have replied to the post!";
				} else {
   				$msg = "Error: " . $sql_insert . "<br>" . $connect->error;
				}
			
			
			   if ($count1 != NULL OR $count2 != NULL ){
					$type = "";
					if($count1 != NULL){
					 $type = "T"; }
				 	else {
			 		 $type = "S"; }
			 		 
			 		  $type = "R_" . $type  ;
			
			
			
					$sql_rid = "SELECT * FROM reply_threads WHERE email = '$email' AND time = '$date_ind' AND title = '$title' AND tid = '$tid'";
 	      		$result_rid = $connect->query($sql_rid);
 	      
         		if ($result_rid->num_rows) {   
	      			$row = $result_rid->fetch_assoc() ;
			
						$rid = $row['rid'];
						$title = $_POST['reply'];
						$subject = $_POST['subject'];
						$sql_block = "UPDATE user_details SET block = 1 WHERE email = '$email'";
						$connect->query($sql_block);
						$sql_harsh = "INSERT INTO harsh_threads(tid, type, email, title,subject) VALUES ('$tid','$type','$email','$title','$subject')";
						$connect->query($sql_harsh);
						$connect->commit();
						
			
					}

				}   //end if ($count1 != NULL OR $count2 != NULL ){
			$_SESSION['messagerRegister'] = $messagerRegister;
			}
			else {
			$msg = "You have already replied to the post! Do not Refresh"; }
			
			}//end of else
			
	}	
}


?>