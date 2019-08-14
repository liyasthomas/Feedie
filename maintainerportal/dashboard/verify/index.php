<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="../../../css.css">
	<link href="https://fonts.googleapis.com/css?family=Product+Sans:500,700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="../../../images/logo.png">
	<title>Feedie | Verify Registered Accounts</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
	<?php
       session_start();

       if (!isset($_SESSION["ma_username"])){
         sleep(1);
         header('Location: ../');
       }
  ?>
		<div class="header">
			<div><a href="../"><img src="../../../images/back.svg" class="home"></a></div>
			<img src="../../../images/logo.svg" class="logo" />
			<div class="title">Feedie</div>
			<a href="../../?logout=1">
				<div class="logout">Logout</div>
			</a>
		</div>
		<div class="wrapper">
			<div class="container">
				<form class="myform" action="" method="post">
					<div class="heading">Verify Registered Students</div>
                    <table>
                      <tr>
                        <th>Select</th>
                        <th>Full Name</th>
                        <th>Roll No.</th>
                        <th>Class</th>
                        <th>Date of Birth</th>
                        <th>Phone No.</th>
                        <th>Email Address</th>
                      </tr>
                    <div>
                      <?php
                        include('../../../db_config.php');
                        /*if ( $_POST["submit"] == "Activate" ) {
                          $errmsg = "Act";
                        }
                        else if ( $_POST["submit"] == "Delete" ) {
                          $errmsg = "Del";
                        } else {
                        	# code...
                        }*/
                  
                        $sql = "SELECT reg_id, st_username, rollno, class, DOB, phoneno, email, password FROM registrations ORDER BY reg_id DESC";
                        $result2 = $conn->query($sql);

                        if ( isset($_POST["r"]) AND isset($_POST["submit"]) ) {
						  $r = $_POST["r"];
						  if ( $result2->num_rows > 0 ) {
                            while ($row = $result2->fetch_assoc()) {
                              $reg_id = $row["reg_id"];
                              if ( isset($r[$reg_id]) ) {
                              	if ( $_POST["submit"] == "Activate" ) {
                                //echo $reg_id." "; //For identifying checked reg no.
                                  $sql3 = "INSERT INTO students (rollno, st_username, class, password) VALUES ('".$row["rollno"]."','".$row["st_username"]."','".$row["class"]."','".$row["password"]."')";
                                  $result3 = $conn->query($sql3);
                                }
                                
                                //echo "Selected student accounts activated! "; //For debugging purpose
                                $sql4 = "DELETE FROM registrations WHERE reg_id = '".$reg_id."'";
                                $result4 = $conn->query($sql4);
                                if ($result4) {
                                  //echo "Selected student accounts deleted! "; //For debugging purpose
                                }
                                else {
                                  $errmsg = "Sorry something went wrong! Please try again later!";
                                }
                                
                              }
                            }
                          }
                        }

                        $result = $conn->query($sql);

                        if ( $result->num_rows > 0 ) {
                          while ($row = $result->fetch_assoc()) {
                      ?>
                          <tr>
                          	<td><input type="checkbox" name="r[<?php echo $row["reg_id"]; ?>]" value="1"></td>
                            <td><?php echo $row["st_username"]; ?></td>
                            <td><?php echo $row["rollno"]; ?></td>
                            <td><?php echo $row["class"]; ?></td>
                            <td><?php echo $row["DOB"]; ?></td>
                            <td><?php echo $row["phoneno"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                          </tr>
                      <?php    
                          }
                        }
                      ?>
                    </div>
                    </table>
					<div class="phpr" style="color:red">
				      <label>
                      <?php   
          
                        if ( isset($errmsg) ) {
                          echo $errmsg; 
                        } 

                      ?>
                      </label>
					</div>
					<!--<button class="button">Activate</button>
					<button class="button">Delete</button>-->
					<input type="submit" class="button" name="submit" value="Activate">
					<input type="submit" class="button" name="submit" value="Delete">
				</form>
			</div>
		</div>
		<footer><a href="https://fuseorg.github.io/Feedie" class="link" target="_blank">Fuse Org</a></footer>
</body>

</html>
