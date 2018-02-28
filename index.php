<?php include 'dbcon.php';
session_start();
$connect = openCon();
 ?>
 

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.overlay {
  
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:1;
  color: white;
  font-size: 15px;
  padding: 20px;
  
}
</style>
<script type="text/javascript">
function timedMsg()
{
var t=setTimeout("document.getElementById('dispMessage').style.display='none';",4000);
}
</script>
</head>
<body class="w3-theme-l5">
<?php
$error = "";
$but = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['button'])){
$but = $_POST['button'];
}
if($but == "login"){

    // collect value of input field
    $email = $_POST['email']; 
    $password = $_POST['psw'];
 	 $sql = "SELECT email, uname, password, block FROM user_details WHERE email = '$email' AND password = '$password'";
 	 $result = $connect->query($sql);
	 
	if ($result->num_rows) {
	$row = $result->fetch_assoc();
    if($row["block"] != 1){
	$_SESSION["active"] = 1;
	$_SESSION["email"] = $email;
	$_SESSION["uname"] = $row["uname"];
	}else{
	 $error = "Your account in blocked due to misconduct! Please avoid using swear or harsh words. Try Log in after 24 hrs!";
	}
	}
	else
   {
      $error = "Incorrect username or password.";
             
   }
 } //end of if($but == "login")
elseif($but == "register"){
$messagerRegister = md5($_POST['r_name'] . $_POST['r_email'] . $_POST['r_psw']);
$uname = $_POST['r_name'];
$email = $_POST['r_email'];
$psw = $_POST['r_psw'];
$sessionMessageRegister = isset($_SESSION['messagerRegister'])?$_SESSION['messagerRegister']:'';
if($messagerRegister!=$sessionMessageRegister){
		$sql_insert = "INSERT INTO user_details (email, uname, password) VALUES ('$email','$uname','$psw')";
	if ($connect->query($sql_insert) === TRUE) {
    $error = "Your account is created successfully";
	} else {
    $error =  "Error: " . $sql_insert . "<br>" . $connect->error;
	}
		$_SESSION['messagerRegister'] = $messagerRegister;  //To avoid resubmission because of refresh button
}
else{
	$error =  "You have already registered!";
}
}

}
$connect->close();
?>
<?php include 'header.php';?>

<!-- Sidebar on click -->
<nav class="w3-sidebar w3-bar-block w3-white w3-card w3-animate-left w3-xxlarge" style="display:none;z-index:2" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-display-topright w3-text-teal"> Close
    <i class="fa fa-remove"></i>
  </a>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <a href="#" class="w3-bar-item w3-button">Link 4</a>
  <a href="#" class="w3-bar-item w3-button">Link 5</a>
</nav>



<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity" style=" margin-top:40px;">
  <?php

   if (!isset($_SESSION['active'])) {
   echo  "<div style='color:red;' id='dispMessage'>". $error . "</div>
   <script language='JavaScript' type='text/javascript'>timedMsg()</script>";
    
    }

?>
  <section>
  <img class="mySlides" src="img/Forum_1.jpg"
  style="width:100%;min-height:350px;max-height:600px;">
 
  <img class="mySlides" src="img/Forum_4.png"
  style="width:100%;min-height:350px;max-height:600px;">
</section>
<?php

if (!isset($_SESSION['active'])) {
echo "<div class='w3-container  w3-display-bottomleft w3-margin-bottom' style='width: 100%;' >  
     <div class='overlay'>
    <button onclick=\"document.getElementById('id01').style.display='block'\" class='w3-button w3-xlarge w3-theme w3-hover-teal' >Sign Up</button>
  Please Sign Up to start a discussion or reply to the post!
   </div>
  </div>";  } ?> 
</div>
  



<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
}
</script>



<!-- Work Row -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter">
<h2>Forum</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  
  <div class="w3-container">
  <h3>Customer 1</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  
  <div class="w3-container">
  <h3>Customer 2</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  
  <div class="w3-container">
  <h3>Customer 3</h3>
  <h4>Trade</h4>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  <p>Blablabla</p>
  </div>
  </div>
</div>

</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
  <a onclick="w3_open()" class="w3-button w3-xlarge w3-circle w3-teal"
  style="position:absolute;top:-28px;right:24px">+</a>
</div>

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Swing by for a cup of coffee, or whatever.</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Chicago, US</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +00 1515151515</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Message</label>
        <input class="w3-input" type="text" name="Message" required>
      </div>  
      <input class="w3-check" type="checkbox" checked name="Like">
      <label>I Like it!</label>
      <button type="submit" class="w3-button w3-right w3-theme">Send</button>
      </form>
    </div>
  </div>
</div>



</div>

<div id="id01" class="w3-modal">
  
  <form class="modal-content animate" action="index.php" method = "post">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
   <header class="w3-container w3-teal w3-display-container"> 
    <h3 style="text-align:left; padding-left: 15px; ">Registeration: </h3>
     
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright">&times;</span>
      </header>
    
    

    <div class="w3-container">
      <label for="r_uname"><b>Name</b></label>
      <input type="text" placeholder="Enter name" name="r_name" required>

      <label for="r_email"><b>User Name </b></label>
      <input type="text" placeholder="Enter email" name="r_email" required>
      
      <label for="r_psw"><b>Password </b></label>
      <input type="password" placeholder="Enter password" name="r_psw" required>
      
       
      <button class="w3-button w3-right w3-theme" type="submit" name="button" value="register" >Register</button>
   
    </div>

    </div>
  </form>
</div>




<script>
// Script for side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}

// Close side navigation
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

</script>

<?php include 'footer.php'; ?>

</body>
</html>

