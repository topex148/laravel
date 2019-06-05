<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Prestadore;
use File;
use Storage;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PausePrestadores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pause:prestadores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando elimina un prestador cuya fecha de publicacion haya caducado';

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
      $prestadores = Prestadore::all();
      foreach($prestadores as $prestadore){

      if (($prestadore->Fecha_Final) < ($now->format('Y-m-d'))){

          $prestadore->delete();

          }
      }
    }
}
