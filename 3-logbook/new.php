<?php
require_once "storage.php";

$tracksJson = new Storage(new JsonIO("./tracks.json"));
$tracks = $tracksJson->findAll();

$logsJson = new Storage(new JsonIO("./logs.json"));
$logs = $logsJson->findall();

$mateArrays = array_column($logs, "fellowsText");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {

  $track = $_POST['track'];
  $dateFrom = $_POST['date-from'];
  $dateTo = $_POST['date-to'];
  $fellows = $_POST['fellows'];
  $log = $_POST['log'];
  $fellowsText = $_POST['fellow-text'];

  if ($fellowsText != "") {
    $fellowsText = explode(",", $fellowsText);
  }

  $rating = $_POST['rating'];

  if ($fellowsText) {
    $fellows = array_merge($fellows, $fellowsText);
  }

  $rec = [
    "track" => $track,
    "from" => $dateFrom,
    "to" => $dateTo,
    "log" => $log,
    "fellows" => $fellows,
    "rating" => $rating
  ];

  $logsJson->add($rec);

  header("Location: index.php");
}

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
  <h2>New log</h2>
  <form action="" method="post">
    Track: <br>
    <select name="track" required>
      <option value="1">1. From1 - To1</option>
      <option value="2">2. From1 - To2</option>
      <?php

      foreach ($tracks as $track) {
        $id = $track["id"];
        $from = $track["from"];
        $to = $track["to"];
        echo "<option value='$id'>$id. $from - $to</option>";
      }

      ?>
    </select> <br>
    Date interval: <br>
    <input type="date" name="date-from" required> - <input type="date" name="date-to" required> <br>
    Log: <br>
    <textarea name="log" cols="120" rows="10" placeholder="Write your experiences here..." required></textarea> <br>
    Fellows: <br>
    <input type="checkbox" name="fellows[]" value="Name1"> Name1 <br>
    <input type="checkbox" name="fellows[]" value="Name2"> Name2 <br>
    <input type="checkbox" name="fellows[]" value="Name3"> Name3 <br>
    <?php

    $mates = array_unique(array_reduce($mateArrays, 'array_merge', array()));

    foreach ($mates as $mate) {
      if ($mate !== '') {
        echo "<input type='checkbox' name='fellows[]' value='$mate'> $mate <br>";
      }
    }

    ?>
    <small>Add new fellows as a comma-separated list:</small> <br>
    <textarea name="fellow-text" cols="20" rows="8" placeholder="fellow1,fellow2"></textarea> <br>
    Rating: <br>
    <input type="radio" name="rating" value="1" required> 1
    <input type="radio" name="rating" value="2"> 2
    <input type="radio" name="rating" value="3"> 3
    <input type="radio" name="rating" value="4"> 4
    <input type="radio" name="rating" value="5"> 5
    <br>
    <button type="submit">Add new track</button>
  </form>
</body>

</html>