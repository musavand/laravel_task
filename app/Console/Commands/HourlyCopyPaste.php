<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use File;

class HourlyCopyPaste extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hourly:copypaste';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'copy some picturs every hour';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try
        {
        $files = File::allFiles(public_path()."/images");  
        foreach($files as $f)
        {
            $this->info($f);
           // File::move(public_path('images/1.png'), public_path('storage/1.png'));            
        }
        //File::move(public_path('images/1.png'), public_path('storage/1.png'));            
        $this->info('copy some picturs every hour succesfully');
            return Command::SUCCESS;
        }
        catch(Throwable $e)
        {
            $this->info('copy some picturs every hour failed');
            return Command::FAILED;
        }
        
    }
}
