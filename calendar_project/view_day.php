<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="view_day.css">
  <title>View Day Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="jquery.js"></script>
</head>


<body>
  <script>
    function returnCheckbox() {
      var count = document.querySelectorAll("input[name='checkbox[]']:checked").length;
      if ($('input:checkbox').is(':checked')) {
        return confirm('Do you want to delete all selected "' + count + '"tasks?');

      } else {
        alert("You need to check at least 1.");
        return false;
      }

    }
  </script>
  <!-- <script>
    var sendDate = decodeURIComponent(window.location.search);
    sendDate = sendDate.substring(1);

    alert(sendDate);
  </script> -->
  <?php
  session_start();

  include("config.php");

  if (!isset($_SESSION["v_date"])) {
    $date = $_GET['date'];
    $tasks = mysqli_query($miye, "SELECT * FROM task WHERE date='" . $date . "' ");
  } else {
    $date = $_SESSION["v_date"];
    $tasks = mysqli_query($miye, "SELECT * FROM task WHERE date='" . $date . "' ");
  }
  $_SESSION["s_date"] = $date;

  if (isset($_POST['back'])) {
    unset($_SESSION['v_date']);
    header("location:index.php?");
  }

  if (isset($_POST['add'])) {
    header("location:add_new_task.php?");
  }



  if (isset($_POST['delete'])) {

    if (!empty($_POST['checkbox'])) {
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
    
  }
  ?>
  <div id="container">
    <div id="day">
      <h1><?php
          echo date("jS F Y", strtotime($date));
          ?></h1>
    </div>
    <div id="table_title">
      <h3>Task lists</h3>
    </div>

    <form action="" method="post">

      <table>
        <tr>
          <th>ID</th>
          <th>Task name</th>
          <th>Memo</th>
          <th>Color</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($tasks)) { ?>
          <tr>
            <td name="id"><?php echo $row['id']; ?></td>
            <td name="vname"><?php echo $row['task_name']; ?></td>
            <td name="vmemo"><?php echo $row['memo']; ?></td>
            <td name="vcolor" style="background:<?php echo   $row['color']   ?> ;"></td>
            <td name="edit"><a href="edit_page.php?id=<?php echo $row['id'] ?>" style="text-decoration: none;color:blue" name="edit">Edit</a></td>
            <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['id'] ?>"></td>
          </tr>
        <?php
        }
        ?>
      </table>
      <div id="buttons">
        <div id="left">
          <input type="submit" id="back" name="back" value="&lt;&nbsp;&nbsp;&nbsp;Back">
        </div>
        <div id="right">
          <input type="submit" id="add" name="add" value="Add">
          <input type="submit" id="delete" name="delete" value="Delete" onclick="return returnCheckbox()">

        </div>
      </div>
    </form>
  </div>
</body>

</html>