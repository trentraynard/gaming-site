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
                    <li><a href="searchgame.html">Search Games</a></li>
                    <li><a href="searchcustomer.html">Search Customers</a></li>
                </ul>
            </div> 
     </div>
     <div class="content">
        <div class="main">
            <h1>Customer Search Results</h1>
<?php
   include('../../db_connection_info.inc'); // username and password
  //input to variable
  $search = $_POST['search'];
 
  //check input
  if (!$search)
  {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }
  
$servername = "localhost";
$dbname = "traynard_project";
//connect to db
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno()) 
  {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
  
//query search
  $query = "SELECT * FROM raynard_trent_customers WHERE name LIKE '%".$search."%'";
  $result = $conn->query($query);
//show number of results
  $num_results = $result->num_rows;
//output result data
  echo '<p>Number of Customers found: '.$num_results.'</p>';
  for ($i=0; $i <$num_results; $i++)
  {
     $row = $result->fetch_assoc();
     echo '<p>'.($i+1).'. Customer: ';
     echo ($row['name']);
     echo '<br /> Address: ';
     echo ($row['address']);
     echo '<br />Email: ';
     echo ($row['email']);
     echo '</p>';
   }
 //close connection
  $result->free();
  $conn->close();

?>
        </div>
     </div>
     <div class="footer">
  By Trent Raynard CS85 2016
  </div>

</body>
</html>