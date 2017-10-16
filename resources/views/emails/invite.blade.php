@extends('layouts.email')

@section('content')

New game night, and you're invited!<br>
<br>
A new game night has been created by {{$creator->name}}<br>
<br>
Are you planning on attending?<br>
<a href="https://spookymingos.com/accept/{{$game_session->id}}">Yes I am going!</a>
<br><br><br>
<a href="https://spookymingos.com/decline/{{$game_session->id}}">Nah I'm not going!</a>
Enjoy,<br>
Logan Schmidt<br>

@endsection
