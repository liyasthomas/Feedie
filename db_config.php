<?php   
  /*$servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "feedie_base";
            
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  */

  $whitelist = array('127.0.0.1', "::1");

  if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // not valid
    $servername = "sql300.epizy.com";
    $username = "epiz_24117066";
    $password = "fuseorg";
    $dbname = "epiz_24117066_feedie_base";
            
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error."<br>"."Please try to connect with Localhost");
    }
  }
  else {
  	$servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "feedie_base";
            
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error."<br>"."Failed to connect with Localhost");
    }
  }
  
?>
