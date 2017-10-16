<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class GitHubController extends Controller
{
    public function update() {

        $process = new Process("whoami");
        $process->run();
        return $process->getOutput();

        $commands = ['git pull', 'composer install', 'php artisan migrate'];
        foreach($commands as $command) {
            $process = new Process($command);
            $process->run();
            // executes after the command finishes
            if (!$process->isSuccessful()) {
                // throw new ProcessFailedException($process);
                $success = false;
            }
        }
        return json_encode(array(
            "success" => $success
        ));
    }
}
