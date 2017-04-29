
<!DOCTYPE html>
<html>
<head>

<!-- your webpage info goes here -->

    <title>Ethics Approval System</title>

	<meta name="author" content="Najah" />
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
				<li><a href="LoginPage.html">Login</a></li>
			</ul>
		</div>
		<div id="content">
			<h2>Login</h2>
      <form action="LoginPage.php">
        <p>

   <?php
					error_reporting('0');
					//include("db_conf.php");
   $db_host = "127.0.0.1:52967";
   $db_username = "root";
   $db_password= "";
   $db_name = "ethics_system";

   $con = mysqli_connect($db_host,$db_username,$db_password,$db_name) or die();

  // $con=mysqli_connect("127","root","","ethics_system");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
					session_start();

					$a=$_GET["uname"];
					$b=$_GET["password"];
					
					
					$resultadmin = mysqli_query ($con,"select * from admin where adminusername='$a' and adminpassword='$b'");
					$resultstudent = mysqli_query ($con,"select * from student where username='$a' and password='$b'");
					$resultlecturer = mysqli_query ($con,"select * from teacher where username='$a' and password='$b'");
					$resulteao = mysqli_query ($con,"select * from eao where username='$a' and password='$b'");

					$rowadmin= mysqli_fetch_array ($resultadmin);
					$rowstudent= mysqli_fetch_array ($resultstudent);
					$rowlecturer= mysqli_fetch_array ($resultlecturer);
					$roweao= mysqli_fetch_array ($resulteao);
					
					if (mysqli_num_rows($resultadmin)==0)
					{	
						if (mysqli_num_rows($resultstudent)==0)
						{	
						//echo "Your Username or Password is wrong";
							if (mysqli_num_rows($resultlecturer)==0)
							{	
								if (mysqli_num_rows($resulteao)==0)
								{	
									echo "Your Username or Password is wrong";
							}
								else
								{
									//echo "Your Username or Password is correct";
									$_SESSION["gatekeeper"] = $roweao["firstname"] ;
									//echo $_SESSION["gatekeeper"];
									$_SESSION["gatekeeperPerson"] = $a;
									header ("Location: HomePageEAO.php");
								}
							}
							else
							{
								//echo "Your Username or Password is correct";
								$_SESSION["gatekeeper"] = $rowlecturer["firstname"] ;
								//echo $_SESSION["gatekeeper"];
								$_SESSION["gatekeeperPerson"] = $a;
								header ("Location: HomePageLecturer.php");
							}
						}
						else
						{
							//echo "Your Username or Password is correct";
							$_SESSION["gatekeeper"] = $rowstudent["firstname"] ;
							$_SESSION["gatekeeperPerson"] = $a;
							header ("Location: HomePageStudent.php");
						}
						//echo "Your Username or Password is wrong";
					}
					else
					{
						//echo "Your Username or Password is correct";
						$_SESSION["gatekeeper"] = "Admin";
						$_SESSION["gatekeeperPerson"] = $a;
						header ("Location: HomePageAdmin.php");
					}

				?>

    <input type="submit" value="Submit">
  </form>
		</div>
		<div id="footer">
			<p>
				Webpage made by <a href="/" target="_blank">Najah</a>
			</p>
		</div>
	</div>
</body>
</html>
