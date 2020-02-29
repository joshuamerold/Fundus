@include('standards/head')


<body class="home-body">
  @include('sidebar')
  @include('topbar')
<div class="form-container">
  <form class="module-card" action="/add/module/create" method="post">
    <input type="text" name="form_modulename" placeholder="Name des Moduls">
    <!--in Backend noch Courseid eintragen.-->
    <input type="submit" name="" value="absenden">
    @csrf
  </form>
</div>
