<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <?php 
    
$hn = 'www.it354.com';
$db = 'it354_students';
$un = 'it354_students';
$pw = 'steinway';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

    $first=$_POST['fname'];//this values comes from html file after submitting 
    $last=$_POST['lname']; 
	$address = $_POST['add'];
	$city = $_POST['city'];
    $state = $_POST['state'];
	$zip = $_POST['zip'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    
		//insert query 
        $query = "INSERT INTO customers (firstName,lastName,address,city,state,zip,email,phone)
					VALUES ('$first','$last','$address','$city','$state','$zip','$email','$phone')";
       // mysql_query($query); 
       if( $conn->query($query) == true){
        echo "<script type='text/javascript'>\n";
        echo "alert('Customer is succesflly added');\n"; 
		echo "window.location.href='index.html'"; // redirect to index.file after adding a customer successfully
        echo "</script>";
		//header('Location: index.html') ; exit;
       }
       else
       {
           echo "error".$query."<br>".$conn->error; //Error message in case of problem with connection 
       }
       $conn->close(); 
	   echo "Added Customer";
	   
	   ?> 
