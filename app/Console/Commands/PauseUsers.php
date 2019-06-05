<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Publicidade;
use File;
use Storage;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PauseUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pause:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando elimina una foto cuya fecha de publicacion haya caducado';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();
        $publicidade = Publicidade::all();
        foreach($publicidade as $publicidad){

        if (($publicidad->Fecha_Final) < ($now->format('Y-m-d'))){

            $publicidad->delete();

            }
        }
    }
}
