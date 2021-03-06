<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppInitializer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:initialize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the Application Settings';

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
        Artisan::call('app:roles');
        $this->info('App Roles Updated Successfully');
        Artisan::call('app:admin');
        $this->info('App Admin Updated Successfully');
        Artisan::call('car-makes:add');
        $this->info('Car Makes and Models Updated Successfully');
        Artisan::call('body-types:add');
        $this->info('Body Types Updated Successfully');
        Artisan::call('transmission-types:add');
        $this->info('Transmission Types Updated Successfully');
        Artisan::call('car-conditions:add');
        $this->info('Car Conditions Updated Successfully');
        Artisan::call('duties:add');
        $this->info('Duties Updated Successfully');
        Artisan::call('fuel-types:add');
        $this->info('Fuel Types Updated Successfully');
        Artisan::call('interior:add');
        $this->info('Interiors Updated Successfully');
        Artisan::call('colour-types:add');
        $this->info('Colour Types Updated Successfully');
        Artisan::call('vehicle-features:add');
        $this->info('Vehicle Features Updated');
        Artisan::call('areas:add');
        $this->info('Areas Updated');
        Artisan::call('drive-types:add');
        $this->info('Drive Types Updated');
        Artisan::call('drive-setups:add');
        $this->info('Drive SetUps Updated');
        Artisan::call('ad:prices');
        $this->info('Ad Prices Updated');

    }
}
