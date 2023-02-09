<?php
require_once "storage.php";

$logsJson = new Storage(new JsonIO("logs.json"));
$log = $logsJson->findById($_GET['id']);

$track = $log["track"];
$from = $log["from"];
$to = $log["to"];
$log = $log["log"];
//$rating = $log["rating"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task 3</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <h1>Task 3: Logbook</h1>
  <a href="index.php">Back to main page</a>
  <h2>Log details</h2>
  <a href="">Edit log</a>
  <dl>
    <dt>Track</dt>
    <dd><?php echo "$track. $from - $to" ?></dd>

    <dt>Date</dt>
    <dd><?php echo "$from - $to" ?></dd>

    <dt>Log</dt>
    <dd>First line<br>Second line</dd>

    <dt>Fellows</dt>
    <dd>Name1,Name2,Name3</dd>

    <dt>Rating</dt>
    <dd><?php echo $rating ?></dd>
  </dl>

</body>

</html>