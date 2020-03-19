<?php

namespace App\Console\Commands;

use App\Duty;
use Illuminate\Console\Command;

class AddDutiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'duties:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Duties';

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
        $duties = [
            [
                'name' => 'Duty Exempted',
                'slug' => 'duty_exempted',
                'description' => 'Duty Exempted'
            ],
            [
                'name' => 'Duty Not Paid',
                'slug' => 'duty_not_paid',
                'description' => 'Duty Not Paid'
            ],
            [
                'name' => 'Duty Paid',
                'slug' => 'duty_paid',
                'description' => 'Duty Paid'
            ],
            [
                'name' => 'Not Specified',
                'slug' => 'not_specified',
                'description' => 'Not Specified'
            ]
        ];

        foreach ($duties as $duty){
            if(Duty::where('slug', $duty['slug'])->exists() == false){
                Duty::create([
                   'name' => $duty['name'],
                    'slug' => $duty['slug'],
                    'description' => $duty['description']
                ]);
            }
        }
    }
}
