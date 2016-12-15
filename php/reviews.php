<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Movie reviews</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- <script src="js/bootstrap.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="main">
			<h1 style="text-align:center;color:green;">Messi</h1>
		</div>
		<nav class="navbar navbar-inverse  ">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php">Home</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li><a href="../latest movie.html">Latest Movies</a></li>
					</ul>
				</div>

				<div class="navbar-header">
					<a class="navbar-brand" href="reviews.php">Review a movie</a>
				</div>


				<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log out</a></li>
					</ul>
			</div>
		</nav>

		<div class="container">
			<h1 style="text-align:center">
					 <img src="/images/goldstar.jpg" alt="picture"> Your star review page <img src="/images/goldstar.jpg" alt="picture">
				</h1>
		</div>

		<div class="container">
			<h2>Feedback Display</h2>
			<div class="panel panel-default">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Reviewers Name</th>
							<th>Movies</th>
							<th>Star Rating</th>
							<th>Your Review</th>
						</tr>
					</thead>
					<tbody>
						<?PHP
  						$xml=simplexml_load_file("../data/reviews.xml") or die("ERROR: Cannot load reviews.xml file.");
 							$n = 1; // simple counter
 							foreach($xml->children() as $review) {
 								echo "<tr>"; // beginning of row
								echo "<th scope=\"row\">" . $n . "</th>";

 								foreach($review->children() as $child){
									 echo "<td>" . $child . "</td>";
					 			}

								echo "</tr>"; // end of row
 								$n++;
	 						}

 						?>

					</tbody>
				</table>
			</div>
		</div>
		<div class="container">

			<!-- form -->
			<form method="post" name="Form1" id="reviewForm" action="reviewProcessor.php">

				<div class="form-group">
					<label for="name">Enter your name: </label>
					<input name="name" class="form-control" id="pwd" placeholder="Set name to anything!" style="width:30%">
				</div>

				<div class="form-group">
					<label for="movies">Topics </label>
					<select class="custom-select" id="movies" name="movie">
						<option value="Select a movie">None</option>
						<option value="Arrival">Career</option>
						<option value="Badsanta2">Bad Santa 2</option>
						<option value="Sully">Sully</option>
						<option value="Collateral Beauty">Collateral Beauty</option>
					</select>
				</div>

				<div class="form-group">
					<label for="rating">Star rating:</label>
					<label class="radio-inline" name="star"><input type="radio" name="rating"
					value="1">1 star</label>
					<label class="radio-inline"><input type="radio" name="rating"
					value="2">2 stars</label>
					<label class="radio-inline"><input type="radio" name="rating"
					value="3">3 stars</label>
					<label class="radio-inline"><input type="radio" name="rating"
					value="4">4 stars</label>
					<label class="radio-inline"><input type="radio" name="rating"
					value="5">5 stars</label>
				</div>

				<div class="form-group">
					<label for="text">Your review: </label>
					<textarea class="form-control" id="text" name="text" rows="3" style="minwidth:100%"></textarea>
				</div>

				<input id="submit" name="submit" type="submit" value="Post" class="btn btn-primary">

			</form>
			<script type="text/javascript">
				$(function() {
					$("#reviewForm").validate({
						rules: {
							"name": "required",
							"movie" : "required",
							"rating" : "required",
							"text" : "required"
						},
						// messages: {},
						submitHandler: function(form) {
							form.submit();
						}
					});
				});
			</script>

		</div>
	<hr/>
		<a href="php/changepassword.php">Change Password</a>
		<a href="php/logout.php">Logout</a>
</body>
</html>
