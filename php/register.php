<?php

$errors = array();
if(isset($_POST['register'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	if(file_exists("../data/user.xml")){
		if (property_exists('user',$username)) {
			$errors[] = 'Username already exists';
		}
	}
	if($username == ''){
		$errors[] = 'Username is blank';
	}
	if($email == ''){
		$errors[] = 'Email is blank';
	}
	if($password == '' || $c_password == ''){
		$errors[] = 'Passwords are blank';
	}
	if($password != $c_password){
		$errors[] = 'Passwords do not match';
	}
	if(count($errors) == 0){
		$xml = simplexml_load_file("../data/user.xml") or die("ERROR: Cannot load user.xml");
		$user = $xml->addChild("user");
		$xml->addChild('username', $username);
		$xml->addChild('password', $password);
		$xml->addChild('email', $email);
		$xml->asXML("../data/user.xml");
		header('Location: login.php');
		die;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container" style="background-color:ivory;">
		<div class="main">
			<h1 style="color:blue;text-align:center;">Messi</h1>
		</div>
		<nav class="navbar navbar-inverse  ">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.html">Messi</a>
				</div>
				<ul class="nav navbar-nav">
      <li class="active"><a href="home.html">Home</a></li>
      <li><a href="career.html">Carrer</a></li>
      <li><a href="achievement.html">Achievement</a></li>
      <li><a href="feedback.html">Feebback</a></li>
    </ul>
		<form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">
			<i class="glyphicon glyphicon-search"></i>
			</button>
    </form>
			
				<ul class="nav navbar-nav navbar-right">
					<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</nav>

		<div id="site_content">

			<div class="slideshow">
		
					<li class="show"><img width="100%" height="300" src="/images/messi.jpg" alt="&quot;Rent all the latest DVD&quot;" /></li>
			
			</div>
		</div>
		<div class="sidebar_container">
			<div class="sidebar">
				<div class="sidebar_item" style="color:red;text-align:center;width:100%;height:100px;font-style:italic;font-weight:bold;">
					<h1>	Welcome to our  website</h1>
				</div>
			</div>
	
	<div id="content">
	<div class="content_item">
		
		<div>
			<h1>
				Have an account already?<a href="login.php"> Click here!</a>
			</h1>
		</div>
		
			<h1>Sign up here:</h1>
		
			<section class="container">
				
				<div class="login">
<form class="form-horizontal"  method="post" action="" >
	
	<?php
		if(count($errors) > 0){
			echo '<u>';
			foreach($errors as $e){
				echo '<li>' . $e . '</li>';
			}
		}
	?>
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Username:</label>
    <div class="col-sm-5"> 
      <input type="username" name="username" class="form-control" id="pwd" placeholder="Enter username">
    </div>
  </div>
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd"> Email:</label>
    <div class="col-sm-5">
      <input type="text" name="email" class="form-control" id="pwd" placeholder="Enter email">
    </div>
	</div>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd"> Password:</label>
    <div class="col-sm-5">
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm password:</label>
    <div class="col-sm-5">
      <input type="password" name="c_password" class="form-control" id="pwd" placeholder="Confirm password">
    </div>
  </div>
	
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" value="register" name="register">
		</div>
  </div>
</form>
	
</body>
</html>