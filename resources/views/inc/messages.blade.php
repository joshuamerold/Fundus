<!--
Beinhalten Error-Messages! werden an verschiedene Templates weitergegeben und fangen errors / success -Meldungen ab und stellen diese dar.
-->

@if(count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger text-center mb-0">
        {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div id="success-alert" class="alert alert-success alert-dismissible fade show" style="height: 50px" role="alert">
  {{session('success')}}
</div>
<script type="text/javascript">
$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
  $("#success-alert").slideUp(500);
});
</script>
@endif

@if(session('error'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div id="error-alert" class="alert alert-danger text-center mb-0" style="height: 50px" >
  {{session('error')}}
</div>
<script type="text/javascript">
$("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
  $("#error-alert").slideUp(500);
});
</script>
@endif
