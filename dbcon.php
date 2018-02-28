<?php

function openCon(){
$con = new mysqli("mysql://mysql:3306/","mysqluser","pass1234",'forum') ;

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

/*$sql = "INSERT INTO user_details (email, uname, password)
VALUES ('John@gmail.com', 'Mathew', 'john')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}*/
return $con;
}
?>
