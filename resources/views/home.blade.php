@extends('layouts.app')

@section('content')

    <div class="panel-heading">Announcements</div>

    <div class="panel-body">
        <div class="announcements">

            <div class="announcement">
                <div class="announcement-head">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="announcement-title">Discord Integration</p>
                            <p class="announcement-date">Posted on October 4th, 2017<p>
                        </div>
                    </div>
                </div>
                <div class="announcement-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="https://maxcdn.icons8.com/Share/icon/Logos//discord_logo1600.png" class="announcement-img">
                        </div>
                        <div class="col-md-9">
                            <p class="announcement-body-p">
                                I am pleased to annouce the discord integration is complete.
                                This allows a view of the server, list of open rooms
                                to talk in, and who is online, and what they are up to! This is located on your dashboard.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="panel-heading">The Spooky Mingo Network</div>

    <div class="panel-body">

        <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
                <h3>Steam</h1>
                <div id="steam_status">
                    @foreach($steam_players as $player)
                        <div class="row">
                            <div class="col-xs-2">
                                <img src="{{$player->avatar}}">
                            </div>
                            <div class="col-xs-10">
                                @if(isset($player->gameextrainfo))
                                    <p>
                                        <span style='color:#4CAF50;'>Online</span> -
                                        <a href="{{$player->profileurl}}" target="_blank">
                                            {{$player->personaname}}
                                        </a>
                                        <br>
                                        (Playing <b>
                                            <a href="http://store.steampowered.com/app/{{$player->gameid}}" target="_blank">{{$player->gameextrainfo}}</a>)
                                        </b>
                                    </p>
                                @else
                                    @php
                                    switch ($player->personastate) {
                                        case 0:
                                            echo "<span style='color:#9E9E9E;'><i>Offline</i></span>";
                                            break;
                                        case 1:
                                            echo "<span style='color:#4CAF50;'>Online</span>";
                                            break;
                                        case 2:
                                            echo "<span style='color:#FF5722;'>Busy</span>";
                                            break;
                                        case 3:
                                            echo "<span style='color:#EF6C00;'>Away</span>";
                                            break;
                                        case 4:
                                            echo "<span style='color:#2196F3;'>Snooze</span>";
                                            break;
                                        case 5:
                                            echo "<span style='color:#F44336;'Looking to trade</span>";
                                            break;
                                        case 6:
                                            echo "<span style='color:#3F51B5;'>Looking to play</span>";
                                            break;
                                        default:
                                            echo "<span style='color:#F44336;'><i>Offline?</i></span>";
                                            break;
                                    }
                                    @endphp
                                     - <a href="{{$player->profileurl}}" target="_blank">{{$player->personaname}}</a>
                                    <br>
                                    @php
                                        if($player->personastate === 0) {
                                            $epoch = $player->lastlogoff;
                                            $datetime1 = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
                                            $datetime2 = new DateTime('NOW');
                                            $interval = $datetime1->diff($datetime2);
                                            if ($interval->format('%a') === "0") {
                                                echo "Last online: earlier today";
                                            } else {
                                                echo "Last online: " . $interval->format('%a') . " days ago";
                                            }

                                        }
                                    @endphp

                                @endif
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h3>Discord</h1>
                <br>
                <iframe src="https://discordapp.com/widget?id=353615426833350656&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
            </div>

        </div>

    </div>

@endsection

@section('scripts')
<script>
$("#invite-button").click(function(){
    swal({
        title: 'Enter the email to send the invite to',
        input: 'email',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: function (email) {



            return new Promise(function (resolve, reject) {
                setTimeout(function() {
                    if (email === 'taken@example.com') {
                        reject('This email is already taken.')
                    } else {
                        resolve()
                    }
                }, 2000)
            })
        },
        allowOutsideClick: false
    }).then(function (email) {
        swal({
            type: 'success',
            title: 'Invite sent!',
            html: 'Your invite sent to email: ' + email
        })
    });
});
</script>
@endsection
