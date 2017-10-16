<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spooky Mingos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/bootstrap.hey_i_see_you_looking_at_my_code.css" rel="stylesheet" type="text/css">
        <link href="/css/stars.css" rel="stylesheet" type="text/css">
	<!-- Styles -->
    <style>
    *::-webkit-scrollbar-track
    {
    	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    	background-color: #F5F5F5;
    	border-radius: 10px;
    }

    *::-webkit-scrollbar
    {
    	width: 10px;
    	background-color: #F5F5F5;
    }

    *::-webkit-scrollbar-thumb
    {
    	border-radius: 10px;
    	background-image: -webkit-gradient(linear,
    									   left bottom,
    									   left top,
    									   color-stop(0.44, rgb(122,153,217)),
    									   color-stop(0.72, rgb(73,125,189)),
    									   color-stop(0.86, rgb(28,58,148)));
    }
    .successgif {
        height: 20px;
        width: 20px;
        position: relative;
        bottom: 1px;
        left: 1px;
    }
    .bottom-of-page {
        height: 100px;
        width: 100%;
        display: block;
    }
    .mission-goals {
        list-style-type:none;
        margin: 0;
        padding: 0;
    }
    .mission-goals > li.description {
        padding-left: 12px;
        text-decoration: none !important;
        font-size: 0.8em;
    }
    .mission-goals > li.description:before {
        content: "(" !important;
    }
    .mission-goals > li.description:after {
        content: ")" !important;
    }
    .mission-goals > li.series {
        color: #E91E63;
        font-weight: bold;
        text-decoration: underline;
    }
    .mission-goals > li.series:before {
        content: "Mark ";
    }
    .mission-goals > li.planning {
        color: #03A9F4;
    }
    .mission-goals > li.planning:before {
        content: "Planning - ";
    }
    .mission-goals > li.inprogress {
        color: #FFC107;
    }
    .mission-goals > li.inprogress:before {
        content: "In Progress - ";
    }
    .mission-goals > li.success {
        text-decoration:line-through;
        color: #8BC34A;
    }
    .mission-goals > li.success:before {
        content: "Success - ";
    }
    .mission-goals > li.failure {
        font-style: italic;
        color: #F44336;
    }
    .mission-goals > li.failure:before {
        content: "Failure - ";
    }
    </style>
    </head>
    <body>
        <a href="/" class="btn btn-lg btn-success" style="position: absolute; top: 10px; left: 200px; z-index:100;"><-- Back to Spooky Mingos Home</a>
<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>
        <img src="left_kerbal.png" style="position:absolute; left:16px; top:16px; height:200px; opacity: 0.5;">
        <img src="right_kerbal.png" style="position:absolute; right:16px; top:16px; height:200px; opacity: 0.5;">
        <div class="container-fluid" style="height:100vh; overflow-y:scroll;">
            <div class="row">
                <div class="col-md-12">
                    <img src="/Kerbal_Space_Program_High_Res_Logo_modified.png" style="text-align:center; margin: 0 auto; display: block;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3>Multiplayer / Add-ons</h3>
                    <hr>
                    <?php
                    $ksp_server =  @fsockopen("ksp.spookymingos.com", 6702, $errno, $errstr, 1);
                    if($ksp_server)
                    {
                    ?>
                    <p>Server: <span style="color:lime;">ksp.spookymingos.com</span> - Port: <span style="color:lime;">6702</span> - Status: <span style="color:lime;"><img src='/success.gif' class='successgif'> ONLINE!</span></p>
                    <?php
                    }
                    else
                    {
                    ?>
                    <p>Server: <span style="color:red;">ksp.spookymingos.com</span> - Port: <span style="color:red;">6702</span> - Status: <span style="color:red"><?php echo $errstr; ?></span></p>
                    <?php
                    }
                    ?>
                    <a href="https://d-mp.org/downloads/release/latest/DMPClient.zip" class="btn btn-sm btn-primary">DMP Client</a>
                    <a href="http://d-mp.org/w/Howto/Client" class="btn btn-sm btn-primary" target="_blank">How-to Install DMP Client</a>
                    <a href="/Kerbal_Engineer_Redux_v1.1.2.8.zip" class="btn btn-sm btn-primary" target="_blank">Kerbal Engineer Redux v1.1.2.8</a>
                    <br><br>
                </div>
                <div class="col-md-3">
                    <h3>Maps</h3>
                    <hr>
                    <a href="/delta_v_map.png" class="btn btn-sm btn-primary" target="_blank">Delta-v Map</a>
                    <a href="/system_map.png" class="btn btn-sm btn-primary" target="_blank">System Map</a>
                    <br><br>
                </div>
                <div class="col-md-5">
                    <h3>Resources</h3>
                    <hr>
                    <a href="https://garycourt.github.io/korc/" class="btn btn-sm btn-primary" target="_blank">Optimal Rocket Calculator</a>
                    <a href="http://ksp.olex.biz/" class="btn btn-sm btn-primary" target="_blank">Interplanetary Orbit Calculator</a>
                    <a href="https://ryohpops.github.io/kspRemoteTechPlanner/" class="btn btn-sm btn-primary" target="_blank">Visual RemoteTech Planner</a>
                    <br><br>
                    <a href="https://alterbaron.github.io/ksp_aerocalc/" class="btn btn-sm btn-primary" target="_blank">Aerobraking Calculator</a>
                    <a href="https://alexmoon.github.io/ksp/" class="btn btn-sm btn-primary" target="_blank">Launch Window Planner</a>
                    <a href="http://www.skyrender.net/ksp_sync_calculator.html" class="btn btn-sm btn-primary" target="_blank">Orbital Synchronization Calculator</a>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Missions</h3>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Condrelo Station</h4>
                    <p>
                        The Condrelo Station is the primary base of operations in Kerbin Orbit.
                        Its purpose is to supply future missions with fuel, power, and vairous ships.
                        It has been the most expensive and time consuming project to date in the Spooky Space Program.
                    </p>
                    <b>Mission Checklist/Goals</b>
                    <ul class="mission-goals">
                        <li class="success">Achieve LKO (Low Kerbin Orbit) 100km</li>
                        <li class="failure">1st docking attempt to Condrelo Station</li>
                        <li class="failure description">Ship was deleted upon docking</li>
                        <li class="failure">2nd docking attempt to Condrelo Station</li>
                        <li class="failure description">Ship was corrupted upon docking</li>
                        <li class="success">Adjust server settings to prevent messed up subspace docking</li>
                        <li class="failure">3rd docking attempt to Condrelo Station</li>
                        <li class="failure description">Entire station was de-orbited immidiately 100% loss of kerbin souls aboard. Deemed an issue with spectating</li>
                        <li class="success">Relaunch V2 of the Condrelo Station Hub LKO (Low Kerbin Orbit) 100km</li>
                        <li class="success">Maneuver to HKO (High Kerbin Orbit) 370km</li>
                        <li class="success">Dock Ship to the Condrelo Station</li>
                        <li class="success">Dock Solar Array to the Condrelo Station</li>
                        <li class="success">Dock Fuel Array to the Condrelo Station</li>
                        <li class="success">Dock Spare Rescue Ship to the Condrelo Station</li>
                        <li class="success">Dock schmidt lander to the Condrelo Station on 1st hub</li>
                        <li class="success">Dock another schmidt lander to the Condrelo Station on 1st hub</li>
                        <li class="inprogress">Dock secondary hub to the Condrelo Station on fuel arary endcap</li>
                        <li class="planning">Dock secondary Solar Array to the Condrelo Station on secondary hub</li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Mun Base Missions</h4>
                    <p>
                        The Mun Base missions are simple, yet complex. With a goal of building a small Munar base.
                    </p>
                    <b>Mission Checklist/Goals</b>
                    <ul class="mission-goals">
                        <li class="success">Achieve LKO (Low Kerbin Orbit)</li>
                        <li class="success">Achieve Safe Kerbin Reentry</li>
                        <li class="success">Achieve LMO (Low Mun Orbit)</li>
                        <li class="failure">Achieve Mun Landing</li>
                        <li class="failure description">Unstable entry and ultimately impacted Munar surface 100% loss of kerbins on board.</li>
                        <li class="failure">Achieve Mun Landing</li>
                        <li class="failure description">Highspeed impact on Munar surface 100% loss of kerbins on board.</li>
                        <li class="success">Achieve Mun Landing</li>
                        <li class="planning">Attach Vehicles to Mun Base</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Condor Missions</h4>
                    <p>
                        The Condor missions were built with a Duna landing in mind.
                        Through superior engineering as well as piloting, it only took
                        until the Condor Mark II to successfully and safely touchdown on Duna.
                    </p>
                    <b>Mission Checklist/Goals</b>
                    <ul class="mission-goals">
                        <li class="series">I</li>
                        <li class="success">Achieve Kerbin Orbit</li>
                        <li class="success">Achieve Kerbol Orbit</li>
                        <li class="failure">Achieve Duna Orbit</li>
                        <li class="failure description">Condor Mark I didn't have a pilot, it had an engineer. So I couldn't perform maneuvers effectively, resulting in failure. Stranded orbiting Kerbol until eventual termination</li>
                        <li class="failure">Achieve Duna Landing</li>
                        <li class="failure description">Condor Mark I didn't have a pilot, it had an engineer. So I couldn't perform maneuvers effectively, resulting in failure. Stranded orbiting Kerbol until eventual termination</li>
                        <li class="series">II</li>
                        <li class="success">Achieve Duna Orbit</li>
                        <li class="success">Achieve Duna Landing</li>
                    </ul>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <h4>Conrad Missions</h4>
                    <p>
                        The Conrad Missions are a series of missions with a goal of getting Kerbin Orbit,
                        Mun Orbit and Landing, as well as a Minmus Orbit and Landing. With the advancements
                        of the Conrad Rocket System the Missions were successful, and the Conrad is still
                        used in service today.
                    </p>
                    <b>Mission Checklist/Goals</b>
                    <ul class="mission-goals">
                        <li class="series">I</li>
                        <li class="success">Achieve LKO (Low Kerbin Orbit)</li>
                        <li class="series">II</li>
                        <li class="success">Achieve Safe Kerbin Reentry</li>
                        <li class="series">II</li>
                        <li class="success">Achieve LMO (Low Mun Orbit)</li>
                        <li class="series">IV</li>
                        <li class="success">Achieve Mun Landing</li>
                        <li class="series">V - IIX</li>
                        <li class="success">Achieve LMiO (Low Minmus Orbit)</li>
                        <li class="series">IX</li>
                        <li class="success">Achieve Minmus Landing</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Future Mission</h4>
                    <b>Mission Checklist/Goals</b>
                    <ul class="mission-goals">
                        <li class="planning">Future Mission</li>
                    </ul>
                    <p>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Future Mission</h4>
                    <b>Mission Checklist/Goals</b>
                    <ul class="mission-goals">
                        <li class="planning">Future Mission</li>
                    </ul>
                    <p>
                    </p>
                </div>
            </div>
            <div class="bottom-of-page"></div>
        </div>
    </body>
</html>
