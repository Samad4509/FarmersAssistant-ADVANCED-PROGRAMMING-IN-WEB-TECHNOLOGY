{{-- <h1>Test Page</h1>

<div id="example">
<div id="axios">

</div> --}}
@extends('layouts.app')
@section('title')
Register
@endsection
@section('content')

<h1>Profile</h1>

<h3>

{{ session()->get('name') }}

</h3>

 <!-- React root DOM -->

 <div id="register"></div>



<!-- React JS -->

<script src="{{ asset('js/app.js') }}" defer></script>



</script>
@endsection





