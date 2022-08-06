<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Page</title>
  <link rel="stylesheet" href="edit.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>

  <?php
  session_start();
  include("config.php");

  $id = $_GET['id'];
  $_SESSION['id'] = $_GET['id'];

  $str = $_SESSION["s_date"];
  $data = mysqli_query($miye, "SELECT * FROM task where id='" . $id . "' ");

  // if (isset($_POST['backview'])) {
  //   header("location:view_day.php?");
  // }
  $_SESSION["v_date"] = $str;

  ?>
  <h1>Edit Task</h1>
  <form method="post" action="edit_confirm.php" id="container" ">
    <?php
    while ($row = mysqli_fetch_assoc($data)) {
    ?>

    <table id=" task_table">
    <tr>
      <td><label for="name" id="lname" name="lname">Task Name</label></td>
      <td> <input type="text" id="name" name="name" value="<?php echo $row['task_name']; ?>" style="padding: 5px;"></td>
    </tr>
    <tr>
      <td><label for="memo" id="lmemo" name="lmemo">Memo</label></td>
      <td><textarea id="memo" name="memo" cols="25" rows="6"><?php echo $row['memo']; ?></textarea></td>
    </tr>

    <tr>
      <td><label for="task_date" id="ltask_date" name="ltask_date">Task date</label></td>
      <td><input type="text" id="task_date" name="task_date" value="<?php echo $str ?>" style="padding: 5px;" required></td>
    </tr>
    <tr>
      <td><label for="color" id="lcolor" name="lcolor">Mark color</label></td>
      <td>
        <?php
        switch ($row['color']) {
          case "#FFD700":
            $c_name = "Yellow";
            break;
          case "#0071c5":
            $c_name = "Blue";
            break;
          case "#FF8C00":
            $c_name = "Orange";
            break;
          case "#FF0000":
            $c_name = "Red";
            break;
          case "#008000":
            $c_name = "Green";
            break;
        }
        ?>
        <select name="color" id="color" onchange="changeColor()" id="default" style="padding: 5px;">
          <option id="default" value="<?php echo $row['color']; ?>">
            <?php echo $c_name; ?></option>
          <option style="color:#FFD700;" value="#FFD700"> Yellow</option>
          <option style="color:#0071c5;" value="#0071c5"> Blue</option>
          <option style="color:#FF8C00;" value="#FF8C00"> Orange</option>
          <option style="color:#FF0000;" value="#FF0000"> Red</option>
          <option style="color:#008000;" value="#008000"> Green</option>
        </select>
        <input type="text" name="bgcolor" id="bgcolor" style="background:<?php echo $row['color']; ?>;width:90px;height:30px;border:0px">
      </td>
    </tr>
    </table>
  <?php } ?>
  <div id="button">
    <input type="button" value="&lt;&nbsp;&nbsp;Back" id="mback" onClick="document.location.href='view_day.php'">
    <button id="edit" name="edit" onClick="document.location.href='edit_confirm.php?date=<?php echo $date ?>'">Edit</button>

    <!-- <input type="submit" id="backview" name="backview" value="&lt;&nbsp;&nbsp;&nbsp;Back"> -->
    <!-- <input type="submit" id="edit" name="edit" value="Edit"> -->

  </div>
  </form>

  <script>
    $(function() {
      $("tr td #task_date").datepicker({
        dateFormat: "yy-mm-dd"
      });
    });

    function mBack() {
      window.location.href = "view_day.php";
    }

    function changeColor() {
      var selected = document.getElementById('color');
      var change = document.getElementById('bgcolor');

      if (selected.selectedIndex == 1) {
        change.style.backgroundColor = "#FFD700";
      } else if (selected.selectedIndex == 2) {
        change.style.backgroundColor = "#0071c5";
      } else if (selected.selectedIndex == 3) {
        change.style.backgroundColor = "#FF8C00";
      } else if (selected.selectedIndex == 4) {
        change.style.backgroundColor = "#FF0000";
      } else if (selected.selectedIndex == 5) {
        change.style.backgroundColor = "#008000";
      }
    }
  </script>
</body>

</html>