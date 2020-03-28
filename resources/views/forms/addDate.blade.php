@include('standards/head')
@include('sidebar')
@include('topbar')
@include('inc/messages')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<body class="addDate-body">
<div class="container">
  <h1>Neuen Termin erstellen</h1>
  <form class="" action="/add/date/create" method="post">
    @csrf
    <input class="date form-control" type="text" name="date">
    <input type="text" name="name" value="neuer Terminname">
    <input type="submit" name="" value="senden">
  </form>
  <div class="form-group row justify-content-center">
    <a href="/"<button type="button" name="button">zurück</button>
  </div>
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
