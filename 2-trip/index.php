<?php
$places = [
	'Írottkő',
	'Sárvár',
	'Sümeg',
	'Keszthely',
	'Tapolca',
	'Badacsonytördemic',
	'Nagyvázsony',
	'Városlőd',
	'Zirc',
	'Bodajk',
	'Szárliget',
	'Dorog',
	'Piliscsaba',
	'Hűvösvölgy',
	'Rozália téglagyár',
	'Dobogókő',
	'Visegrád',
	'Nagymaros',
	'Nógrád',
	'Becske',
	'Mátraverebély',
	'Mátraháza',
	'Sirok',
	'Szarvaskő',
	'Putnok',
	'Aggtelek',
	'Bódvaszilas',
	'Boldogkőváralja',
	'Sátoraljaújhely',
	'Hollóháza'
];

$tracknameError = null;
$fromError = null;
$toError = null;
$distanceError = null;
$successError = null;
$timeError = null;


$trackname = "";
$distance = "";
$from = "";
$to = "";
$time = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {

	$trackname = $_GET["trackname"];
	$distance = $_GET['distance'];
	$from = $_GET['from'];
	$to = $_GET['to'];
	$time = $_GET['time'];

	$tracknameError = null;
	$fromError = null;
	$toError = null;
	$distanceError = null;
	$successError = null;
	$timeError = null;

	if (empty($trackname)) {
		$tracknameError = "Trackname is required!";
	}

	if (empty($distance)) {
		$distanceError = "Distance is required!";
	} else if (!is_numeric($distance)) {
		$distanceError = "Distance is not numeric!";
	}

	if (empty($from)) {
		$fromError = "From is required!";
	} else if (!in_array($from, $places)) {
		$fromError = "From is not in places!";
	}

	if (empty($to)) {
		$toError = "To is required!";
	} else if (!in_array($to, $places)) {
		$toError = "To is not in places!";
	}

	// considered same if both is empty
	if ($from == $to /* (&& $to || $from)*/) {
		$fromError = "From and to can't be the same!";
		$toError = "From and to can't be the same!";
	}

	if (empty($time)) {
		$timeError = "Time is required";
	} else if (!preg_match('/^[0-7]:[0-5][0-9]$/', $time)) {
		$timeError = "Invalid format, required X:XX!";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
	<title>Task 2</title>
</head>

<body>
	<h1>Task 2: Trip registration</h1>
	<form action="index.php" method="get" novalidate>
		<label for="i1">Track name:</label> <input type="text" name="trackname" id="i1" value="<?= $trackname ?>"> <?php if (!is_null($tracknameError)) {
																														echo $tracknameError;
																													} ?><br>
		<label for="i2">From:</label> <input type="text" name="from" id="i2" value="<?= $from ?>"> <?php if (!is_null($fromError)) {
																										echo $fromError;
																									} ?><br>
		<label for="i3">To:</label> <input type="text" name="to" id="i3" value="<?= $to ?>"> <?php if (!is_null($toError)) {
																									echo $toError;
																								} ?><br>
		<label for="i4">Distance:</label> <input type="text" name="distance" id="i4" value="<?= $distance ?>"> <?php if (!is_null($distanceError)) {
																													echo $distanceError;
																												} ?><br>
		<label for="i5">Time:</label> <input type="text" name="time" id="i5" value="<?= $time ?>"> <?php if (!is_null($timeError)) {
																										echo $timeError;
																									} ?><br>
		<button type="submit">Register</button>
	</form>

	<?php

	if (is_null($tracknameError) && is_null($distanceError) && is_null($fromError) && is_null($toError) && is_null($timeError)) :
	?>
		<div id="success">
			<h2>Trip data saved!</h2>
			</div>
		<?php endif; ?>

		<h2>Hyperlinks for testing</h2>
		<a href="index.php?trackname=&from=&to=&distance=&time=">trackname=&from=&to=&distance=&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=&to=&distance=&time=">trackname=10.sz.+túra&from=&to=&distance=&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Budapest&to=&distance=&time=">trackname=10.sz.+túra&from=Budapest&to=&distance=&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=&distance=&time=">trackname=10.sz.+túra&from=Sárvár&to=&distance=&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Sárvár&distance=&time=">trackname=10.sz.+túra&from=Sárvár&to=Sárvár&distance=&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=&time=">trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=ezer&time=">trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=ezer&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=">trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=10">trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=10</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=10%3A60">trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=10%3A60</a><br>
		<a href="index.php?trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=4%3A10"><span style="color: green">Correct input: </span>trackname=10.sz.+túra&from=Sárvár&to=Dobogókő&distance=1000&time=4%3A10</a><br>

</body>

</html>