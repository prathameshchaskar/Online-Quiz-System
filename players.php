<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html>
	<head>
    <title> Online Quiz System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="shortcut icon" type="image/png" href="image/book.png" />
</head>
<body>

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
        <li class="active"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
        
        <li><a href="#players.php">Players</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="exit.php" class="add">logout</a></li>
      </ul>
    </div> 
  </div> 
</nav>


	<h1> All Quiz Players</h1>
	<table class="data-table">
		
		<thead>
			<tr>
			<th>Player Id</th>
			<th>Email</th>
			<th>Played On</th>
			<th>Score</th>
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php } 
else {
	header("location: home.php");
}
?>

