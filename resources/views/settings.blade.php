@extends('layouts.app')

@section('content')

    <div class="panel-heading">Settings</div>

    <div class="panel-body">

        <div class="row">
            @if($is_connected_to_steam)
                <div class="col-xs-1"><p>
                    <b>Steam</b>:
                </div>
                <div class="col-xs-11">
                    <span class="text-good"><i class="fa fa-check-circle-o" aria-hidden="true"></i> connected as <a href="{{$self_player->profileurl}}" target="_blank">{{$self_player->personaname}}</a> ({{$self_player->steamid}})</span></p>
                </div>
            @else
                <div class="col-xs-1"><p>
                    <b>Steam</b>:
                </div>
                <div class="col-xs-11">
                    Not connected to steam... please ask the admins to hook you up! email: <a href="mailto:admin@spookymingos.com">admin@spookymingos.com</a>
                </div>
            @endif
        </div>

        <div class="row">
            <form action="/settings/timezone/save" method="POST">
                {{ csrf_field() }}
                <div class="col-xs-1">
                    <b>Timezone: </b>
                </div>
                <div class="col-xs-7">
                    Current timezone: {{$timezone or "None, please set one!"}}
                    <select name="timezone" class="form-control">
                            <option value="America/New_York">America/New_York</option>
                            <option value="America/Chicago">America/Chicago</option>
                            <option value="America/Denver">America/Denver</option>
                            <option value="America/Phoenix">America/Phoenix</option>
                            <option value="America/Los_Angeles">America/Los_Angeles</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <input type="submit" value="Save Timezone" class="btn btn-sm btn-success">
                </div>
            </form>
        </div>

    </div>

@endsection
