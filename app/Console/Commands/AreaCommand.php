<?php

namespace App\Console\Commands;

use App\Models\Area;
use Illuminate\Console\Command;
use function Composer\Autoload\includeFile;

class AreaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raido:area';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Area Of Karachi';

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
     * @return int
     */
    public function handle()
    {
        $areasJson = $this->requireToVar(__DIR__ . './../../../resources/json/karachi/locations.json');
        collect(json_decode($areasJson, 1))->each(function ($area) {
            Area::firstOrCreate($area);
        });
        $this->info("Done");
    }

    protected function requireToVar($file)
    {

        ob_start();
        require($file);
        return ob_get_clean();
    }
}
