@extends('layouts.app')

@section('content')


    <div class="panel-heading">New Game Session</div>

    <div class="panel-body">

        <div class="row">

            <div class="col-md-12">

                <form action="/gamesession/add" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="game" value="1" id="formgame">

                    <div id="userstoinviteHolder"></div>

                    <h2>Game:</h2>

                    <p>Don't see the game you want? <a href="/games/new">Add that sucker</a></p>

                    <div class="games-list">
                        @foreach ($games as $game)
                            <div class="game-boxart" id="game-id-{{$game->id}}" data-id="{{$game->id}}">
                                @if(!isset($game->image))
                                    <span class="game-title">{{$game->title}}</span>
                                @endif
                                <img class="game-boxart-img" src="{{$game->image or '/boxarts/noimage.jpg'}}">
                            </div>
                        @endforeach
                        <p style="margin-left: 10px; text-decoration: underline; color: #2196F3; user-select: none; cursor: pointer; display: none; font-weight: 900;" id="reselect-game">Choose a different game?</p>
                    </div>

                    <hr>

                    <h2>Click who to invite:</h2>

                    <p id="invite-text"></p>

                    <a class="btn" id="select-all-btn">Select All</a> / <a class="btn" id="select-none-btn">Select None</a>

                    <br>

                    @foreach ($users as $user)
                        <a class="userbutton" style="display:none;" data-isselected="no" data-id="{{$user->id}}">
                            {{$user->name}}<br>
                            <span style="font-size:12px; position: relative; bottom: 10px;">({{$user->nickname}})</span>
                        </a>
                    @endforeach

                    <hr>

                    <h2>When is this going down?</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="datetime" id="datetimepickr">
                        </div>
                        <div class="col-md-6">
                            Your timezone:
                            @php
                                 $user = Auth::user(); echo $user->timezone;
                            @endphp
                        </div>
                    </div>

                    <hr>

                    <h2>How long are you thinkin?</h2>

                    <label for="length_in_hours">Hours:</label>
                    <input id="length_in_hours" name="length_in_hours" type="number" placeholder="Ex: Enter 2.5 for 2hr 30m" step="0.5" length="200">

                    <hr>

                    <button type="submit">Submit</button>

                </form>

            </div>

        </div>

    </div>

@endsection

@section('scripts')
<script>

    var selectedSound = new Howl({
      src: ['/sounds/selected.wav'],
      volume: 0.5
    });

    var unselectedSound = new Howl({
      src: ['/sounds/unselected.wav'],
      volume: 0.5
    });

    unselectedSound.once('load', function(){
      // Show buttons
      $(".userbutton").show();
    });

    function calcNewLen() {
        var newlen = $("#userstoinviteHolder").children().length;
        console.log("Newlen: " + newlen);
        if (newlen > 1) {
            $("#invite-text").text(newlen + " players will be sent invite emails");
        } else if(newlen == 1) {
            $("#invite-text").text("1 player will be sent invite emails");
        } else {
            $("#invite-text").text(" ");
        }
    }

    $(".userbutton").on("click", function() {
        var buttonclicked = $(this);
        if(buttonclicked.data("isselected") === "no") {
            selectedSound.play();
            buttonclicked.data("isselected", "yes");
            buttonclicked.addClass("userbutton-selected");
            $("#userstoinviteHolder").append("<input id='inviteuser" + buttonclicked.data("id") + "' type='hidden' name='userstoinvite[]' value=" + buttonclicked.data("id") + ">");
            calcNewLen();
        } else {
            unselectedSound.play();
            buttonclicked.data("isselected", "no");
            buttonclicked.removeClass("userbutton-selected");
            $("#inviteuser" + buttonclicked.data("id")).remove();
            calcNewLen();
        }
    });

    @foreach ($games as $game)
        var gamesound{{$game->id}} = new Howl({
          src: ['{{$game->soundpath}}'],
          volume: 0.5
        });
        $("#game-id-{{$game->id}}").on("click", function() {
            if($(this).data("selected") !== "yes") {
                gamesound{{$game->id}}.play();
            }
        });
    @endforeach

    $(".game-boxart").on("click", function() {
        $(".game-boxart").hide();
        $("#reselect-game").show();
        $(this).show();
        $(this).data("selected", "yes");
        $(this).addClass("game-boxart-selected");
        $("#formgame").val($(this).data("id"));
    });

    $("#reselect-game").on("click", function() {
        $(this).hide();
        $(".game-boxart").show();
        $(".game-boxart").removeClass("game-boxart-selected");
        $(".game-boxart").data("selected", false);
    });

    $("#select-all-btn").on("click", function() {
        $(".userbutton").each(function() {
            if(!$(this).hasClass('userbutton-selected')) {
                $(this).trigger("click");
            }
        });
    });

    $("#select-none-btn").on("click", function() {
        $(".userbutton-selected").each(function() {
            $(this).trigger("click");
        });
    });


    $("#datetimepickr").flatpickr({
        enableTime: true,
        altInput: true
    });

</script>
@endsection
