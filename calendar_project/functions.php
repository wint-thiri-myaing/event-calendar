<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php
  if (isset($_POST['fun_type']) && !empty($_POST['fun_type'])) {

    switch ($_POST['fun_type']) {

      case 'getCalender':

        getCalendar($_POST['year'], $_POST['month']);

        break;

      case 'get_events_information':

        get_events_information($_POST['date']);

        break;

        //For Add Event with date wise. 

      case 'add_event_information':

        add_event_information($_POST['date'], $_POST['title']);

        break;

      default:

        break;
    }
  }

  /******************************************** 

   * below function used for display event as per date 

   * optional parameter is date. 

   *******************************************/

  function get_events_information($date = '')
  {

    //below line for including file of database connection file 

    include 'connection.php';

    $eventListHTML = '';

    $date = $date ? $date : date("Y-m-d");

    //Get events based on the current date 

    $result = $db->query("SELECT title FROM events WHERE date = '" . $date . "' AND status = 1");

    if ($result->num_rows > 0) {

      $eventListHTML .= '<div class="modal-content">';

      $eventListHTML .= '<span class="close"><a href="#" onclick="close_popup("event_list")">×</a></span>';

      $eventListHTML .= '<h2>Events on ' . date("l, d M Y", strtotime($date)) . '</h2>';

      $eventListHTML .= '<ul>';

      while ($row = $result->fetch_assoc()) {

        $eventListHTML .= '<li>' . $row['title'] . '</li>';
      }

      $eventListHTML .= '</ul>';

      $eventListHTML .= '</div>';
    }

    echo $eventListHTML;
  }
  /********************************************************** 

   * below function is used to add event in particular date 

   * parameter is >>> date , title 

   **********************************************************/

  function add_event_information($date, $title)
  {

    //below line for including file of database connection file 

    include 'connection.php';

    $currentDate = date("Y-m-d H:i:s");

    //Insert the event data into database 

    $insert = $db->query("INSERT INTO events (title,date,created,modified) VALUES ('" . $title . "','" . $date . "','" . $currentDate . "','" . $currentDate . "')");

    if ($insert) {

      echo 'ok';
    } else {

      echo 'err';
    }
  }

  ?>
</body>

</html>