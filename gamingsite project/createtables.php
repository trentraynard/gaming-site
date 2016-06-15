<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>SMC Gaming INC</title>
        <link rel="stylesheet" href="layout.css">
    </head>
    <body>
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
    <h1>Loading previous customer and game data...</h1>
<?php

 include('../../db_connection_info.inc'); // username and password
$servername = "localhost";
$dbname = "traynard_project";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// sql to create tables
//drop table if exist
$result= mysqli_query($conn, 'DROP TABLE IF EXISTS raynard_trent_customers') or die(mysqli_error()); 
//create table
$sql = "CREATE TABLE raynard_trent_customers (
customerID INT(11) NOT NULL AUTO_INCREMENT, 
name VARCHAR(25) default NULL,
address VARCHAR(30) default NULL,
email VARCHAR(30) default NULL,
PRIMARY KEY (customerID)
)";
//show result
if (mysqli_query($conn, $sql)) {
    echo "Customer Table created successfully" . '<br />';
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
//drop table if exist
$result= mysqli_query($conn, 'DROP TABLE IF EXISTS raynard_trent_games') or die(mysqli_error()); 
//create table
$sql = "CREATE TABLE raynard_trent_games (
gameID INT(11) NOT NULL AUTO_INCREMENT, 
title VARCHAR(25) default NULL,
year_released INT(4) default NULL,
price INT(5) default NULL,
PRIMARY KEY (gameID)
)";
//show results
if (mysqli_query($conn, $sql)) {
    echo "Game Table created successfully". '<br />';
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
//inserting values into tables
$sql = "INSERT INTO raynard_trent_customers VALUES
  (1, 'Travis Lee', '42 Street', 'tlee@aol.com'),
  (2, 'David Snake', 'Highland Dr', 'dsnake@aol.com'),
  (3, 'Henry Sanchez', '2nd Street', 'hensan@aol.com'),
  (4, 'Mark Franco', 'Bell St', 'markf@aol.com')
  ";
//show results
if (mysqli_query($conn, $sql)) {
    echo "Customer values inserted successfully". '<br />';
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
//insert values
$sql = "INSERT INTO raynard_trent_games VALUES
  (1, 'Overwatch', 2016 , 60),
  (2, 'Total War', 2016, 50),
  (3, 'Star Wars', 2007, 30),
  (4, 'The Division', 2015, 50),
  (5, 'Dark Souls', 2008, 40)
  ";
//results
if (mysqli_query($conn, $sql)) {
    echo "Game values inserted successfully". '<br />';
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
//close connection
mysqli_close($conn);
?>   
         </div>
     </div>
     <div class="footer">
  By Trent Raynard CS85 2016
  </div>
 </body>
</html>
</body>
</html>