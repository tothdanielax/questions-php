<?php

require_once "storage.php";

$logsJson = new Storage(new JsonIO("logs.json"));
$logs = $logsJson->findAll();

$tracksJson = new Storage(new JsonIO("tracks.json"));
$tracks = $tracksJson->findAll();


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
  <a href="new.php">Add new log...</a>

  <h2>1. From1 - To1</h2>
  <ul>
    <li>2023-01-11 - 2023-01-13</li>
  </ul>

  <h2>2. From2 - To2</h2>
  <ul>
    <li>2022-04-14 - 2022-04-14</li>
    <li>2022-04-21 - 2022-04-22</li>
  </ul>

  <?php

  $generatedAlready = array();

  foreach ($tracks as $track) {

    $result = $logsJson->findMany(function ($log) use ($track) {
      return $log['track'] == $track['id'];
    });


    if (!empty($result)) {
      $id = $track['id'];
      $fromPlace = $track['from'];
      $toPlace = $track['to'];

      echo "<h2>$id. $fromPlace - $toPlace</h2>";
      echo "<ul>";

      foreach ($result as $r) {

        $fromDate = $r['from'];
        $toDate = $r['to'];
        $logId = $r['id'];

        echo "<li><a href='log.php?id=$logId'>$fromDate - $toDate</a></li>";
      }

      echo "</ul>";
    }
  }
  ?>

</body>

</html>