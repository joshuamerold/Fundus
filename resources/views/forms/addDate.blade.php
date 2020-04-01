@include('standards/head')
@include('sidebar')
@include('topbar')
@include('inc/messages')
<style media="screen">
.datepicker{
  left: 665px !important;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


<body class="addDate-body">
  <div class="card offset-md-2 col-md-8">
  <h2 class="mt-3">Neuen Termin erstellen</h2>
  <p></p>

  <div class="input-group mb-3">
  <div class="input-group-prepend">
  <label class="input-group-text" for="inputGroupSelect01">Hier das Datum auswählen</label>
</div>
  <form class="" action="/add/date/create" method="post">
    @csrf
    <input class="date form-control" type="text" name="date" value="Datum">
  </div>

  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Terminname erstellen</label>
  </div>
    <input type="text" name="name" value="neuer Terminname" class="form-control">
  </div>


    <div class="form-group row justify-content-center">
        <input type="submit" name="" value="senden" class="btn btn-red">
    </div>
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
       format: 'dd.mm.yyyy',
     });
    </script>


  </body>

</html>
