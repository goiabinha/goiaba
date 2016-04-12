<?php namespace goiaba\Http\Controllers;

use goiaba\Usuarios;
use goiaba\Mac;
use goiaba\Http\Controllers\MacController;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Console\Command;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ExecutarController extends Controller
{
    public function aplicar()
    {
       $menu = new MacController();
       $process = new Process('sudo /var/www/html/MacAddress/firewall.sh');
       $process->run();
    // executes after the command finishes
        if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
    return view('Comando.concluido')
            ->with('saida', $process->getOutput())
            ->with('menu', $menu->menu());
    }
}