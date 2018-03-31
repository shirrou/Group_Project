<?php
$servername="localhost";
$username="root";
try {
    $conn = new PDO("mysql:host=localhost;dbname=testproject", $username, "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//check the data inserted in the registration form
$name=$_POST["firstName"];
$middleName=$_POST["middleName"];
$lastName=$_POST["lastName"];
$email =$_POST["email"];
$pass=$_POST["pass"];
	//SQL statement to insert into the database
$sql = "INSERT INTO user (userID,firstName, midName, lastName, email, pass, postCode, addressLine1, addressLine2, userType)
VALUES (0,'$name','$middleName','$lastName','$email', '$pass','','','','1')";
if ($conn->query($sql)) {
	//if SQL complete a javascript pop-up will appear and tell that data have been inserted
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
include ('index.php');
}
else{
//if SQL not complete a pop-up will tell something went wrong and you will be redirect to 
	//registrationPage
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
include('registrationPage.php');
}
$conn = null;}
catch(PDOException $e){
echo $e->getMessage();}
?>