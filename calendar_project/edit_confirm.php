<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Confirm Page</title>
  <link rel="stylesheet" href="edit_confirmtask.css">
</head>

<body>

  <?php
  session_start();
  include("config.php");

  $date = $_SESSION["s_date"];
  // echo $date;

  ?>


  <h1>Confirm Edit Task</h1>
  <form action="" method="post" id="confirmForm">
    <?php

    $id = $_SESSION['id'];
    //  echo "Id ".$id;

    $name = $_POST["name"];
    $memo = $_POST["memo"];
    $task_date = $_POST["task_date"];
    $color = $_POST["color"];

    
    // echo "$name";
    // echo "$memo";
    // echo "$task_date";

    // if(isset($_POST['back'])){
    //   $_SESSION['id'] = $id;
    // }
    if (isset($_POST['confirm'])) {

      $tname = $_POST["tname"];
      $tmemo = $_POST["tmemo"];
      $ttask_date = $_POST["tdate"];
      $tcolor = $_POST["tcolor"];

      $strTime=strtotime($ttask_date);
      $cdate=date('Y-m-d',$strTime);

      echo $ttask_date;
      echo $cdate;

      $sql = "UPDATE task set task_name='" . $tname . "',
            memo='" . $tmemo . "', date='" . $cdate . "',
            color='" . $tcolor . "' where id='" . $id . "' ";
      mysqli_query($miye, $sql);

      // echo $date;

      $_SESSION['v_date'] = $date;
      header("location:view_day.php?");


      echo "Success edit";
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
      <input type="button" name="back" value="&lt;&nbsp;&nbsp;Back" id="backview" onClick="document.location.href='edit_page.php?id=<?php echo $id ?>'">

      <input type="hidden" id="confirm" value="<?php echo $date ?>">
      <input type="submit" id="confirm" name="confirm" value="Confirm">
    </div>
  </form>
</body>

</html>