

@extends('layouts.app')

@section('content')


    <div class="panel-heading">Quick add a game</div>

    <div class="panel-body">

        <div class="row">

            <div class="col-md-12">

                <form action="/games/add" method="POST">
                    {{ csrf_field() }}
                    <h4>New Game Title:</h4>
                    <input type="text" name="title" placeholder="New game title..." autofocus>
                    <input type="submit" value="Add Game">
                </form>

            </div>

        </div>

    </div>

@endsection
