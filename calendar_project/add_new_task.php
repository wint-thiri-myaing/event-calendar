<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="new_task.css">
  <title>Add new task page</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
  <script>
    $(function() {
      $("tr td #task_date").datepicker({
        dateFormat: "yy-mm-dd"
      });
    });

    function changeColor() {
      var selected = document.getElementById('color');
      var change = document.getElementById('bgcolor');

      if (selected.selectedIndex == 0) {
        change.style.backgroundColor = "#008000";
      } else if (selected.selectedIndex == 1) {
        change.style.backgroundColor = "#FF0000";
      } else if (selected.selectedIndex == 2) {
        change.style.backgroundColor = "#0071c5";
      } else if (selected.selectedIndex == 3) {
        change.style.backgroundColor = "#FFD700";
      } else if (selected.selectedIndex == 4) {
        change.style.backgroundColor = "#FF8C00";
      }
    }
  </script>

  <?php
  session_start();
  include("config.php");

  // echo $_SESSION["s_date"];
  $date = $_SESSION["s_date"];

  // if (isset($_GET['date'])) {
  //   $date = $_GET['date'];
  // }


  ?>
  <h1>Add New Task </h1>

  <form method="post" action="confirm.php" id="container">

    <?php
    if (isset($_POST['add'])) {
      $name = $_POST["name"];
      $memo = $_POST["memo"];
      $task_date = $_POST["task_date"];
      $color = $_POST["color"];

      if ($name == null || $memo == null || $task_date == null || $color == null) {
        echo "Something is wrong";
      }
    }

    ?>
    <table id="task_table">
      <tr>
        <td><label for="name" id="lname" name="lname">Task Name</label></td>
        <td> <input type="text" id="name" name="name" required="required"></td>
      </tr>
      <tr>
        <td><label for="memo" id="lmemo" name="lmemo">Memo</label></td>
        <td><textarea id="memo" name="memo" cols="25" rows="6" required="required"></textarea></td>
      </tr>
      <tr>
        <td><label for="task_date" id="ltask_date" name="ltask_date">Task date</label></td>
        <td><input id="task_date" value="<?php echo $date ?>" name="task_date" required="required" ></td>
      </tr>
      <tr>
        <td><label for="color" id="lcolor" name="lcolor" required="required">Mark color</label></td>
        <td>
          <select name="color" style="padding: 5px;" id="color" onchange="changeColor()">
            <option style="color:#008000;" value="#008000">Green</option>
            <option style="color:#FF0000;" value="#FF0000"> Red</option>
            <option style="color:#0071c5;" value="#0071c5"> Blue</option>
            <option style="color:#FFD700;" value="#FFD700"> Yellow</option>
            <option style="color:#FF8C00;" value="#FF8C00"> Orange</option>
          </select>
          <input type="text" name="bgcolor" id="bgcolor" style="background:green;width:60px;height:30px;border:0px" disabled="disabled">
        </td>
      </tr>
    </table>


    <div id="button">

      <button id="backview" onClick="document.location.href='view_day.php?date=<?php echo $date ?>'">&lt;&nbsp;&nbsp;Back</button>


      <button id="addnew" name="add" onClick="document.location.href='confirm.php?date=<?php echo $date ?>'">Add</button>

    </div>

  </form>
</body>

</html>