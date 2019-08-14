<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="../../css.css">
	<link href="https://fonts.googleapis.com/css?family=Product+Sans:500,700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="../../images/logo.png">
	<title>Feedie | Maintainer Dashboard</title>
</head>

<body>
	<div class="header">
		<div><a href="../"><img src="../../images/home.svg" class="home"></a></div>
		<img src="../../images/logo.svg" class="logo" />
		<div class="title">Feedie</div>
		<a href="../?logout=1">
			<div class="logout">Logout</div>
		</a>
	</div>
	<div class="details">
		Hi,
		<?php
  	   session_start();

       if (!isset($_SESSION["ma_username"])){
         sleep(1);
         header('Location: ../');
       }

  	   echo $_SESSION["ma_username"];
  	  ?>
			<!--
     
     Change password feature is currently disabled. will be provide in future.
      <div class="changepw">
        <a href="changepw" class="link">Change password</a>
      </div>
			-->
	</div>
	<div class="page">
		<div class="container">
			<div class="heading">Maintainer Dashboard</div>
			<a href="students" class="button">Edit Students List</a>
			<a href="classes" class="button">Add Classes</a>
			<a href="verify" class="button">Verify Registered Students</a>
			<a href="changeqs" class="button">Change Questions</a>
			<a href="changesr" class="button">Change Star Rating</a>
			<a href="changeoverall" class="button">Change Overall</a>
		</div>
	</div>
	<footer><a href="https://fuseorg.github.io/Feedie" class="link" target="_blank">Fuse Org</a></footer>
</body>

</html>
