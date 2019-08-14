<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="../../../css.css">
	<link href="https://fonts.googleapis.com/css?family=Product+Sans:500,700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="../../../images/logo.png">
	<title>Feedie | Add Classes</title>
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
					<div class="heading">Add New Classes</div>
                    <input type="text" class="inputvalue" name="class" placeholder="Enter New Class Name" />
					<div class="phpr" style="color:red">
					  <label>
                      <?php   
          
                        include('../../../db_config.php');
                        if ( isset($_POST["class"]) ) {
                          $sql = "INSERT INTO classes (class_name) VALUES ('".$_POST["class"]."')";
                          $result = $conn->query($sql);
                          if ($result) {
                            echo $_POST["class"]." inserted!";
                          }
                          else {
                            echo "Sorry try again! Something went wrong!";
                          }
                        }
          
                      ?>
                      </label>
					</div>
					<button class="button">Submit</button>
				</form>
			</div>
		</div>
		<footer><a href="https://fuseorg.github.io/Feedie" class="link" target="_blank">Fuse Org</a></footer>
</body>

</html>
