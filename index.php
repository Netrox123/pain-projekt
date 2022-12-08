<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pain</title>
	<link rel="stylesheet" href="indexy.css">
</head>
<body>
<div id="box1">
<h1 id="uczenheader">Student</h1>
<form id="Student_form"action="index.php"method="POST">

	<input type="text" name="first" placeholder="Imie" id="placeholder"><br><br>
	<input type="text" name="second" placeholder="Nazwisko"id="placeholder"><br><br>
	<input type="text" name="third" placeholder="Numer klasy"id="placeholder"><br><br>
	<button type="submit" name="submit" id="buttonn">DODAJ DANE</button>
</form>
<table id="table">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Surname</th>
	<th>Class_id</th>
</tr>

	<?php
	if (isset($_POST['first'])){
	$first = $_POST['first'];
	$second = $_POST['second'];
	$third = $_POST['third'];

	$sql = "INSERT INTO student (name, surname, class_id) VALUES ('$first','$second','$third');";
	mysqli_query($con, $sql);

	$sql = "SELECT id, name, surname, class_id from student";
	$result = $con-> query($sql);

	if ($result-> num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>".  $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["surname"] ."</td><td>". $row["class_id"] ."</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}

	$con-> close();
}
?>
</table>
</div>


<div id="box1">
<h1 id="uczenheader">Przedmiot</h1>
<form id="Student_form"action="index.php"method="POST">

	<input type="text" name="jeden" placeholder="Nazwa Przedmiotu"id="placeholder"><br><br>
	<input type="text" name="dwa" placeholder="Numer klasy"id="placeholder"><br><br>
	<input type="text" name="trzy" placeholder="Imie nauczyciela"id="placeholder"><br><br>
	<button type="submit" name="submit" id="buttonn">DODAJ DANE</button>
</form>
<table id="table">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Class_id</th>
	<th>Teacher</th>
</tr>
	<?php
	if (isset($_POST['jeden'])){
	$jeden = $_POST['jeden'];
	$dwa = $_POST['dwa'];
	$trzy = $_POST['trzy'];

	$sql = "INSERT INTO subject (name, class_id, teacher) VALUES ('$jeden','$dwa','$trzy');";
	mysqli_query($con, $sql);

	$sql = "SELECT id, name, class_id, teacher from subject";
	$result = $con-> query($sql);

	if ($result-> num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>".  $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["class_id"] ."</td><td>". $row["teacher"] ."</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}

	$con-> close();
}
?>
</table>
</div>


<div id="box1">
<h1 id="uczenheader">Sala</h1>
<form id="Student_form"action="index.php"method="POST">

	<input type="text" name="jed" placeholder="Nazwa sali" id="placeholder"><br><br>
	<input type="text" name="da" placeholder="Numer sali"id="placeholder"><br><br>
	<button type="submit" name="submit" id="buttonn">DODAJ DANE</button>
</form>
<table id="table">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Number</th>
</tr>
	<?php
	if (isset($_POST['jed'])){
	$jed = $_POST['jed'];
	$da = $_POST['da'];

	$sql = "INSERT INTO class (name, number) VALUES ('$jed','$da');";
	mysqli_query($con, $sql);
	
	$sql = "SELECT id, name, number from class";
	$result = $con-> query($sql);

	if ($result-> num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>".  $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["number"] . "</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}

	$con-> close();
	}
?>
</table>
</div>


<div id="box1">
<h1>Nauczyciel</h1>
<form id="Student_form"action="index.php"method="POST">

	<input type="text" name="jedenn" placeholder="Imie nauczyciela"id="placeholder"><br><br>
	<input type="text" name="dwaa" placeholder="Nazwisko nauczyciela"id="placeholder"><br><br>
	<input type="text" name="trzyy" placeholder="Wiek nauczyciela"id="placeholder"><br><br>
	<button type="submit" name="submit" id="buttonn">DODAJ DANE</button>
</form>
<table id="table">
<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Surname</th>
	<th>Age</th>
</tr>
	<?php
	if (isset($_POST['jedenn'])){
	$jedenn = $_POST['jedenn'];
	$dwaa = $_POST['dwaa'];
	$trzyy = $_POST['trzyy'];

	$sql = "INSERT INTO teacher (name, surname, age) VALUES ('$jedenn','$dwaa','$trzyy');";
	mysqli_query($con, $sql);

	$sql = "SELECT id, name, surname, age from teacher";
	$result = $con-> query($sql);

	if ($result-> num_rows > 0) {
		while ($row = $result-> fetch_assoc()) {
			echo "<tr><td>".  $row["id"] ."</td><td>". $row["name"] ."</td><td>". $row["surname"] ."</td><td>". $row["age"] ."</td></tr>";
		}
		echo "</table>";
	}
	else {
		echo "0 result";
	}

	$con-> close();
		
}
?>
</table>
</div>
<a href="logout.php" id="logout">LOGOUT</a>
</body>
</html>