@extends('layouts.story')

@section('content')

<h1 style="text-align:center; padding:10rem;"> Thank You. </h1>

<script>


setTimeout( returnToSplash, 3000);

function returnToSplash(){
  window.location.href = "/";
}

</script>


@endsection
