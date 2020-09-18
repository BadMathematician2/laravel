<?php


namespace App\Console\Commands;


use App\Http\Controllers\TestController;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class TestCommand extends Command
{
    protected $signature = 'math';

    public function handle()
    {
//        dd((new TestController())->testIndex());

        dd(shell_exec('whoami'));

        dd(shell_exec('echo $USER'));

        $command = new Process([ 'docker', 'ps']);
        $command->run();
        dd($command->getOutput());
        return shell_exec('docker ps');
        dd(shell_exec('cd ../ && ls'));

        dd($command->getOutput());

    }
}
