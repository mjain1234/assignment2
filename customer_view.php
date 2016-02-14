<?php // query.php

// require_once 'login.php';

// login.php
$hn = 'www.it354.com';
$db = 'it354_students';
$un = 'it354_students';
$pw = 'steinway';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM customers";
$result = $conn->query($query);
if (!$result) die($conn->error);

$rows = $result->num_rows;
?>

<html>
    <head> 

<link href="bootstrap1/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap1/dist/js/bootstrap.min.js"></script>

	</head> 
	<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Assignment 2</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="customer_add.html">Add <span class="sr-only">(current)</span></a></li>
        <li><a href="customer_view.php">View</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<table class="table table-hover">
 <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
		 <th>City</th>
        <th>State</th>
        <th>Zip</th>
		 <th>Email</th>
        <th>Phone</th>
        
      </tr>
	  </thead>
<?php for ($j = 0 ; $j < $rows ; ++$j)
  { $result->data_seek($j);
   $row = $result->fetch_array(MYSQLI_ASSOC);
  ?>
  
  <tr>
    <td><?php echo $row['firstName'] . '<br>'; ?> </td>
    <td><?php echo $row['lastName'] . '<br>'; ?> </td>
	<td><?php echo $row['address'] . '<br>'; ?> </td>
    <td><?php echo $row['city'] . '<br>'; ?> </td>
	<td><?php echo $row['state'] . '<br>'; ?> </td>
	<td><?php echo $row['zip'] . '<br>'; ?> </td>
	<td><?php echo $row['email'] . '<br>'; ?> </td>
	<td><?php echo $row['phone'] . '<br><br>'; ?> </td>
</tr>
<?php } ?>
</table>
</body>
</html>

<?php
$result->close();
$conn->close();
?>