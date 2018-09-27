<?php

namespace App\Console\Commands;

use App\Interior;
use Illuminate\Console\Command;

class AddInteriorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'interior:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds Interior to the database';

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
        $interiors = [
            [
                'name' => 'Cloth',
                'slug' => 'cloth',
                'description' => 'Cloth'
            ],
            [
                'name' => 'Leather',
                'slug' => 'leather',
                'description' => 'Leather'
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Other'
            ]
        ];

        foreach ($interiors as $interior){

            if(Interior::where('slug', $interior['slug'])->exists() == false){
                Interior::create([
                    'name' =>  $interior['name'],
                    'slug' => $interior['slug'],
                    'description' => $interior['description']
                ]);
            }
        }
    }
}
