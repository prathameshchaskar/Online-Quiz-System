<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title> Online Quiz System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/png" href="image/book.png" />

<style>
  .start{
    text-decoration: none;display: inline-block;border-radius: 21px;
    border: 3px solid cornflowerblue;padding: 6px 13px;color:black;
  }
  .start:hover{
    color: #000;
    border-color: black;
    background-color: cyan;
  }
</style>



</head>
<body style="background-color: honeydew;">

<nav class="navbar navbar-clean">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> Online Quiz System</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="players.php">Players</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="exit.php" class="add">logout</a></li>
      </ul>
    </div> 
  </div> 
</nav>

		<main>
			<div style="padding: 2% 0% 0% 35%;">
        <h1>PHP-Quiz</h1>
				<h2>Welcome to PHP Quiz !</h2>
				<p>This is just a simple quiz game to test your knowledge!</p>
				<ul>
				    <li><strong>Number of questions: </strong><?php echo $total; ?></li>
				    <li><strong>Type: </strong>Multiple Choice</li>
				    <li><strong>Estimated time for each question: </strong><?php echo $total * 0.05 * 60; ?> seconds</li>
				    <li><strong>Score: </strong>   &nbsp; +1 point for each correct answer</li>
				</ul>
				<a href="question.php?n=1" class="start">Start Quiz</a>
				
			</div>
		</main>

	</body>
</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>