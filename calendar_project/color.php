<html>

<head>
  <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="jquery-ui-1.8.17.custom.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#date1').datepicker();

      $('#date1').focus(function() {
        $('#date1').datepicker('show');
      });

      $('#date1').click(function() {
        $('#date1').datepicker('show');
      });
      //$('#ui-datepicker-div').show();
      $('#date1').datepicker('show');
    });
  </script>
</head>

<body>
  <input type="text" name="date1" id='date1'>
</body>

</html>