<?php
session_start();
if(!file_exists("../data/user.xml")){
	header('Location: login.php');
	die;
}
$error = false;
if(isset($_POST['change'])){
	$old = $_POST['o_password'];
	$new = $_POST['n_password'];
	$c_new = $_POST['c_n_password'];
	
	$xml = simplexml_load_file("../data/user.xml");
	if($old == $xml->password){
		if($new == $c_new){
			$xml->password = $new;
			$xml->asXML("../data/user.xml");
			header('Location: logout.php');
			die;
		}
	}
	$error = true;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Change password</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="/css/bootstrap.min.css">
 <script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="background-color:ivory;">
  <div class="main">
 <h1 style="color:blue;text-align:center;">International 5 star Movie Review</h1>
  </div>
  <nav class="navbar navbar-inverse  ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../latestmovie.html">Latest Movies</a></li>
			<li><a href="reviews.php">Review a movie</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
					</ul>
  </div>
</nav>
  	
<div id="site_content">		

      <div class="slideshow">
	    <ul class="slideshow">
          <li class="show"><img width="100%" height="300" src="/images/home_1.jpg" alt="&quot;Rent all the latest DVD&quot;" /></li>
        </ul> 
	  </div>	
  </div>
  <div class="sidebar_container">       
			<div class="sidebar">
			  <div class="sidebar_item" style= "color:red;text-align:center;width:100%;height:100px;font-style:italic;font-weight:bold;">
				<h1 >	Welcome to our  website</h1>
			  </div>
			  </div>
	
	<div id="content">
	<div class="content_item">
		<?php
		if($error){
			echo '<h3>*Some of the passwords do not match*</h3>';
		}
		?>
			<h1>Change Password:</h1>
		
			<section class="container">
				
				<div class="login">
<form class="form-horizontal"  method="post" action="" >
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Old password:</label>
    <div class="col-sm-5"> 
      <input type="password" name="o_password" class="form-control" id="pwd" placeholder="Enter old password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">New password:</label>
    <div class="col-sm-5">
      <input type="password" name="n_password" class="form-control" id="pwd" placeholder="Enter new password">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm new password:</label>
    <div class="col-sm-5">
      <input type="password" name="c_n_password" class="form-control" id="pwd" placeholder="Confirm password">
    </div>
	</div>
	
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" value="change" name="change">
		</div>
  </div>
</form>
					<div>
					<h1>
						Don't have an account?<a href="register.php"> Sign Up</a>
						</h1>
				</div>
				</div>								
			</section>
	
			  
	</div>
	</div>
	</div> 
		
	  
	</div>
	
</body>
</html>