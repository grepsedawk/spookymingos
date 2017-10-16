<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class GitHubController extends Controller
{
    public function update() {
        $output = array();
        $commands = ['pwd', 'whoami', 'git pull', 'composer install', 'php ../artisan migrate'];
        foreach($commands as $command) {
            $process = new Process($command);
            $process->run();
            // executes after the command finishes
            if (!$process->isSuccessful()) {
                // throw new ProcessFailedException($process);
                $success = false;
            }
            array_push($output, $process->getOutput());
        }
        return json_encode(array(
            "success" => $success,
            "output" => $output
        ));
    }
}
