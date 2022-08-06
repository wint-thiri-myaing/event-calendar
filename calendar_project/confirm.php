<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="add_confirm.css">
  <title>Confirm Page</title>
  <script src="jquery.js"></script>
</head>

<body>
  <!-- <script>
    $(document).ready(function(){
      $('#confirm').click(function(){
        //var clickBtnVal=date;
        alert("clickBtnVal");
      })
    })
  </script> -->

  <?php
  session_start();
  include("config.php");

  // echo $_SESSION["s_date"];
  $date = $_SESSION["s_date"];
  // echo $date;

  ?>

  <h1>Confirm New Task</h1>
  <form action="" method="post" id="confirmForm">
    <?php
    $name = $_POST["name"];
    $memo = $_POST["memo"];
    $task_date = $_POST["task_date"];
    $color = $_POST["color"];

    if (isset($_POST['confirm'])) {

      $tname = $_POST["tname"];
      $tmemo = $_POST["tmemo"];
      $ttask_date = $_POST["tdate"];
      $tcolor = $_POST["tcolor"];

      // echo "$tname";
      // echo "$tmemo";
      // echo "$ttask_date";
      // echo "$tcolor";

      $sql = "INSERT INTO task (task_name,memo, date,color) VALUES ('$tname','$tmemo','$ttask_date','$tcolor')";
      mysqli_query($miye, $sql);

      $_SESSION["v_date"] = $date;

      header("location:view_day.php?");


      echo "Success add";
    }


    ?>
    <table id="confirm_table">
      <tr class="border_bottom">
        <td>Task name</td>
        <td id="tname"><input type="hidden" name="tname" value="<?php echo $_POST['name']; ?>"><?php echo $_POST['name']; ?></td>
      </tr>
      <tr class="border_bottom">
        <td>Memo</td>
        <td id="tmemo"><input type="hidden" name="tmemo" value="<?php echo $_POST['memo']; ?>"><?php echo $_POST['memo']; ?>
        </td>
      </tr>
      <tr class="border_bottom">
        <td>Task date</td>
        <td id="tdate"><input type="hidden" name="tdate" value="<?php echo $_POST['task_date']; ?>"><?php echo $_POST['task_date']; ?></td>
      </tr>
      <tr class="border_bottom">
        <td>Color</td>
        <td id="tcolor" style="background-color:<?php echo $color; ?>;" />
        <input type="hidden" name="tcolor" value="<?php echo $_POST['color']; ?>">
        </td>
      </tr>
    </table>

    <div id="button">

      <input type="button" value="&lt;&nbsp;&nbsp;Back" id="backview" onClick="document.location.href='add_new_task.php?date=<?php echo $date ?>'">

      <input type="hidden" id="confirm" value="<?php echo $date ?>">
      <input type="submit" id="confirm" name="confirm" value="Confirm">
    </div>
  </form>
  <!-- <script type="text/javascript">
    // $("#confirm").click(function() {
    //   var clickDate = $("#confirm").val();
    //   window.location.href = "view_day.php";
    // });


 onclick="confirmClick()"

    function confirmClick() {
      var date = document.getElementById("confirm").value;
      alert(date);
      
      window.location.href = "view_day.php?date=" + date;
    }
  </script> -->
</body>

</html>