<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar Page</title>
  <link rel="stylesheet" href="index.css">

  <script src="jquery.js"></script>

</head>

<body>
  <?php
  session_start();
      unset($_SESSION['s_date']);
      unset($_SESSION['v_date']);
  include("config.php");

  // Set your timezone
  date_default_timezone_set('Asia/Rangoon');

  // Get prev & next month
  if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
  } else {
    // This month
    $ym = date('Y-m');
  }

  // Check format
  $timestamp = strtotime($ym . '-01');
  if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
  }

  // Today
  $today = date('Y-m-j', time());

  // For H3 title
  $title_month = date('m', $timestamp);
  $dateObj   = DateTime::createFromFormat('!m', $title_month);
  $monthName = $dateObj->format('F'); // March
  $title_year = date('Y', $timestamp);

  // Create prev & next month link     mktime(hour,minute,second,month,day,year)
  $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
  $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

  $prev_year = date('Y-m', strtotime('-1 year', $timestamp));
  $next_year = date('Y-m', strtotime('+1 year', $timestamp));

  // Number of days in the month
  $day_count = date('t', $timestamp);

  // 0:Sun 1:Mon 2:Tue ...
  $str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
  //$str = date('w', $timestamp);


  // Create Calendar!!
  $weeks = array();
  $week = '';

  // Add empty cell
  $week .= str_repeat('<td></td>', $str);

  for ($day = 1; $day <= $day_count; $day++, $str++) {


    $date = $ym . '-' . $day;

    // if ($day < 10) {
    //   $send_day =  '0' . $day;
    // }


    $send_date = $ym . '-' . $day;


    // $send = date('m', $timestamp);
    // $dateObj   = DateTime::createFromFormat('!m', $title_month);
    // $monthName = $dateObj->format('F');
  
  
    if ($today == $date) {
    
      $week .= '<td class="today" onClick="dayClick(' . $day . ')">'. $day;
      $event = mysqli_query($miye, "SELECT * FROM task WHERE date='" . $today . "' ");
    //  $row = mysqli_fetch_assoc($event);
      if($event!=null){
        foreach($event as $var) {
         // ini_set('memory_limit', '-1');
          $week .= '<div style="background:' . $var['color'] .'">' . $var['task_name'] . '</div>';
        }
      }
    
      echo '<input type="hidden" id="day' . $day . '" name="current" value=' . $send_date . ' >';
    } else {
     
      $week .= '<td onClick="dayClick(' . $day . ')">' . $day;
      $event = mysqli_query($miye, "SELECT * FROM task WHERE date='" . $send_date . "' ");
      //  $row = mysqli_fetch_assoc($event);
      if ($event != null) {
        foreach ($event as $var) {
          // ini_set('memory_limit', '-1');
          $week .= '<div style="background:' . $var['color'] . '">' . $var['task_name'] . '</div>';
        }
      }
      echo '<input type="hidden" id="day' . $day . '" name="otherDay" value=' . $send_date . ' >';
      
    }
    
    $week .= '</td>';


    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

      if ($day == $day_count) {
        // Add empty cell
        $week .= str_repeat('<td></td>', 6 - ($str % 7));
      }

      $weeks[] = '<tr>' . $week . '</tr>';

      // Prepare for new week
      $week = '';
    }
  }

  ?>
  <div id="container">
    <nav class="navbar">

      <ul class="left">
        <li>
          <h2>Calendar</h2>
        </li>
      </ul>

      <ul class="right">
        <div class="month">
          <a href="?ym=<?php echo $prev; ?>">&lt;</a>
          <a class="m_name"><?php echo $monthName; ?></a>
          <a href="?ym=<?php echo $next; ?>">&gt;</a>
        </div>
        <div class="year">
          <a href="?ym=<?php echo $prev_year; ?>">&lt;</a>
          <?php echo $title_year; ?>
          <a href="?ym=<?php echo $next_year; ?>">&gt;</a>
        </div>


      </ul>

    </nav>
    <table>
      <tr>
        <th>SUN</th>
        <th>MON</th>
        <th>TUE</th>
        <th>WED</th>
        <th>THU</th>
        <th>FRI</th>
        <th>SAT</th>
      </tr>
      <?php
      foreach ($weeks as $week) {
        echo $week;
      }
      ?>
    </table>

  </div>
  <script type="text/javascript">
    function dayClick(day) {
      var myId = "day" + day;
      var clickDate = document.getElementById(myId).value;
      window.location.href = "view_day.php?date=" + clickDate;

    }

  </script>
</body>


</html>