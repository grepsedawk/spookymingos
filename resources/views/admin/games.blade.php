@extends('layouts.app')

@section('content')


    <div class="panel-heading"><a href="/admin">Admin Controls</a> > Games</div>

    <div class="panel-body">

        <div class="row">

            <div class="col-md-12">

                <form action="/admin/games/add" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="title" placeholder="New game title...">
                    <input type="submit" value="Add Game">
                </form>
                <hr>
                @forelse ($games as $game)
                    - {{$game->title}}<br>
                @empty
                    No games
                @endforelse
            </div>

        </div>

    </div>

@endsection
