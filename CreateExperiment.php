
<!DOCTYPE html>
<html>
<head>

<!-- your webpage info goes here -->

    <title>Ethics Approval System</title>

	<meta name="author" content="your name" />
	<meta name="description" content="" />

<!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->
	<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>

<!-- webpage content goes here in the body -->

	<div id="page">
		<div id="logo">
			<h1><a href="/" id="logoLink">Ethics Approval System</a></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">About</a></li>
				<li><a href="">Contact</a></li>
				<li><a href="Logout.php">Logout</a></li>
			</ul>
		</div>
		<div id="content">
			<h2>Login</h2>
      <form action="LoginPage.php">
        <p>

   <?php
					error_reporting('0');
					//include("db_conf.php");
					$con=mysqli_connect("localhost","root","","ethics_system");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
					session_start();


					$a=$_GET["name"];
					$b=$_GET["desc"];
					$c=$_GET["student1"];
					$d=$_GET["student2"];
					$e=$_GET["student3"];
					$f=$_GET["student4"];
					$g=$_GET["student5"];
					$h=$_SESSION["gatekeeperPerson"];
					
					if ($a !="" and $b !="" and $c !=""){
						$sql ="INSERT INTO experiment (name, description, student1, student2, student3, student4, student5, teacher) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h')";
						mysqli_query ($con,$sql) or die(mysqli_error()."<br>".$sql);
						header ("Location: HomePageLecturer.php");
					}
					else{
						echo "You cannot leave the first three fields empty";
						
					}

				?>

  
  </form>
  <button class= "button" value="Create" onclick="window.location='CreateExperiment.html' ;">Go Back</button>
		</div>
		<div id="footer">
			<p>
				Webpage made by <a href="/" target="_blank">[your name]</a>
			</p>
		</div>
	</div>
</body>
</html>
