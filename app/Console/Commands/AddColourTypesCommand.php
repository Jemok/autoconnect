<?php

namespace App\Console\Commands;

use App\ColourType;
use Illuminate\Console\Command;

class AddColourTypesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'colour-types:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Colour Types to the database';

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
        $colour_types = [
            [
                'name' => 'White',
                'slug' => 'white',
                'description' => 'White'
            ],
            [
                'name' => 'Silver',
                'slug' => 'silver',
                'description' => 'Silver'
            ],
            [
                'name' => 'Green',
                'slug' => 'green',
                'description' => 'Green'
            ],
            [
                'name' => 'Dark Green',
                'slug' => 'dark_green',
                'description' => 'Dark Green'
            ],
            [
                'name' => 'Blue',
                'slug' => 'blue',
                'description' => 'Blue'
            ],
            [
                'name' => 'Dark Blue',
                'slug' => 'dark_blue',
                'description' => 'Dark Blue'
            ],
            [
                'name' => 'Brown',
                'slug' => 'brown',
                'description' => 'Brown'
            ],
            [
                'name' => 'Black',
                'slug' => 'black',
                'description' => 'Black'
            ],
            [
                'name' => 'Yellow',
                'slug' => 'yellow',
                'description' => 'Yellow'
            ],
            [
                'name' => 'Red',
                'slug' => 'red',
                'description' => 'Red'
            ],
            [
                'name' => 'Maroon',
                'slug' => 'maroon',
                'description' => 'Maroon'
            ],
            [
                'name' => 'Purple',
                'slug' => 'purple',
                'description' => 'Purple'
            ],
            [
                'name' => 'Pink',
                'slug' => 'pink',
                'description' => 'Pink'
            ],
            [
                'name' => 'Orange',
                'slug' => 'orange',
                'description' => 'Orange'
            ],
            [
                'name' => 'Grey',
                'slug' => 'grey',
                'description' => 'Grey'
            ],
            [
                'name' => 'Dark Grey',
                'slug' => 'dark_grey',
                'description' => 'Dark Grey'
            ],
            [
                'name' => 'Gold',
                'slug' => 'gold',
                'description' => 'Gold'
            ],
            [
                'name' => 'Beige',
                'slug' => 'beige',
                'description' => 'Beige'
            ],
            [
                'name' => 'Pearl',
                'slug' => 'pearl',
                'description' => 'Pearl'
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Other'
            ]
        ];

        foreach ($colour_types as $colour_type){
            if (ColourType::where('slug', $colour_type['slug'])->exists() == false){
                ColourType::create([
                    'name' => $colour_type['name'],
                    'slug' => $colour_type['slug'],
                    'description' => $colour_type['description']
                ]);
            }
        }
    }
}
