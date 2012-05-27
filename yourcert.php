<?php 
  require("functions.php");
  session_start();
  $validForm = true;
?>
<!DOCTYPE html 
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
	<meta name="description" content="Website of Certificate Management" />
	<meta name="author" content="Ming Ting, Chen" />
	<link rel="stylesheet" type="text/css" href="templates.css" />
	<title>SEC A2 | Your Certificate</title>
  </head>
  
  <body>
  	<h3>Your Certificate - <strong><?php echo $_SESSION['name']; ?></strong></h3>
  	<div>
  	<?php 
  	  $user = $_SESSION['username'];
  	  loadUserCertificate($user);
  	?>
  	
  	  <div id="register">
	  	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	  	  <table border="0">
	  	  	<tr>
	  	  	  <td class="title" align="center" colspan="2">Your Certificate Details:</td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">Common Name:</td>
	  	  	  <td class="input"><input type="text" name="commonName" value="<?php echo $_POST['commonName']; ?>" readonly="readonly"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">Organisation:</td>
	  	  	  <td class="input"><input type="text" name="org" value="<?php echo $_POST['org']; ?>" readonly="readonly"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">Organisation Unit :</td>
	  	  	  <td class="input"><input type="text" name="orgUnit" value="<?php echo $_POST['orgUnit']; ?>" readonly="readonly"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">City/Locality:</td>
	  	  	  <td class="input"><input type="text" name="city" value="<?php echo $_POST['city']; ?>" readonly="readonly"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">Stat/Province:</td>
	  	  	  <td class="input"><input type="text" name="state" value="<?php echo $_POST['state']; ?>" readonly="readonly"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">Country/Region:</td>
	  	  	  <td class="input"><input type="text" name="country" value="<?php echo $_POST['country']; ?>" readonly="readonly"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td class="title">Your Secret:</td>
	  	  	  <td class="input"><input type="text" name="secret" value="<?php echo $_POST['secret']; ?>"></input></td>
	  	  	</tr>
	  	  	<tr>
	  	  	  <td colspan="2" align="center">
	  	  	  	<input type="submit" name="sign" value="Sign It" class="registerButton"></input>
	  	  	  	<a href="main.php"><input type="button" value="Back" name="back"></input></a>
	  	  	  </td>
	  	  	</tr>
	  	  </table>
	  	</form>
	  </div>
	</div>
	<hr />
	<div id="registraionCompleted">
  	<?php
  	  if(isset($_POST["sign"]) && ($validForm == true)) {
  	  	$username = $_SESSION['username'];
  	  	$commonName = $_POST['commonName'];
  	  	$org = $_POST['org'];
  	  	$orgUnit = $_POST['orgUnit'];
  	  	$city = $_POST['city'];
  	  	$state = $_POST['state'];
  	  	$country = $_POST['country'];
  	  	$secret = $_POST['secret'];
  	  	
//   	  	signCertificate($username, $commonName, $org, $orgUnit, $city, $state, $country, $secret);
		
  	  	displayKey($username);
  	  	
  	  	echo "<h4>Certificate Signed!</h4>";
  	  	
  	  	echo "<table border='1'>";
  	  	  echo "<tr>";
  	  		echo "<td align='center'>";
			echo "Congratulation!! Your Certificate has been signed successfully!<br /><br />";
  	  		echo "<a href='main.php'><input type='button' value='OK' /></a>";
  	  		echo "</td>";
  	  	  echo "</tr>";
  	  }
  	?>
  	</div>
  </body>
</html>
