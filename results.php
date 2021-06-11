<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
<html>
	<head>
		<title>Online Quiz</title>
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
		<main>
			<div style="background-color: honeydew;padding: 2% 0% 0% 35%;">
			<h1>PHP-Quiz</h1>
			<h2>Congratulations!</h2> 
				<p>You have successfully completed the test</p>
				<p>Total points: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
		<a href="question.php?n=1" class="start" >Start Again</a>
		<a href="home.php" class="start">Go Home</a>
		</div>
		</main>
		</body>
		</html>

		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>

