<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
function noBack(){window.history.forward();}
noBack();
window.onload=noBack;
window.onpageshow=function(evt){if(evt.persisted)noBack();}
window.onunload=function(){void(0);}
</script>
<style>
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

</style>
</head>
<body>
<!-- Navbar -->
<div class="w3-top" style="z-index:1;">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="index.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Home</a>
 
  <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Work</a>
  <a href="#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contact</a>
    <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Discussion <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="Forum2.php" class="w3-bar-item w3-button">PHP</a>
      <a href="#" class="w3-bar-item w3-button">CSS</a>
      <a href="#" class="w3-bar-item w3-button">MySQL</a>
    </div>
  </div>
  
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
  <?php
if (isset($_SESSION['active'])) {
    echo "<div class='w3-right w3-padding-large w3-hover-white'> Welcome " . $_SESSION['uname']."</div>";  
    echo "<a class ='w3-right w3-padding-large w3-hover-white' href= 'Logout.php'>Log out</a>";
    echo "<div class='w3-dropdown-hover w3-hide-small'>
    <button class='w3-button w3-padding-large' title='Notifications'><i class='fa fa-bell'></i><span class='w3-badge w3-right w3-small w3-green'>3</span></button>     
    <div class='w3-dropdown-content w3-card-4 w3-bar-block' style='width:300px'>
      <a href='#' class='w3-bar-item w3-button'>One new friend request</a>
      <a href='#' class='w3-bar-item w3-button'>John Doe posted on your wall</a>
      <a href='#' class='w3-bar-item w3-button'>Jane likes your post</a>
    </div>
  </div>";
  echo "<a href='#' class='w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white' title='My Account'>
    <img src='img/avatar2.png' class='w3-circle' style='height:23px;width:23px' alt='Avatar'>
  </a>";
  
  }
  else{
  echo "<div class='w3-right'>";
  echo "<button onclick=\"document.getElementById('id02').style.display='block'\" class='w3-button w3-theme w3-hover-teal' >Login</button>";
  echo "</div>";
  }
  ?>
  
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    
    <a href="#work" class="w3-bar-item w3-button">Work</a>
    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    <a href="#" class="w3-bar-item w3-button">Search</a>
  </div>
</div>
<!-- Modal -->
<div id="id02" class="w3-modal">
<form action= "index.php" method="post">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h4>Login</h4>
     
    </header>
    <div class="w3-container">
      <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>
      <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
      <button class="w3-button w3-right w3-theme" type="submit" name="button" value="login">Login</button>
    </div>
    <footer class="w3-container w3-teal">
      
    </footer>
  </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id02');
var modal2 = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    } 
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}



</script>
<script>
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

