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
    <div class="alert alert-success text-center mb-0">
      {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger text-center mb-0">
      {{session('error')}}
    </div>
@endif
