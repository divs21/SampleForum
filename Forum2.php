<?php session_start(); include 'header.php';?>
<?php include 'dbcon.php';
$connect = openCon();
 ?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">




<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         
         <h4 class="w3-center">My Profile</h4>
         <?php
          if (isset($_SESSION['active'])) {
         echo "<p class='w3-center'><img src='img/avatar2.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>
         <hr>";
         echo "<p><i class='fa fa-pencil fa-fw w3-margin-right w3-text-theme'></i> Designer, UI</p>";
         echo "<p><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i> London, UK</p>";
         echo "<p><i class='fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme'></i> April 1, 1988</p>";
         }
         else{
         echo "<p class='w3-center'><img src='img/avatar5.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>
         <hr>";
         echo "<p style='color:red;'><i class='fa fa-pencil fa-fw w3-margin-right w3-text-theme' ></i> Please Login to Post or Reply to a thread! </p>";
         }
         
         ?>
         
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Posts</button>
          <div id="Demo1" class="w3-hide w3-container">
          <?php
          if (isset($_SESSION['active'])) {
             $email = $_SESSION['email'];
             $sql_my = "SELECT * FROM user_threads WHERE email = '$email'";
             $result_my = $connect->query($sql_my);
 	      
         		if ($result_my->num_rows) {   
	      			$row = $result_my->fetch_assoc() ;
	      			$title = $row['title'];
	      			echo "<p>".$title."</p><hr/>";
	      			echo "<p>More</p>";
             }
         }
         ?>
          </div>
          
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Follows</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small" >
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
     
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h5 class="w3-opacity">Having Doubts!! Please post it here for a discussion.</h5>
              <form action ="Forum2.php" method = "post" >
                Select the area of the topic: <select class="w3-border w3-padding" name = "new_Topic" required>
  
  						<option value='P'>PHP</option>
  						<option value='C'>CSS</option>
  						<option value='A'>AJAX</option>
 						<option value='M'>MySQL</option>
				  </select>
              <input type= "text"  class="w3-border w3-padding" placeholder="Enter your Question" name = "new_Ques" required/>
              <input type= "text" class="w3-border w3-padding" placeholder="Detailed Explanation" name = "new_subject" />
              <button type="submit" class="w3-button w3-theme" name = "new_post" value = "new_post"><i class="fa fa-pencil"></i>  Post</button> 
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include "form_submit.php"; echo "<div class='w3-container w3-card w3-white w3-round w3-margin' style='color:red;'>" .  $msg . "
      </br>
       List By <select onchange=\"myFunctionSel(this.value)\" class= 'w3-margin-bottom'>
  <option value='None'>None</option>
  <option value='P'>PHP</option>
  <option value='C'>CSS</option>
  <option value='A'>AJAX</option>
  <option value='M'>MySQL</option>
</select>
      </div>"; ?>
      <?php 

       $sql_select = "SELECT * from user_threads";
       $result = $connect->query($sql_select);
        

       if ($result->num_rows) {
       While($row = $result->fetch_assoc()){
        
        
        $rid = "Dem" . $row['tid'];
        $com = "com" . $row['tid']; 
      echo "<div class='".$row['topic']. " w3-container w3-card w3-white w3-round w3-margin'><br>
        <img src='img/avatar2.png' alt='Avatar' class='w3-left w3-circle w3-margin-right' style='width:60px'>
        <span class='w3-right w3-opacity'>". $row["time"] ."</span>
        <h4> ". $row["email"]. " </h4><br>
        <h5>".$row["title"]."</h5>
        
        <hr class='w3-clear'>
        <p> ". $row ["subject"] ." </p>";
         
        echo "<button type='button' class='w3-button w3-theme-d1 w3-margin-bottom' ><i class='fa fa-thumbs-up'></i>  Follow</button> 
       <input type='hidden' name='reply_id' value='".$row['tid']."'/>
        <button type='button' class='w3-button w3-theme-d2 w3-margin-bottom' name='Butreply' value ='but' onclick=\"myFunction('".$rid."')\"  ><i class='fa fa-comment'></i>  Comment</button> 
       <span class='w3-right w3-margin-bottom' onclick=\"myFunction('".$com."')\" > Replies </span>
      ";
      
      echo "<div id='".$rid."' class='w3-hide w3-container w3-round w3-margin w3-theme-d1'>
      <form action='Forum2.php' method = 'post'>
      <label for='uname'><b>Reply</b></label>
      <input type='text' placeholder='Enter' name='reply' required>

      <label for='psw'><b>Detailed Explanation</b></label>
      <input type='text' placeholder='Enter' name='subject' >
       
      <button class='w3-button w3-right w3-theme' type='submit' name='reply_submit' value='".$row['tid']."' >Submit</button>
      </form>
     </div>";
     echo "<div id='".$com."' class='w3-hide w3-container w3-round w3-margin' style= 'border: 1px solid black'>";
     include "display_replies.php";
     echo "</div>";  
    
    
     echo "</div>";
      }
      }
      
      ?>

     
	
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Latest Topics</p>
          
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      

      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Powered by <a href="" target="_blank">w3.css</a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}
function myFunctionSel(id) {
var x = document.getElementsByClassName('C');
var y = document.getElementsByClassName('M');
var z = document.getElementsByClassName('P');
var w = document.getElementsByClassName('A');
    if(id != 'None' ){
    for (i=0,len = x.length; i < len; i++ ){   
    if (x[i].className.indexOf("w3-hide") == -1) {
    x[i].className += " w3-hide";
    }
    }
    for (i=0,len = y.length; i < len; i++ ){   
    if (y[i].className.indexOf("w3-hide") == -1) {
    y[i].className += " w3-hide";
    }
    }
    for (i=0,len = z.length; i < len; i++ ){ 
    if (z[i].className.indexOf("w3-hide") == -1) {  
    z[i].className += " w3-hide";
    }
    }
    for (i=0,len = w.length; i < len; i++ ){ 
    if (w[i].className.indexOf("w3-hide") == -1) {  
    w[i].className += " w3-hide";
    }
    }
    
    var id1 = document.getElementsByClassName(id);
    for (i=0,len = id1.length; i < len; i++ ){   
    id1[i].className = id1[i].className.replace("w3-hide", "");
    }
    
   } 
   else{
   
   for (i=0,len = x.length; i < len; i++ ){   
    x[i].className = x[i].className.replace("w3-hide", "");   
    }
    for (i=0,len = y.length; i < len; i++ ){   
    y[i].className = y[i].className.replace("w3-hide", "");
    }
    for (i=0,len = z.length; i < len; i++ ){   
    z[i].className = z[i].className.replace("w3-hide", "");
    }
    for (i=0,len = w.length; i < len; i++ ){   
    w[i].className = w[i].className.replace("w3-hide", "");
    }
   
   }
}
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 

