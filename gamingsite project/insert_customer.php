<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SMC Gaming INC</title>
        <link rel="stylesheet" href="layout.css">
    </head>
   <div class="container">
      <div class="header">
            <h1 class="header-heading">SMC Gaming INC</h1>
        </div>
            <div class="nav-bar">
                <ul class="nav">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="newgame.html">Add New Game</a></li>
                    <li><a href="newcustomer.html">Add New Customer</a></li>
                    <li><a href="searchcustomer.html">Search Customers</a></li>
                    <li><a href="searchgame.html">Search Games</a></li>
                </ul>
          </div> 
    </div>
      <div class="content">
            <div class="main">
            <h1>Inserting new customer</h1>
<?php

include('../../db_connection_info.inc'); // username and password
  // user input into variables

  $name=$_POST['name'];
  $address=$_POST['address'];
  $email=$_POST['email'];
 //check if all input is given
  if (!$name || !$address || !$email)
  {
     echo 'You have not entered all the required details.<br />'
          .'Please go back and try again.';
     exit;
  }

  // connect to db
$servername = "localhost";
$dbname = "traynard_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) 
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
  // insert values into db
  $query = "INSERT INTO raynard_trent_customers values 
            ('NULL','".$name."', '".$address."', '".$email."')" ;
            
  $result = $conn->query($query);
  
  //  output
  // check for error
  if ($conn->error) 
     echo 'MySQL error: ' . $conn->error; 
  
  if ($result)
      echo  $conn->affected_rows.' customer inserted into database.'; 
//close connection
  $conn->close();
?>
        </div>
   </div>
 
  <div class="footer">
  By Trent Raynard CS85 2016
  </div>
 
</body>
</html>