<?php

namespace App\Console\Commands;

use App\Traits\CheckEuropeCountry;
use App\Traits\Claimable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DecisionTable extends Command
{
    use Claimable, CheckEuropeCountry;

    protected $signature = 'decision:table';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if(Storage::disk('local')->exists('data.csv')) {
            $content = Storage::disk('local')->get('data.csv');
            $contentArray = preg_split("/\r\n|\n|\r/", $content);
            $this->line('<options=bold>Results:</>');

            foreach ($contentArray as $arr) {
                $split = str_replace(' ', '', explode(',', $arr));

                $claimable = 0;
                if ($this->checkEuropeCountry($split[0])) {
                    $claimable = ($split[1] === 'Cancel') ? $this->canceled($split[2]) : $this->delayed($split[2]);
                }

                $arr .= $claimable ? ' Y' : ' N';
                dump(str_replace(',', '', $arr));
            }
        } else {
            $this->line('Run:php artisan create:data:file');
        }
    }
}
