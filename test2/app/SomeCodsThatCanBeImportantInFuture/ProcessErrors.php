<?php


namespace App\SomeCodsThatCanBeImportantInFuture;


use Symfony\Component\Process\Process;

class ProcessErrors
{

    /**
     * Таким чином можна буде почабити помилки, при воконанні команди
     */
    public function test()
    {
        $command = new Process(['docker', 'ps']);
        $command->run(function () {
            dump(func_get_args());
        });

        dd();
    }
}
