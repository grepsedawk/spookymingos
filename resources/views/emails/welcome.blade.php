@extends('layouts.email')

@section('content')

Welcome {{$user->name}},<br>
<br>
Your new Spooky Mingos account #{{$user->id}} <a hfre="mailto:{{$user->email}}">{{$user->email}}</a> has been created!<br>
<br>
Enjoy,<br>
Logan Schmidt<br>

@endsection
