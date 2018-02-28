
<?php 
 $tid = $row['tid'];
 $sql_select = "SELECT * from reply_threads WHERE tid = '$tid'";
 $result1 = $connect->query($sql_select);

 if ($result1->num_rows) {
      
  		While($row_reply = $result1->fetch_assoc()){
  		
  		echo "<img src='img/avatar2.png' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'/>
        <span class='w3-right w3-opacity'>". $row_reply["time"] ."</span>
        <h4> ". $row_reply["email"]. " </h4><br>
        <h5>".$row_reply["title"]."</h5>
        
        <hr class='w3-clear'>
        <p> ". $row_reply ["subject"] ." </p>" ;
        
  

		}
		
 }
 else
 {
       
       echo "<p>Sorry! No replies yet. Will get back to you soon.</p>";
           
 }



?>

