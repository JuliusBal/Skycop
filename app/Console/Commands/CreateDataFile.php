<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CreateDataFile extends Command
{
    protected $signature = 'create:data:file';

    protected $description = 'Create .csv data file with loaded data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $content = 'LV, Cancel, 20
RU, Cancel, 10
LT, Delay, 1
LT, Delay, 3
LV, Delay, 4
LT, Cancel, 1';

        Storage::disk('local')->put('data.csv', $content);
        $this->line('Done!');
    }
}
