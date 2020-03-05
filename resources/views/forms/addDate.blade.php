
<head>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

</head>

<body>


<div class="container">

    <h1>Laravel Bootstrap Datepicker</h1>

    <form class="" action="/add/date/create" method="post">
      @csrf
      <input class="date form-control" type="text" name="date">
      <input type="text" name="name" value="neuer Terminname">
      <input type="submit" name="" value="senden">
    </form>

</div>


<script type="text/javascript">
var date = new Date();
date.setDate(date.getDate());

    $('.date').datepicker({
        startDate: date,
        locale: 'de',
       format: 'dd.mm.yyyy'

     });

</script>


</body>

</html>
