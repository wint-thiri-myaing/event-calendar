<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  include("config.php");
  if (!empty($_POST['checkbox'])) {
    $count = count($_POST['checkbox']);
    // Loop to store and display values of individual checked checkbox.
    foreach ($_POST['checkbox'] as $selected) {
      $d_event = mysqli_query($miye, "DELETE FROM task where id='" . $selected . "' ");

      if (!isset($_SESSION["v_date"])) {
        $date = $_GET['date'];
        // echo "Indexdate is" . $date;
        $tasks = mysqli_query($miye, "SELECT * FROM task WHERE date='" . $date . "' ");
      } else {
        $date = $_SESSION["v_date"];
        // echo "Vdate is" . $date;
        $tasks = mysqli_query($miye, "SELECT * FROM task WHERE date='" . $date . "' ");
      }
      // mysqli_close($miye);
    }
  }
  ?>
</body>
</html>