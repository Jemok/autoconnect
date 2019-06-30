<?php

namespace App\Console\Commands;

use App\CarMake;
use App\CarModel;
use App\CarSeries;
use Illuminate\Console\Command;

class AddCarMakesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car-makes:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds Car Makes to the database';

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
        $makes = [
            [
                'name' => 'Audi',
                'slug' => 'audi',
                'description' => 'Audi',
                'image_name' => 'audi.png',
                'models' => [
                    [
                        'name' => 'A1',
                        'slug' => 'a1',
                        'description' => 'A1',
                        'series' => []
                    ],
                    [
                        'name' => 'A3',
                        'slug' => 'a3',
                        'description' => 'A3',
                        'series' => []
                    ],
                    [
                        'name' => 'A4',
                        'slug' => 'a4',
                        'description' => 'A4',
                        'series' => []
                    ],
                    [
                        'name' => 'A5',
                        'slug' => 'a5',
                        'description' => 'A5',
                        'series' => []
                    ],
                    [
                        'name' => 'A6',
                        'slug' => 'a6',
                        'description' => 'A6',
                        'series' => []
                    ],
                    [
                        'name' => 'Q5',
                        'slug' => 'q5',
                        'description' => 'Q5',
                        'series' => []
                    ],
                    [
                        'name' => 'Q7',
                        'slug' => 'q7',
                        'description' => 'Q7',
                        'series' => []
                    ],
                    [
                        'name' => 'TT',
                        'slug' => 'tt',
                        'description' => 'TT',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'Acmat',
                'slug' => 'acmat',
                'description' => 'Acmat',
                'image_name' => 'amcat.png',
                'models' => [
                    [
                        'name' => 'TPK 25.SH',
                        'slug' => 'tpk_25sh',
                        'description' => 'TPK 25.SH',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'Acura',
                'slug' => 'acura',
                'description' => 'Acura',
                'image_name' => 'acura.png',
                'models'    => [
                    [
                        'name' => 'CL',
                        'slug' => 'cl',
                        'description' => 'CL',
                        'series' => []
                    ],
                    [
                        'name' => 'CSX',
                        'slug' => 'csx',
                        'description' => 'CSX',
                        'series' => []
                    ],
                    [
                        'name' => 'ILX',
                        'slug' => 'ilx',
                        'description' => 'ILX',
                        'series' => []
                    ],
                    [
                        'name' => 'MDX',
                        'slug' => 'mdx',
                        'description' => 'MDX',
                        'series' => [
                            [
                                'name' => 'AWD',
                                'slug' => 'awd',
                                'description' => 'AWD'
                            ],
                            [
                                'name' => 'Base',
                                'slug' => 'base',
                                'description' => 'Base'
                            ],
                            [
                                'name' => 'Sport',
                                'slug' => 'sport',
                                'description' => 'Sport'
                            ],
                            [
                                'name' => 'Sport Package',
                                'slug' => 'sport_package',
                                'description' => 'Sport Package'
                            ],
                            [
                                'name' => 'Tech',
                                'slug' => 'tech',
                                'description' => 'Tech'
                            ],
                            [
                                'name' => 'Tech Package',
                                'slug' => 'tech_package',
                                'description' => 'Tech Package'
                            ],
                            [
                                'name' => 'V20',
                                'slug' => 'v20',
                                'description' => 'V20'
                            ]
                        ]
                    ],
                    [
                        'name' => 'RDX',
                        'slug' => 'rdx',
                        'description' => 'RDX',
                        'series' => [
                            [
                                'name' => 'Automatic Tech Package',
                                'slug' => 'automatic_tech_package',
                                'description' => 'Automatic Tech Package'
                            ],
                            [
                                'name' => 'SH-AWD',
                                'slug' => 'sh_awd',
                                'description' => 'SH-AWD'
                            ]
                        ]
                    ],
                    [
                        'name' => 'RL',
                        'slug' => 'rl',
                        'description' => 'RL',
                        'series' => [
                            [
                                'name' => 'Sedan',
                                'slug' => 'sedan',
                                'description' => 'Sedan'
                            ],
                            [
                                'name' => 'Tech Package',
                                'slug' => 'tech_package',
                                'description' => 'Tech Package'
                            ],
                            [
                                'name' => 'Technology Package',
                                'slug' => 'technology_package',
                                'description' => 'Technology Package'
                            ]
                        ]
                    ],
                    [
                        'name' => 'RSX',
                        'slug' => 'rsx',
                        'description' => 'RSX',
                        'series' => [
                            [
                                'name' => '2.0',
                                'slug' => '2_0',
                                'description' => '2.0'
                            ],
                            [
                                'name' => 'Automatic',
                                'slug' => 'automatic',
                                'description' => 'Automatic'
                            ]
                        ]
                    ],
                    [
                        'name' => 'TL',
                        'slug' => 'tl',
                        'description' => 'TL',
                        'series' => [
                            [
                                'name' => '2.5',
                                'slug' => '2_5',
                                'description' => '2.5'
                            ],
                            [
                                'name' => '3.2',
                                'slug' => '3_2',
                                'description' => '3.2'
                            ],
                            [
                                'name' => 'Automatic',
                                'slug' => 'automatic',
                                'description' => 'Automatic'
                            ],
                            [
                                'name' => 'Automatic SH-AWD',
                                'slug' => 'automatic_sh_awd',
                                'description' => 'Automatic SH-AWD'
                            ],
                            [
                                'name' => 'Automatic SH-AWD Technology Package',
                                'slug' => 'automatic_sh_awd_technology_package',
                                'description' => 'Automatic SH-AWD Technology Package'
                            ],
                            [
                                'name' => 'Automatic Tech Package',
                                'slug' => 'automatic_tech_package',
                                'description' => 'Automatic Tech Package'
                            ],
                            [
                                'name' => 'Base',
                                'slug' => 'base',
                                'description' => 'Base'
                            ],
                            [
                                'name' => 'S',
                                'slug' => 's',
                                'description' => 'S'
                            ],
                            [
                                'name' => 'S Automatic',
                                'slug' => 's_automatic',
                                'description' => 'S Automatic'
                            ],
                            [
                                'name' => 'SH-AWD',
                                'slug' => 'sh_awd',
                                'description' => 'SH-AWD'
                            ],
                            [
                                'name' => 'SH-AWD AT',
                                'slug' => 'sh_awd_at',
                                'description' => 'SH-AWD AT'
                            ],
                            [
                                'name' => 'SH-AWD Automatic',
                                'slug' => 'sh_awd_automatic',
                                'description' => 'SH-AWD Automatic'
                            ],
                            [
                                'name' => 'SH-AWD Automatic Tech Package',
                                'slug' => 'sh_awd_automatic_tech_package',
                                'description' => 'SH-AWD Automatic Tech Package'
                            ],
                            [
                                'name' => 'SH-AWD Manual Tech Package',
                                'slug' => 'sh_awd_manual_tech_package',
                                'description' => 'SH-AWD Manual Tech Package'
                            ],
                            [
                                'name' => 'SH-AWD MT',
                                'slug' => 'sh_awd_mt',
                                'description' => 'SH-AWD MT'
                            ],
                            [
                                'name' => 'Type S',
                                'slug' => 'type_s',
                                'description' => 'Type S'
                            ],
                            [
                                'name' => 'Type S Automatic',
                                'slug' => 'type_s_automatic',
                                'description' => 'Type S Automatic'
                            ]
                        ]
                    ],
                    [
                        'name' => 'TSX',
                        'slug' => 'tsx',
                        'description' => 'TXS',
                        'series' => [
                            [
                                'name' => 'Automatic',
                                'slug' => 'automatic',
                                'description' => 'Automatic'
                            ],
                            [
                                'name' => 'Automatic Tech Package',
                                'slug' => 'automatic_tech_package',
                                'description' => 'Automatic Tech Package'
                            ],
                            [
                                'name' => 'Sedan',
                                'slug' => 'sedan',
                                'description' => 'Sedan'
                            ],
                            [
                                'name' => 'Sedan Special Edition',
                                'slug' => 'sedan_special_edition',
                                'description' => 'Sedan Special Edition'
                            ],
                            [
                                'name' => 'Sedan Special Edition Automatic',
                                'slug' => 'sedan_special_edition_automatic',
                                'description' => 'Sedan Special Edition Automatic'
                            ],
                            [
                                'name' => 'Sport Sedan',
                                'slug' => 'sport_sedan',
                                'description' => 'Sport Sedan'
                            ],
                            [
                                'name' => 'Sport Sedan AT',
                                'slug' => 'sport_sedan_at',
                                'description' => 'Sport Sedan AT'
                            ],
                            [
                                'name' => 'Sport Sedan MT',
                                'slug' => 'sport_sedan_mt',
                                'description' => 'Sport Sedan MT'
                            ],
                            [
                                'name' => 'Sport Sedan V6',
                                'slug' => 'sport_sedan_v6',
                                'description' => 'Sport Sedan V6'
                            ],
                            [
                                'name' => 'Sport Wagon',
                                'slug' => 'sport_wagon',
                                'description' => 'Sport Wagon'
                            ],
                            [
                                'name' => 'Tech Package',
                                'slug' => 'tech_package',
                                'description' => 'Tech Package'
                            ]
                        ]
                    ]
                ]
            ],
            [
                'name' => 'ALFA ROMEO',
                'slug' => 'alfa_romeo',
                'description' => 'ALFA ROMEO',
                'image_name' => 'alfa_romeo.png',
                'models' => [
                    [
                        'name' => '147',
                        'slug' => '147',
                        'description' => '147',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'APRILIA',
                'slug' => 'aprilia',
                'description' => 'APRILIA',
                'image_name' => 'aprilia.png',
                'models' => [
                    [
                        'name' => 'Dorsodoro',
                        'slug' => 'dorsodoro',
                        'description' => 'Dorsodoro',
                        'series' => []
                    ],
                    [
                        'name' => 'Tuono',
                        'slug' => 'tuono',
                        'description' => 'Tuono',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'AVELING BARFORD',
                'slug' => 'aveling_barford',
                'description' => 'AVELING BARFORD',
                'image_name' => 'aveling_barford.png',
                'models' => [
                    [
                        'name' => 'Grader',
                        'slug' => 'grader',
                        'description' => 'Grader',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'BENTLEY',
                'slug' => 'bently',
                'description' => 'BENTLEY',
                'image_name' => 'bently.png',
                'models' => [
                    [
                        'name' => 'Bentayga',
                        'slug' => 'bentayga',
                        'description' => 'Bentayga',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'BOBCAT',
                'slug' => 'bobcat',
                'description' => 'BOBCAT',
                'image_name' => 'bobcat.png',
                'models' => [
                    [
                        'name' => 'T190',
                        'slug' => 't190',
                        'description' => 'T190',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'BMW',
                'slug' => 'bmw',
                'description' => 'BMW',
                'image_name' => 'bmw.png',
                'models' => [
                    [
                        'name' => 'T190',
                        'slug' => 't190',
                        'description' => 'T190',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'CADILLAC',
                'slug' => 'cadillac',
                'description' => 'CADILLAC',
                'image_name' => 'cadillac.png',
                'models' => [
                    [
                        'name' => 'Escalade',
                        'slug' => 'escalade',
                        'description' => 'Escalade',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'CASE ii+',
                'slug' => 'case_ii+',
                'description' => 'CASE ii+',
                'image_name' => 'caseii.png',
                'models' => [
                    [
                        'name' => 'Skid Steel Loader',
                        'slug' => 'skid_steel_loader',
                        'description' => 'Skid Steel Loader',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'CHEVLORET',
                'slug' => 'chevloret',
                'description' => 'CHEVLORET',
                'image_name' => 'chevloret.png',
                'models' => [
                    [
                        'name' => 'Captiva',
                        'slug' => 'captiva',
                        'description' => 'Captiva',
                        'series' => []
                    ],
                    [
                        'name' => 'Croze',
                        'slug' => 'croze',
                        'description' => 'Croze',
                        'series' => []
                    ],
                    [
                        'name' => 'Pick Up',
                        'slug' => 'pick_up',
                        'description' => 'Pick Up',
                        'series' => []
                    ],
                    [
                        'name' => 'Spark',
                        'slug' => 'spark',
                        'description' => 'Spark',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'CHRYSLER',
                'slug' => 'chrysler',
                'description' => 'CHRYSLER',
                'image_name' => 'chrysler.png',
                'models' => [
                    [
                        'name' => '300c',
                        'slug' => '300c',
                        'description' => '300c',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'DAF',
                'slug' => 'daf',
                'description' => 'DAF',
                'image_name' => 'daf.png',
                'models' => [
                    [
                        'name' => 'CF',
                        'slug' => 'cf',
                        'description' => 'CF',
                        'series' => []
                    ],
                    [
                        'name' => 'DF',
                        'slug' => 'df',
                        'description' => 'DF',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'DAIHATSU',
                'slug' => 'daihatsu',
                'description' => 'DAIHATSU',
                'image_name' => 'daihatsu.png',
                'models' => [
                    [
                        'name' => 'Bego',
                        'slug' => 'bego',
                        'description' => 'Bego',
                        'series' => []
                    ],
                    [
                        'name' => 'Boon',
                        'slug' => 'boon',
                        'description'=> 'Boon',
                        'series' => []
                    ],
                    [
                        'name' => 'Laminus',
                        'slug' => 'laminus',
                        'description' => 'Laminus',
                        'series' => []
                    ],
                    [
                        'name' => 'Mira',
                        'slug' => 'mira',
                        'description' => 'Mira',
                        'series' => []
                    ],
                    [
                        'name' => 'Move',
                        'slug' => 'move',
                        'description' => 'Move',
                        'series' => []
                    ],
                    [
                        'name' => 'Terios',
                        'slug' => 'terios',
                        'description' => 'Terios',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'DATSUN',
                'slug' => 'datsun',
                'description' => 'DATSUN',
                'image_name' => 'datsun.png',
                'models' => [
                    [
                        'name' =>  '1200',
                        'slug' => '1200',
                        'description' => '1200',
                        'series' => []
                    ],
                    [
                        'name' => 'GO',
                        'slug' => 'go',
                        'description' => 'GO',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'DOOSAN',
                'slug' => 'doosan',
                'description' => 'DOOSAN',
                'image_name' => 'doosan.png',
                'models' => [
                    [
                        'name' => 'Excavotor',
                        'slug' => 'excavotor',
                        'description' => 'Excavotor',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'DUCATI',
                'slug' => 'ducati',
                'description' => 'DUCATI',
                'image_name' => 'ducati.png',
                'models' => [
                    [
                        'name' => 'Monster',
                        'slug' => 'monster',
                        'description' => 'Monster',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'FAW',
                'slug' => 'faw',
                'description' => 'FAW',
                'image_name' => 'faw.png',
                'models' => [
                    [
                        'name' => '5TON',
                        'slug' => '5ton',
                        'description' => '5TON',
                        'series' => []
                    ],
                    [
                        'name' => 'J5280',
                        'slug' => 'j5280',
                        'description' => 'J5280',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'FORD',
                'slug' => 'ford',
                'description' => 'FORD',
                'image_name' => 'ford.png',
                'models' => [
                    [
                        'name' => '4600',
                        'slug' => '4600',
                        'description' => '4600',
                        'series' => []
                    ],
                    [
                        'name' => '5000',
                        'slug' => '5000',
                        'description' => '5000',
                        'series' => []
                    ],
                    [
                        'name' => '8210',
                        'slug' => '8210',
                        'description' => '8210',
                        'series' => []
                    ],
                    [
                        'name' => 'Escape',
                        'slug' => 'escape',
                        'description' => 'Escape',
                        'series' => []
                    ],
                    [
                        'name' => 'Escort',
                        'slug' => 'escort',
                        'description' => 'Escort',
                        'series' => []
                    ],
                    [
                        'name' => 'Everest',
                        'slug' => 'everest',
                        'description' => 'Everest',
                        'series' => []
                    ],
                    [
                        'name' => 'Focus',
                        'slug' => 'focus',
                        'description' => 'Focus',
                        'series' => []
                    ],
                    [
                        'name' => 'Kuga',
                        'slug' => 'kuga',
                        'description' => 'Kuga',
                        'series' => []
                    ],
                    [
                        'name' => 'Mondeo',
                        'slug' => 'mondeo',
                        'description' => 'Mondeo',
                        'series' => []
                    ],
                    [
                        'name' => 'Mustang',
                        'slug' => 'mustang',
                        'description' => 'Mustang',
                        'series' => []
                    ],
                    [
                        'name' => 'Ranger',
                        'slug' => 'ranger',
                        'description' => 'Ranger',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'FOTON',
                'slug' => 'fonton',
                'description' => 'FOTON',
                'image_name' => 'foton.png',
                'models' => [

                ]
            ],
            [
                'name' => 'BMW',
                'slug' => 'bmw',
                'description' => 'BMW',
                'image_name' => 'bmw.png',
                'models' => [
                    [
                        'name' => 'I SERIES',
                        'slug' => 'i_series',
                        'description' => 'I SERIES',
                        'series' => []
                    ],
                    [
                        'name' => '116i',
                        'slug' => '116i',
                        'description' => '116i',
                        'series' => []
                    ],
                    [
                        'name' => '118i',
                        'slug' => '118i',
                        'description' => '118i',
                        'series' => []
                    ],
                    [
                        'name' => '120i',
                        'slug' => '120i',
                        'description' => '120i',
                        'series' => []
                    ],
                    [
                        'name' => '130i',
                        'slug' => '130i',
                        'description' => '130i',
                        'series' => []
                    ],
                    [
                        'name' => '2series',
                        'slug' => '2series',
                        'description' => '2series',
                        'series' => []
                    ],
                    [
                        'name' => '3series',
                        'slug' => '3series',
                        'description' => '3series',
                        'series' => []
                    ],
                    [
                        'name' => '3SERIES SEDAN',
                        'slug' => 's_series_sedan',
                        'description' => '3SERIES SEDAN',
                        'series' => []
                    ],
                    [
                        'name' => '318i',
                        'slug' => '318i',
                        'description' => '318i',
                        'series' => []
                    ],
                    [
                        'name' => '320i',
                        'slug' => '320i',
                        'description' => '320i',
                        'series' => []
                    ],
                    [
                        'name' => '323i',
                        'slug' => '323i',
                        'description' => '323i',
                        'series' => []
                    ],
                    [
                        'name' => '330i',
                        'slug' => '330i',
                        'description' => '330i',
                        'series' => []
                    ],
                    [
                        'name' => '335i',
                        'slug' => '335i',
                        'description' => '335i',
                        'series' => []
                    ],
                    [
                        'name' => '4SERIES',
                        'slug' => '4series',
                        'description' => '4series',
                        'series' => []
                    ],
                    [
                        'name' => '5SERIES',
                        'slug' => '5series',
                        'description' => '5series',
                        'series' => []
                    ],
                    [
                        'name' => '520i',
                        'slug' => '520i',
                        'description' => '5320i',
                        'series' => []
                    ],
                    [
                        'name' => '523i',
                        'slug' => '523i',
                        'description' => '523i',
                        'series' => []
                    ],
                    [
                        'name' => '525i',
                        'slug' => '525i',
                        'description' => '525i',
                        'series' => []
                    ],
                    [
                        'name' => '535i',
                        'slug' => '535i',
                        'description' => '535i',
                        'series' => []
                    ],
                    [
                        'name' => '6 Series',
                        'slug' => '6_series',
                        'description' => '6 Series',
                        'series' => []
                    ],
                    [
                        'name' => '7 Series',
                        'slug' => '7_series',
                        'description' => '7 Series',
                        'series' => []
                    ],
                    [
                        'name' => 'F800',
                        'slug' => 'f_800',
                        'description' => 'F800',
                        'series' => []
                    ],
                    [
                        'name' => 'M3',
                        'slug' => 'm3',
                        'description' => 'M3',
                        'series' => []
                    ],
                    [
                        'name' => 'Rseries',
                        'slug' => 'r_series',
                        'description' => 'Rseries',
                        'series' => []
                    ],
                    [
                        'name' => 'X1',
                        'slug' => 'x1',
                        'description' => 'X1',
                        'series' => []
                    ],
                    [
                        'name' => 'X3',
                        'slug' => 'x3',
                        'description' => 'X3',
                        'series' => []
                    ],
                    [
                        'name' => 'X5',
                        'slug' => 'x5',
                        'description' => 'X5',
                        'series' => []
                    ],
                    [
                        'name' => 'X6',
                        'slug' => 'x6',
                        'description' => 'X6',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HALLEY DAVIDSON',
                'slug' => 'halley_davidson',
                'description' => 'HALLEY DAVIDSON',
                'image_name' => 'halley_davidson.png',
                'models' => [
                    [
                        'name' => 'Electrica Glide',
                        'slug' => 'elecrica_glide',
                        'description' => 'Electrica Glide',
                        'series' => []
                    ],
                    [
                        'name' => 'SS',
                        'slug' => 'ss',
                        'description' => 'SS',
                        'series' => []
                    ],
                    [
                        'name' => 'Tour',
                        'slug' => 'tour',
                        'description' => 'Tour',
                        'series' => []
                    ],
                    [
                        'name' => 'XL',
                        'slug' => 'xl',
                        'description' => 'XL',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HERO',
                'slug' => 'hero',
                'description' => 'HERO',
                'image_name' => 'hero.png',
                'models' => [
                    [
                        'name' => 'HF Dawn',
                        'slug' => 'hf_dawn',
                        'description' => 'HF Dawn',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HINO',
                'slug' => 'hino',
                'description' => 'HINO',
                'image_name' => 'hino.png',
                'models' => [
                    [
                        'name' => 'Dutro',
                        'slug' => 'dutro',
                        'description' => 'Dutro',
                        'series' => []
                    ],
                    [
                        'name' => 'Hino',
                        'slug' => 'hino',
                        'description' => 'Hino',
                        'series' => []
                    ],
                    [
                        'name' => 'Ranger',
                        'slug' => 'ranger',
                        'description' => 'Ranger',
                        'series' => []
                    ],
                    [
                        'name' => 'Tipper',
                        'slug' => 'tipper',
                        'description' => 'Tipper',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HITACHI',
                'slug' => 'hitachi',
                'description' => 'HITACHI',
                'image_name' => 'hitachi.png',
                'models' => [
                    [
                        'name' => 'Earth Mover',
                        'slug' => 'earth_mover',
                        'description' => 'Earth Mover',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HUMMER',
                'slug' => 'hummer',
                'description' => 'HUMMER',
                'image_name' => 'hummer.png',
                'models' => [
                    [
                        'name' => 'H3',
                        'slug' => 'h3',
                        'description' => 'H3',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HYUNDAI',
                'slug'  => 'hyundai',
                'description' => 'HYUNDAI',
                'image_name' => 'hyundai.png',
                'models' => [
                    [
                        'name' => 'Accenty',
                        'slug' => 'accenty',
                        'description' => 'Accenty',
                        'series' => []
                    ],
                    [
                        'name' => 'Santa fe',
                        'slug' => 'santa_fe',
                        'description' => 'Santa fe',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'HONDA',
                'slug' => 'honda',
                'description' => 'HONDA',
                'image_name' => 'honda.png',
                'models' => [
                    [
                        'name' => '1300',
                        'slug' => '1300',
                        'description' => '1300',
                        'series' => []
                    ],
                    [
                        'name' => 'Accord',
                        'slug' => 'accord',
                        'description' => 'Accord',
                        'series' => []
                    ],
                    [
                        'name' => 'Airwave',
                        'slug' => 'airwave',
                        'description' => 'Airwave',
                        'series' => []
                    ],
                    [
                        'name' => 'Civic',
                        'slug' => 'civic',
                        'description' => 'Civic',
                        'series' => []
                    ],
                    [
                        'name' => 'CR-V',
                        'slug' => 'crv',
                        'description' => 'CR-V',
                        'series' => []
                    ],
                    [
                        'name' => 'CR-Z',
                        'slug' => 'crz',
                        'description' => 'CR-Z',
                        'series' => []
                    ],
                    [
                        'name' => 'Crossroad',
                        'slug' => 'crossroad',
                        'description' => 'Crossroad',
                        'series' => []
                    ],
                    [
                        'name' => 'Fit',
                        'slug' => 'fit',
                        'description' => 'Fit',
                        'series' => []
                    ],
                    [
                        'name' => 'Freed',
                        'slug' => 'freed',
                        'description' => 'Freed',
                        'series' => []
                    ],
                    [
                        'name' => 'HR-V',
                        'slug' => 'hrv',
                        'description' => 'HR-V',
                        'series' => []
                    ],
                    [
                        'name' => 'Insight',
                        'slug' => 'insight',
                        'description' => 'Insight',
                        'series' => []
                    ],
                    [
                        'name' => 'Inspire',
                        'slug' => 'inspire',
                        'description' => 'Inspire',
                        'series' => []
                    ],
                    [
                        'name' => 'Jade',
                        'slug' => 'jade',
                        'description' => 'Jade',
                        'series' => []
                    ],
                    [
                        'name' => 'N-Box',
                        'slug' => 'nbox',
                        'description' => 'N-Box',
                        'series' => []
                    ],
                    [
                        'name' => 'Odyssey',
                        'slug' => 'odyssey',
                        'description' => 'Odyssey',
                        'series' => []
                    ],
                    [
                        'name' => 'Shuttle',
                        'slug' => 'shuttle',
                        'description' => 'Shuttle',
                        'series' => []
                    ],
                    [
                        'name' => 'Spike',
                        'slug' => 'spike',
                        'description' =>'Spike',
                        'series' => []
                    ],
                    [
                        'name' => 'Stepwagon',
                        'slug' => 'stepwagon',
                        'description' =>  'Stepwagon',
                        'series' => []
                    ],
                    [
                        'name' => 'Stream',
                        'slug' => 'stream',
                        'description' => 'Stream',
                        'series' => []
                    ],
                    [
                        'name' => 'Vezel',
                        'slug' => 'vezel',
                        'description' => 'Vezel',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'ISUZU',
                'slug' => 'isuzu',
                'description' => 'ISUZU',
                'image_name' => 'isuzu.png',
                'models' => [
                    [
                        'name' => 'Como',
                        'slug' => 'como',
                        'description' => 'Como',
                        'series' => []
                    ],
                    [
                        'name' => 'D-MAX',
                        'slug' => 'dmax',
                        'description' => 'D-MAX',
                        'series' => []
                    ],
                    [
                        'name' => 'Direct',
                        'slug' => 'direct',
                        'description' => 'Direct',
                        'series' => []
                    ],
                    [
                        'name' => 'ELF Truck',
                        'slug' => 'elf_truck',
                        'description' => 'ELF Truck',
                        'series' => []
                    ],
                    [
                        'name' => 'FFR',
                        'slug' => 'ffr',
                        'description' => 'FFR',
                        'series' => []
                    ],
                    [
                        'name' => 'FSR',
                        'slug' => 'fsr',
                        'description' => 'FSR',
                        'series' => []
                    ],
                    [
                        'name' => 'FVR',
                        'slug' => 'fvr',
                        'description' => 'FVR',
                        'series' => []
                    ],
                    [
                        'name' => 'GIGA',
                        'slug' => 'giga',
                        'description' => 'GIGA',
                        'series' => []
                    ],
                    [
                        'name' => 'NKR',
                        'slug' => 'nkr',
                        'description' => 'NKR',
                        'series' => []
                    ],
                    [
                        'name' => 'NPR',
                        'slug' => 'npr',
                        'description' => 'NPR',
                        'series' => []
                    ],
                    [
                        'name' => 'NQR',
                        'slug' => 'nqr',
                        'description' => 'NQR',
                        'series' => []
                    ],
                    [
                        'name' => 'Rodeo',
                        'slug' => 'rodeo',
                        'description' => 'Rodeo',
                        'series' => []
                    ],
                    [
                        'name' => 'Tougher',
                        'slug' => 'tougher',
                        'description' => 'Tougher',
                        'series' => []
                    ],
                    [
                        'name' => 'Trooper',
                        'slug' => 'tropper',
                        'description' => 'Trooper',
                        'series' => []
                    ],
                    [
                        'name' => 'Wizard',
                        'slug' => 'wizard',
                        'description' => 'Wizard',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'INFINITI',
                'slug' => 'infiniti',
                'description' => 'INFINITI',
                'image_name' => 'infiniti.png',
                'models' => [
                    [
                        'name' => 'QX80',
                        'slug' => 'qx80',
                        'description' => 'QX80',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'IVECO',
                'slug' => 'iveco',
                'description' => 'IVECO',
                'image_name' => 'iveco.png',
                'models' => [
                    [
                        'name' => 'Cusor',
                        'slug' => 'cusor',
                        'description' => 'Cusor',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'JAGUAR',
                'slug' => 'jaguar',
                'description' => 'JAGUAR',
                'image_name' => 'jaguar.png',
                'models' => [
                    [
                        'name' => 'S-Type',
                        'slug' => 'stype',
                        'description' => 'S-Type',
                        'series' => []
                    ],
                    [
                        'name' => 'X-Type',
                        'slug' => 'xtype',
                        'description' => 'X-Type',
                        'series' => []
                    ],
                    [
                        'name' => 'Xe-25t',
                        'slug' => 'xe25t',
                        'description' => 'Xe-25t',
                        'series' => []
                    ],
                    [
                        'name' => 'XF',
                        'slug' => 'xf',
                        'description' => 'XF',
                        'series' => []
                    ],
                    [
                        'name' => 'XJ',
                        'slug' => 'xj',
                        'description' => 'XJ',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'JEEP',
                'slug' => 'jeep',
                'description' => 'JEEP',
                'image_name' => 'jeep.png',
                'models' => [
                    [
                        'name' => 'Cherokee',
                        'slug' => 'cherokee',
                        'description' => 'Cherokee',
                        'series' => []
                    ],
                    [
                        'name' => 'Compass',
                        'slug' => 'compass',
                        'description' => 'Compass',
                        'series' => []
                    ],
                    [
                        'name' => 'Grand Cherokee',
                        'slug' => 'grand_cherokee',
                        'description' => 'Grand Cherokee',
                        'series' => []
                    ],
                    [
                        'name' => 'Jeepster',
                        'slug' => 'jeepster',
                        'description' => 'Jeepster',
                        'series' => []
                    ],
                    [
                        'name' => 'Patriot',
                        'slug' => 'patriot',
                        'description' => 'Patriot',
                        'series' => []
                    ],
                    [
                        'name' => 'Wrangler',
                        'slug' => 'wrangler',
                        'description' => 'Wrangler',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'KAWASAKI',
                'slug' => 'kawasaki',
                'description' => 'KAWASAKI',
                'image_name' => 'kawasaki.png',
                'models' => [
                    [
                        'name' => 'GTR',
                        'slug' => 'gtr',
                        'description' => 'GTR',
                        'series' => []
                    ],
                    [
                        'name' => 'ZZR',
                        'slug' => 'zzr',
                        'description' => 'ZZR',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'KIA',
                'slug' => 'kia',
                'description' => 'KIA',
                'image_name' => 'kia.png',
                'models' => [
                    [
                        'name' => 'Sorento',
                        'slug' => 'sorento',
                        'description' => 'Sorento',
                        'series' => []
                    ],
                    [
                        'name' => 'Sportage',
                        'slug' => 'sportage',
                        'description' => 'Sportage',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'LEYLAND',
                'slug' => 'leyland',
                'description' => 'LEYLAND',
                'image_name' => 'leyland.png',
                'models' => [
                    [
                        'name' => 'Ashok',
                        'slug' => 'ashok',
                        'description' => 'Ashok',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'LEXUS',
                'slug' => 'lexus',
                'description' => 'LEXUS',
                'image_name' => 'lexus.png',
                'models' => [
                    [
                        'name' => 'G70',
                        'slug' => 'g70',
                        'description' => 'G70',
                        'series' => []
                    ],
                    [
                        'name' => 'CT',
                        'slug' => 'ct',
                        'description' => 'CT',
                        'series' => []
                    ],
                    [
                        'name' => 'GS',
                        'slug' => 'gs',
                        'description' => 'GS',
                        'series' => []
                    ],
                    [
                        'name' => 'IS',
                        'slug' => 'is',
                        'description' => 'IS',
                        'series' => []
                    ],
                    [
                        'name' => 'LS',
                        'slug' => 'ls',
                        'description' => 'LS',
                        'series' => []
                    ],
                    [
                        'name' => 'LX',
                        'slug' => 'lx',
                        'description' => 'LX',
                        'series' => []
                    ],
                    [
                        'name' => 'NX',
                        'slug' => 'nx',
                        'description' => 'NX',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'LANDROVER',
                'slug' => 'landrover',
                'description' => 'LANDROVER',
                'image_name' => 'landrover.png',
                'models' => [
                    [
                        'name' => '88',
                        'slug' => '88',
                        'description' => '88',
                        'series' => []
                    ],
                    [
                        'name' => '88',
                        'slug' => '88',
                        'description' => '88',
                        'series' => []
                    ],
                    [
                        'name' => 'Defender',
                        'slug' => 'defender',
                        'description' => 'Defender',
                        'series' => []
                    ],
                    [
                        'name' => 'Defender110',
                        'slug' => 'defender110',
                        'description' => 'Defender110',
                        'series' => []
                    ],
                    [
                        'name' => 'Defender130',
                        'slug' => 'defender130',
                        'description' => 'Defender130',
                        'series' => []
                    ],
                    [
                        'name' => 'Discovery',
                        'slug' => 'discovery',
                        'description' => 'Discovery',
                        'series' => []
                    ],
                    [
                        'name' => 'Discovery 1',
                        'slug' => 'discovery_1',
                        'description' => 'Discovery 1',
                        'series' => []
                    ],
                    [
                        'name' => 'Discovery ii',
                        'slug' => 'discovery_ii',
                        'description' => 'discovery_iii',
                        'series' => []
                    ],
                    [
                        'name' => 'Discovery iv',
                        'slug' => 'discovery_iv',
                        'description' => 'Discovery iv',
                        'series' => []
                    ],
                    [
                        'name' => 'Freelancer',
                        'slug' => 'freelancer',
                        'description' => 'Freelancer',
                        'series' => []
                    ],
                    [
                        'name' => 'RangeRover',
                        'slug' => 'rangerover',
                        'description' => 'RangeRover',
                        'series' => []
                    ],
                    [
                        'name' => 'RangeRover Evoques',
                        'slug' => 'rangerover_evoques',
                        'description' => 'RangeRover Sport',
                        'series' => []
                    ],
                    [
                        'name' => 'RangeRover Vogue',
                        'slug' => 'rangerover_vogue',
                        'description' => 'RangeRover Vogue',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'MAN',
                'slug' => 'man',
                'description' => 'MAN',
                'image_name' => 'man.png',
                'models' => [
                    [
                        'name' => 'TGM',
                        'slug' => 'tgm',
                        'description' => 'TGM',
                        'series' => []
                    ],
                    [
                        'name' => 'TGS',
                        'slug' => 'tgs',
                        'description' => 'TGS',
                        'series' => []
                    ],
                    [
                        'name' => 'TGX',
                        'slug' => 'tgx',
                        'description' => 'TGX',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'MAZDA',
                'slug' => 'mazda',
                'description' => 'MAZDA',
                'image_name' => 'mazda.png',
                'models' => [
                ]
            ],
            [
                'name' => 'MINI',
                'slug' => 'mini',
                'description' => 'MINI',
                'image_name' => 'mini.png',
                'models' => [
                    [
                        'name' => 'Cooper',
                        'slug' => 'cooper',
                        'description' => 'Cooper',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'MITSUHIBSHI',
                'slug' => 'mitsubishi',
                'description' => 'MITSUHIBSHI',
                'image_name' => 'mitsubishi.png',
                'models' => [
                    [
                        'name' => 'Canter',
                        'slug' => 'canter',
                        'description' => 'Canter',
                        'series' => []
                    ],
                    [
                        'name' => 'Colt',
                        'slug' => 'colt',
                        'description' => 'Colt',
                        'series' => []
                    ],
                    [
                        'name' => 'Delica',
                        'slug' => 'delica',
                        'description' => 'Delica',
                        'series' => []
                    ],
                    [
                        'name' => 'Fit',
                        'slug' => 'fit',
                        'description' => 'Fit',
                        'series' => []
                    ],
                    [
                        'name' => 'Fighter',
                        'slug' => 'fighter',
                        'description' => 'Fighter',
                        'series' => []
                    ],
                    [
                        'name' => 'Fuso Fighter',
                        'slug' => 'fuso_fighter',
                        'description' => 'Fuso Fighter',
                        'series' => []
                    ],
                    [
                        'name' => 'Galant',
                        'slug' => 'galant',
                        'description' => 'Galant',
                        'series' => []
                    ],
                    [
                        'name' => 'Grandis',
                        'slug' => 'grandis',
                        'description' => 'Grandis',
                        'series' => []
                    ],
                    [
                        'name' => 'L200',
                        'slug' => 'l200',
                        'description' => 'L200',
                        'series' => []
                    ],
                    [
                        'name' => 'Lancer',
                        'slug' => 'lancer',
                        'description' => 'Lancer',
                        'series' => []
                    ],
                    [
                        'name' => 'Lancer-Cedia',
                        'slug' => 'lancer_cedia',
                        'description' => 'Lancer-Cedia',
                        'series' => []
                    ],
                    [
                        'name' => 'Lancer Evo',
                        'slug' => 'lancer_evo',
                        'description' => 'Lancer Evo',
                        'series' => []
                    ],
                    [
                        'name' => 'Minicab',
                        'slug' => 'minicab',
                        'description' => 'Minicab',
                        'series' => []
                    ],
                    [
                        'name' => 'Mirage',
                        'slug' => 'mirage',
                        'description' => 'Mirage',
                        'series' => []
                    ],
                    [
                        'name' => 'Outlander',
                        'slug' => 'outlander',
                        'description' => 'Outlander',
                        'series' => []
                    ],
                    [
                        'name' => 'Pajero',
                        'slug' => 'pajero',
                        'description' => 'Pajero',
                        'series' => []
                    ],
                    [
                        'name' => 'Pajero 10',
                        'slug' => 'pajero_10',
                        'description' => 'Pajero 10',
                        'series' => []
                    ],
                    [
                        'name' => 'Pajero Mini',
                        'slug' => 'pajero_mini',
                        'description' => 'Pajero Mini',
                        'series' => []
                    ],
                    [
                        'name' => 'Rosa',
                        'slug' => 'rosa',
                        'description' => 'Rosa',
                        'series' => []
                    ],
                    [
                        'name' => 'RVR',
                        'slug' => 'rvr',
                        'description' => 'RVR',
                        'series' => []
                    ],
                    [
                        'name' => 'Shogon',
                        'slug' => 'shogon',
                        'description' => 'Shogon',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'MERCEDES BENZ',
                'slug' => 'mercedes_benz',
                'description' => 'MERCEDES BENZ',
                'image_name' => 'mercedes_benz.png',
                'models' => [
                    [
                        'name' => 'C Coupe',
                        'slug' => 'c_coupe',
                        'description' =>'C Coupe',
                        'series' => []
                    ],
                    [
                        'name' => '190E',
                        'slug' => '190e',
                        'description' => '190e',
                        'series' => []
                    ],
                    [
                        'name' => '200',
                        'slug' => '200',
                        'description' => '200',
                        'series' => []
                    ],
                    [
                        'name' => '200E',
                        'slug' => '200e',
                        'description' => '200E',
                        'series' => []
                    ],
                    [
                        'name' => '911',
                        'slug' => '911',
                        'description' => '911',
                        'series' => []
                    ],
                    [
                        'name' => 'A-Class',
                        'slug' => 'a_class',
                        'description' => 'A-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'A180',
                        'slug' => 'a180',
                        'description' => 'A180',
                        'series' => []
                    ],
                    [
                        'name' => 'Actros',
                        'slug' => 'actros',
                        'description' => 'Actros',
                        'series' => []
                    ],
                    [
                        'name' => 'AMG C43',
                        'slug' => 'amg_c43',
                        'description' => 'AMG C43',
                        'series' => []
                    ],
                    [
                        'name' => 'Axor',
                        'slug' => 'axor',
                        'description' => 'Axor',
                        'series' => []
                    ],
                    [
                        'name' => 'B-Class',
                        'slug' => 'b_class',
                        'description' => 'B-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'B180',
                        'slug' => 'b180',
                        'description' => 'B180',
                        'series' => []
                    ],
                    [
                        'name' => 'C180',
                        'slug' => 'c180',
                        'description' => 'C180',
                        'series' => []
                    ],
                    [
                        'name' => 'C200',
                        'slug' => 'c200',
                        'description' => 'C200',
                        'series' => []
                    ],
                    [
                        'name' => 'C230',
                        'slug' => 'c230',
                        'description' => 'C230',
                        'series' => []
                    ],
                    [
                        'name' => 'C240',
                        'slug' => 'c240',
                        'description' => 'C240',
                        'series' => []
                    ],
                    [
                        'name' => 'C250',
                        'slug' => 'c250',
                        'description' => 'C250',
                        'series' => []
                    ],
                    [
                        'name' => 'C63',
                        'slug' => 'c63',
                        'description' => 'C63',
                        'series' => []
                    ],
                    [
                        'name' => 'CLA-Class',
                        'slug' => 'cla_class',
                        'description' => 'CLA-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'CLS',
                        'slug' => 'cls',
                        'description' => 'CLS',
                        'series' => []
                    ],
                    [
                        'name' => 'E-Class',
                        'slug' => 'e_class',
                        'description' => 'E-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'E-200',
                        'slug' => 'e_200',
                        'description' => 'E-200',
                        'series' => []
                    ],
                    [
                        'name' => 'E-220',
                        'slug' => 'e220',
                        'description' => 'E-220',
                        'series' => []
                    ],
                    [
                        'name' => 'E-230',
                        'slug' => 'e_230',
                        'description' => 'E-230',
                        'series' => []
                    ],
                    [
                        'name' => 'E240',
                        'slug' => 'e240',
                        'description' => 'E240',
                        'series' => []
                    ],
                    [
                        'name' => 'E250',
                        'slug' => 'e250',
                        'description' => 'E250',
                        'series' => []
                    ],
                    [
                        'name' => 'E300',
                        'slug' => 'e300',
                        'description' => 'E300',
                        'series' => []
                    ],
                    [
                        'name' => 'E320',
                        'slug' => 'e320',
                        'description' => 'E320',
                        'series' => []
                    ],
                    [
                        'name' => 'E350',
                        'slug' => 'e350',
                        'description' => 'E350',
                        'series' => []
                    ],
                    [
                        'name' => 'E500',
                        'slug' => 'e500',
                        'description' => 'E500',
                        'series' => []
                    ],
                    [
                        'name' => 'GLA',
                        'slug' => 'gla',
                        'description' => 'GLA',
                        'series' => []
                    ],
                    [
                        'name' => 'GLE',
                        'slug' => 'gle',
                        'description' => 'GLE',
                        'series' => []
                    ],
                    [
                        'name' => 'M-Class',
                        'slug' => 'm_class',
                        'description' => 'M-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'ML250',
                        'slug' => 'ml250',
                        'description' => 'ML250',
                        'series' => []
                    ],
                    [
                        'name' => 'ML320',
                        'slug' => 'ml320',
                        'description' => 'ML320',
                        'series' => []
                    ],
                    [
                        'name' => 'ML350',
                        'slug' => 'ml350',
                        'description' => 'ML350',
                        'series' => []
                    ],
                    [
                        'name' => 'S-Class',
                        'slug' => 's_class',
                        'description' => 'S-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'S350',
                        'slug' => 's350',
                        'description' => 'S350',
                        'series' => []
                    ],
                    [
                        'name' => 'S550',
                        'slug' => 's550',
                        'description' => 'S550',
                        'series' => []
                    ],
                    [
                        'name' => 'SL',
                        'slug' => 'sl',
                        'description' => 'SL',
                        'series' => []
                    ],
                    [
                        'name' => 'SLK-Class',
                        'slug' => 'slk_class',
                        'description' => 'SLK-Class',
                        'series' => []
                    ],
                    [
                        'name' => 'Spinter',
                        'slug' => 'spinter',
                        'description' => 'Spinter',
                        'series' => []
                    ],
                    [
                        'name' => '2',
                        'slug' => '2',
                        'description' => '2',
                        'series' => []
                    ],
                    [
                        'name' => '3',
                        'slug' => '3',
                        'description' => '3',
                        'series' => []
                    ],
                    [
                        'name' => 'Atenza',
                        'slug' => 'atenza',
                        'description' => 'Atenza',
                        'series' => []
                    ],
                    [
                        'name' => 'Alexa',
                        'slug' => 'alexa',
                        'description' => 'Alexa',
                        'series' => []
                    ],
                    [
                        'name' => 'AZ',
                        'slug' => 'az',
                        'description' => 'AZ',
                        'series' => []
                    ],
                    [
                        'name' => 'Biante',
                        'slug' => 'biante',
                        'description' => 'Biante',
                        'series' => []
                    ],
                    [
                        'name' => 'Bongo',
                        'slug' => 'bongo',
                        'description' => 'Bongo',
                        'series' => []
                    ],
                    [
                        'name' => 'Carol',
                        'slug' => 'carol',
                        'description' => 'Carol',
                        'series' => []
                    ],
                    [
                        'name' => 'CX-3',
                        'slug' => 'cx3',
                        'description' => 'CX-3',
                        'series' => []
                    ],
                    [
                        'name' => 'CX-5',
                        'slug' => 'cx5',
                        'description' => 'CX-5',
                        'series' => []
                    ],
                    [
                        'name' => 'CX-7',
                        'slug' => 'cx7',
                        'description' => 'CX-7',
                        'series' => []
                    ],
                    [
                        'name' => 'Demio',
                        'slug' => 'demio',
                        'description' => 'Demio',
                        'series' => []
                    ],
                    [
                        'name' => 'Familia',
                        'slug' => 'familia',
                        'description' => 'Familia',
                        'series' => []
                    ],
                    [
                        'name' => 'MPV',
                        'slug' => 'mpv',
                        'description' => 'MPV',
                        'series' => []
                    ],
                    [
                        'name' => 'Premacy',
                        'slug' => 'premacy',
                        'description' => 'Premacy',
                        'series' => []
                    ],
                    [
                        'name' => 'Scrum',
                        'slug' => 'scrum',
                        'description' => 'Scrum',
                        'series' => []
                    ],
                    [
                        'name' => 'Titan Dash',
                        'slug' => 'titan_dash',
                        'description' => 'Titan Dash',
                        'series' => []
                    ],
                    [
                        'name' => 'Tribute',
                        'slug' => 'tribute',
                        'description' => 'Tribute',
                        'series' => []
                    ],
                    [
                        'name' => 'Verosa',
                        'slug' => 'verosa',
                        'description' => 'Verosa',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'NISSAN',
                'slug' => 'nissan',
                'description' => 'NISSAN',
                'image_name' => 'nissan.png',
                'models' => [
                    [
                        'name' => '100',
                        'slug' => '100',
                        'description' => '100',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'OPEL',
                'slug' => 'opel',
                'description' => 'OPEL',
                'models' => [
                    [
                        'name' => 'Advan',
                        'slug' => 'advan',
                        'description' => 'Advan',
                        'series' => []
                    ],
                    [
                        'name' => 'Atlas',
                        'slug' => 'atlas',
                        'description' => 'Atlas',
                        'series' => []
                    ],
                    [
                        'name' => 'Blue Bird',
                        'slug' => 'blue_bird',
                        'description' => 'Blue Bird',
                        'series' => []
                    ],
                    [
                        'name' => 'Caravan',
                        'slug' => 'caravan',
                        'description' => 'Caravan',
                        'series' => []
                    ],
                    [
                        'name' => 'Carina',
                        'slug' => 'carina',
                        'description' => 'Carina',
                        'series' => []
                    ],
                    [
                        'name' => 'Civilian',
                        'slug' => 'civilian',
                        'description' => 'Civilian',
                        'series' => []
                    ],
                    [
                        'name' => 'Clipper',
                        'slug' => 'clipper',
                        'description' => 'Clipper',
                        'series' => []
                    ],
                    [
                        'name' => 'Cube',
                        'slug' => 'cube',
                        'description' => 'Cube',
                        'series' => []
                    ],
                    [
                        'name' => 'Datsun',
                        'slug' => 'datsun',
                        'description' => 'Datsun',
                        'series' => []
                    ],
                    [
                        'name' => 'Dualis',
                        'slug' => 'dualis',
                        'description' => 'Dualis',
                        'series' => []
                    ],
                    [
                        'name' => 'Elgrand',
                        'slug' => 'elgrand',
                        'description' => 'Elgrand',
                        'series' => []
                    ],
                    [
                        'name' => 'Fairlady',
                        'slug' => 'fairlady',
                        'description' => 'Fairlady',
                        'series' => []
                    ],
                    [
                        'name' => 'FB15',
                        'slug' => 'fb15',
                        'description' => 'FB15',
                        'series' => []
                    ],
                    [
                        'name' => 'Fuga',
                        'slug' => 'fuga',
                        'description' => 'Fuga',
                        'series' => []
                    ],
                    [
                        'name' => 'Hardbody',
                        'slug' => 'hardbody',
                        'description' => 'Hardbody',
                        'series' => []
                    ],
                    [
                        'name' => 'Homy',
                        'slug' => 'homy',
                        'description' => 'Homy',
                        'series' => []
                    ],
                    [
                        'name' => 'Interstar',
                        'slug' => 'interstar',
                        'description' => 'Interstar',
                        'series' => []
                    ],
                    [
                        'name' => 'Juke',
                        'slug' => 'juke',
                        'description' => 'Juke',
                        'series' => []
                    ],
                    [
                        'name' => 'KIX',
                        'slug' => 'kix',
                        'description' => 'KIX',
                        'series' => []
                    ],
                    [
                        'name' => 'Lafesta',
                        'slug' => 'lafesta',
                        'description' => 'Lafesta',
                        'series' => []
                    ],
                    [
                        'name' => 'Latio',
                        'slug' => 'latio',
                        'description' => 'Latio',
                        'series' => []
                    ],
                    [
                        'name' => 'Leaf',
                        'slug' => 'leaf',
                        'description' => 'Leaf',
                        'series' => []
                    ],
                    [
                        'name' => 'Maral',
                        'slug' => 'maral',
                        'description' => 'Maral',
                        'series' => []
                    ],
                    [
                        'name' => 'Maxima',
                        'slug' => 'maxima',
                        'description' => 'Maxima',
                        'series' => []
                    ],
                    [
                        'name' => 'Moco',
                        'slug' => 'moco',
                        'description' => 'Moco',
                        'series' => []
                    ],
                    [
                        'name' => 'Murano',
                        'slug' => 'murano',
                        'description' => 'Murano',
                        'series' => []
                    ],
                    [
                        'name' => 'Navara',
                        'slug' => 'navara',
                        'description' => 'Navara',
                        'series' => []
                    ],
                    [
                        'name' => 'Note',
                        'slug' => 'note',
                        'description' => 'Note',
                        'series' => []
                    ],
                    [
                        'name' => 'NP200',
                        'slug' => 'np200',
                        'description' => 'NP200',
                        'series' => []
                    ],
                    [
                        'name' => 'NP300',
                        'slug' => 'np300',
                        'description' => 'NP300',
                        'series' => []
                    ],
                    [
                        'name' => 'NV200',
                        'slug' => 'nv200',
                        'description' => 'NV200',
                        'series' => []
                    ],
                    [
                        'name' => 'NV3500',
                        'slug' => 'nv3500',
                        'description' => 'NV3500',
                        'series' => []
                    ],
                    [
                        'name' => 'Otti',
                        'slug' => 'otti',
                        'description' => 'Otti',
                        'series' => []
                    ],
                    [
                        'name' => 'Pathfiner',
                        'slug' => 'pathfiner',
                        'description' => 'Pathfiner',
                        'series' => []
                    ],
                    [
                        'name' => 'Patrol',
                        'slug' => 'patrol',
                        'description' => 'Patrol',
                        'series' => []
                    ],
                    [
                        'name' => 'Pickup',
                        'slug' => 'pickup',
                        'description' => 'Pickup',
                        'series' => []
                    ],
                    [
                        'name' => 'Pino',
                        'slug' => 'pino',
                        'description' => 'Pino',
                        'series' => []
                    ],
                    [
                        'name' => 'Primera',
                        'slug' => 'primera',
                        'description' => 'Primera',
                        'series' => []
                    ],
                    [
                        'name' => 'Qashqai',
                        'slug' => 'qashqai',
                        'description' => 'Qashqai',
                        'series' => []
                    ],
                    [
                        'name' => 'Teana',
                        'slug' => 'teana',
                        'description' => 'Teana',
                        'series' => []
                    ],
                    [
                        'name' => 'TIIDA',
                        'slug' => 'tiida',
                        'description' => 'TIIDA',
                        'series' => []
                    ],
                    [
                        'name' => 'UD',
                        'slug' => 'ud',
                        'description' => 'UD',
                        'series' => []
                    ],
                    [
                        'name' => 'Uruan',
                        'slug' => 'uruan',
                        'description' => 'Uruan',
                        'series' => []
                    ],
                    [
                        'name' => 'Vanette',
                        'slug' => 'vanette',
                        'description' => 'Vanette',
                        'series' => []
                    ],
                    [
                        'name' => 'Wingroad',
                        'slug' => 'wingroad',
                        'description' => 'Wingroad',
                        'series' => []
                    ],
                    [
                        'name' => 'X-Trail',
                        'slug' => 'x_trail',
                        'description' => 'X-Trail',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'PEUGEOT',
                'slug' => 'peugeot',
                'description' => 'PEUGEOT',
                'models' => [
                    [
                        'name' => '206',
                        'slug' => '206',
                        'description' => '206',
                        'series' => []
                    ],
                    [
                        'name' => '207',
                        'slug' => '207',
                        'description' => '207',
                        'series' => []
                    ],
                    [
                        'name' => '208',
                        'slug' => '208',
                        'description' => '208',
                        'series' => []
                    ],
                    [
                        'name' => '3008',
                        'slug' => '3008',
                        'description' => '3008',
                        'series' => []
                    ],
                    [
                        'name' => '3008 Crossover',
                        'slug' => '3008_crossover',
                        'description' => '3008 Crossover',
                        'series' => []
                    ],
                    [
                        'name' => '306',
                        'slug' => '306',
                        'description' => '306',
                        'series' => []
                    ],
                    [
                        'name' => '307',
                        'slug' => '307',
                        'description' => '307',
                        'series' => []
                    ],
                    [
                        'name' => '308',
                        'slug' => '308',
                        'description' => '308',
                        'series' => []
                    ],
                    [
                        'name' => '406',
                        'slug' => '406',
                        'description' => '406',
                        'series' => []
                    ],
                    [
                        'name' => '504',
                        'slug' => '504',
                        'description' => '504',
                        'series' => []
                    ],
                    [
                        'name' => 'Boxer',
                        'slug' => 'boxer',
                        'description' => 'Boxer',
                        'series' => []
                    ]

                ]
            ],
            [
                'name' => 'PORSCHE',
                'slug' => 'porsche',
                'description' => 'PORSCHE',
                'models' => [
                    [
                        'name' => 'Cayenne',
                        'slug' => 'cayenne',
                        'description' => 'Cayenne',
                        'series' => []
                    ],
                    [
                        'name' => 'Macan',
                        'slug' => 'macan',
                        'description' => 'Macan',
                        'series' => []
                    ],
                    [
                        'name' => 'Panamira',
                        'slug' => 'panamira',
                        'description' => 'Panamira',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'RENAULT',
                'slug' => 'renault',
                'description' => 'RENAULT',
                'models' => [
                    [
                        'name' => 'Magane',
                        'slug' => 'magane',
                        'description' => 'Magane',
                        'series' => []
                    ],
                    [
                        'name' => 'Premium',
                        'slug' => 'premium',
                        'description' => 'Premium',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'ROLLS ROYCE',
                'slug' => 'rolls_royce',
                'description' => 'ROLLS ROYCE',
                'models' => [
                    [
                        'name' => 'Phantom',
                        'slug' => 'phantom',
                        'description' => 'Phantom',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'ROYAL',
                'slug' => 'royal',
                'description' => 'ROYAL',
                'models' => [
                    [
                        'name' => 'Enfield',
                        'slug' => 'enfield',
                        'description' => 'Enfield',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'SUBARU',
                'slug' => 'subaru',
                'description' => 'SUBARU',
                'image_name' => 'subaru.png',
                'models' => [
                    [
                        'name' => '1.8',
                        'slug' => '1.8',
                        'description' => '1.8',
                        'series' => []
                    ],
                    [
                        'name' => 'Dex',
                        'slug' => 'dex',
                        'description' => 'Dex',
                        'series' => []
                    ],
                    [
                        'name' => 'Exiga',
                        'slug' => 'exiga',
                        'description' => 'Exiga',
                        'series' => []
                    ],
                    [
                        'name' => 'Forester',
                        'slug' => 'forester',
                        'description' => 'Forester',
                        'series' => []
                    ],
                    [
                        'name' => 'Impreza',
                        'slug' => 'impreza',
                        'description' => 'Impreza',
                        'series' => []
                    ],
                    [
                        'name' => 'Legacy',
                        'slug' => 'legacy',
                        'description' => 'Legacy',
                        'series' => []
                    ],
                    [
                        'name' => 'Leon',
                        'slug' => 'leon',
                        'description' => 'Leon',
                        'series' => []
                    ],
                    [
                        'name' => 'Levory',
                        'slug' => 'levory',
                        'description' => 'Levory',
                        'series' => []
                    ],
                    [
                        'name' => 'Outback',
                        'slug' => 'outback',
                        'description' => 'Outback',
                        'series' => []
                    ],
                    [
                        'name' => 'Pleo',
                        'slug' => 'pleo',
                        'description' => 'Pleo',
                        'series' => []
                    ],
                    [
                        'name' => 'Stella',
                        'slug' => 'stella',
                        'description' => 'Stella',
                        'series' => []
                    ],
                    [
                        'name' => 'Trezia',
                        'slug' => 'trezia',
                        'description' => 'Trezia',
                        'series' => []
                    ],
                    [
                        'name' => 'WRX STI',
                        'slug' => 'wrx_sti',
                        'description' => 'WRX STI',
                        'series' => []
                    ],
                    [
                        'name' => 'UX',
                        'slug' => 'ux',
                        'description' => 'UX',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'SUZUKI',
                'slug' => 'suzuki',
                'description' => 'SUZUKI',
                'models' => [
                    [
                        'name' => 'Alto',
                        'slug' => 'alto',
                        'description' => 'Alto',
                        'series' => []
                    ],
                    [
                        'name' => 'Carry',
                        'slug' => 'carry',
                        'description' => 'Carry',
                        'series' => []
                    ],
                    [
                        'name' => 'Escudo',
                        'slug' => 'escudo',
                        'description' => 'Escudo',
                        'series' => []
                    ],
                    [
                        'name' => 'Every',
                        'slug' => 'every',
                        'description' => 'EVery',
                        'series' => []
                    ],
                    [
                        'name' => 'Grand',
                        'slug' => 'grand',
                        'description' => 'Grand',
                        'series' => []
                    ],
                    [
                        'name' => 'Grand Uitara',
                        'slug' => 'grand_uitara',
                        'description' => 'Grand Uitara',
                        'series' => []
                    ],
                    [
                        'name' => 'Landy',
                        'slug' => 'landy',
                        'description' => 'Landy',
                        'series' => []
                    ],
                    [
                        'name' => 'Lapin',
                        'slug' => 'lapin',
                        'description' => 'Lapin',
                        'series' => []
                    ],
                    [
                        'name' => 'Maruti',
                        'slug' => 'maruti',
                        'description' => 'Maruti',
                        'series' => []
                    ],
                    [
                        'name' => 'Maruti Omni',
                        'slug' => 'maruti_omni',
                        'description' => 'Maruti Omni',
                        'series' => []
                    ],
                    [
                        'name' => 'Sierra',
                        'slug' => 'sierra',
                        'description' => 'Sierra',
                        'series' => []
                    ],
                    [
                        'name' => 'Solio',
                        'slug' => 'solio',
                        'description' => 'Solio',
                        'series' => []
                    ],
                    [
                        'name' => 'SP',
                        'slug' => 'sp',
                        'description' => 'SP',
                        'series' => []
                    ],
                    [
                        'name' => 'Splash',
                        'slug' => 'splash',
                        'description' => 'Splash',
                        'series' => []
                    ],
                    [
                        'name' => 'Swift',
                        'slug' => 'swift',
                        'description' => 'Swift',
                        'series' => []
                    ],
                    [
                        'name' => 'SX',
                        'slug' => 'sx',
                        'description' => 'SX',
                        'series' => []
                    ],
                    [
                        'name' => 'VITARA',
                        'slug' => 'vitara',
                        'description' => 'VITARA',
                        'series' => []
                    ],
                    [
                        'name' => 'Wagon',
                        'slug' => 'wagon',
                        'description' => 'Wagon',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'SAAB',
                'slug' => 'saab',
                'description' => 'SAAB',
                'models' => [
                    [
                        'name' => '93',
                        'slug' => '93',
                        'description' => '93',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'SCANIA',
                'slug' => 'scania',
                'description' => 'SCANIA',
                'models' => [
                    [
                        'name' => '114C',
                        'slug' => '114c',
                        'description' => '114C',
                        'series' => []
                    ],
                    [
                        'name' => '94cP260',
                        'slug' => '94cp260',
                        'description' => '94cP260',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'SMART',
                'slug' => 'smart',
                'description' => 'SMART',
                'models' => [
                    [
                        'name' => 'For Two',
                        'slug' => 'for_two',
                        'description' => 'For Two',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'SONALIKA',
                'slug' => 'sonalika',
                'description' => 'SONALIKA',
                'models' => [
                    [
                        'name' => 'DI 90',
                        'slug' => 'di_90',
                        'description' => 'DI 90',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'TATA',
                'slug' => 'tata',
                'description' => 'TATA',
                'models' => [
                    [
                        'name' => '407',
                        'slug' => '407',
                        'description' => '407',
                        'series' => []
                    ],
                    [
                        'name' => 'Ace',
                        'slug' => 'ace',
                        'description' => 'Ace',
                        'series' => []
                    ],
                    [
                        'name' => 'Safari',
                        'slug' => 'safari',
                        'description' => 'Safari',
                        'series' => []
                    ],
                    [
                        'name' => 'Xeon',
                        'slug' => 'xeon',
                        'description' => 'Xeon',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'TOYOTA',
                'slug' => 'toyota',
                'description' => 'TOYOTA',
                'image_name' => 'toyota.png',
                'models' => [
                    [
                        'name' => '1000',
                        'slug' => '1000',
                        'description' => '1000',
                        'series' => []
                    ],
                    [
                        'name' => '4-Runner',
                        'slug' => '4_runner',
                        'description' => '4-Runner',
                        'series' => []
                    ],
                    [
                        'name' => 'Aliex',
                        'slug' => 'aliex',
                        'description' => 'Aliex',
                        'series' => []
                    ],
                    [
                        'name' => 'Allion',
                        'slug' => 'allion',
                        'description' => 'Allion',
                        'series' => []
                    ],
                    [
                        'name' => 'Alphard',
                        'slug' => 'alphard',
                        'description' => 'Alphard',
                        'series' => []
                    ],
                    [
                        'name' => 'Aqua',
                        'slug' => 'aqua',
                        'description' => 'Aqua',
                        'series' => []

                    ],
                    [
                        'name' => 'Aurion',
                        'slug' => 'aurion',
                        'description' => 'aurion',
                        'series' => []
                    ],
                    [
                        'name' => 'Auris',
                        'slug' => 'auris',
                        'description' => 'Auris',
                        'series' => []
                    ],
                    [
                        'name' => 'Avensis',
                        'slug' => 'avensis',
                        'description' => 'Avensis',
                        'series' => []
                    ],
                    [
                        'name' => 'Axio',
                        'slug' => 'axio',
                        'description' => 'Axio',
                        'series' => []
                    ],
                    [
                        'name' => 'Bb',
                        'slug' => 'bb',
                        'description' => 'Bb',
                        'series' => []
                    ],
                    [
                        'name' => 'Belta',
                        'slug' => 'belta',
                        'description' => 'Belta',
                        'series' => []
                    ],
                    [
                        'name' => 'C-HR',
                        'slug' => 'chr',
                        'description' => 'CHR',
                        'series' => []
                    ],
                    [
                        'name' => 'Caldina',
                        'slug' => 'caldina',
                        'description' => 'Caldina',
                        'series' => []
                    ],
                    [
                        'name' => 'Cami',
                        'slug' => 'cami',
                        'description' => 'Cami',
                        'series' => []
                    ],
                    [
                        'name' => 'Camry',
                        'slug' => 'camry',
                        'description' => 'Camry',
                        'series' => []
                    ],
                    [
                        'name' => 'Carib',
                        'slug' => 'carib',
                        'description' => 'Carib',
                        'series' => []
                    ],
                    [
                        'name' => 'Carina',
                        'slug' => 'carina',
                        'description' => 'Carina',
                        'series' => []
                    ],
                    [
                        'name' => 'Claser',
                        'slug' => 'claser',
                        'description' => 'Claser',
                        'series' => []
                    ],
                    [
                        'name' => 'Coaster',
                        'slug' => 'coaster',
                        'description' => 'Coaster',
                        'series' => []
                    ],
                    [
                        'name' => 'Corola',
                        'slug' => 'corola',
                        'description' => 'Corola',
                        'series' => []
                    ],
                    [
                        'name' => 'Corona',
                        'slug' => 'corona',
                        'description' => 'Corona',
                        'series' => []
                    ],
                    [
                        'name' => 'Corsa',
                        'slug' => 'corsa',
                        'description' => 'Corsa',
                        'series' => []
                    ],
                    [
                        'name' => 'Crown',
                        'slug' => 'crown',
                        'description' => 'Crown',
                        'series' => []
                    ],
                    [
                        'name' => 'Dyna',
                        'slug' => 'dyna',
                        'description' => 'Dyna',
                        'series' => []
                    ],
                    [
                        'name' => 'Estima',
                        'slug' => 'estima',
                        'description' => 'Estima',
                        'series' => []
                    ],
                    [
                        'name' => 'Fielder',
                        'slug' => 'fielder',
                        'description' => 'Fielder',
                        'series' => []
                    ],
                    [
                        'name' => 'FJ Cruiser',
                        'slug' => 'fj_cruiser',
                        'description' => 'FJ Cruiser',
                        'series' => []
                    ],
                    [
                        'name' => 'Fortuner',
                        'slug' => 'fortuner',
                        'description' => 'Fortuner',
                        'series' => []
                    ],
                    [
                        'name' => 'Fun Cargo',
                        'slug' => 'fun_cargo',
                        'description' => 'Fun Cargo',
                        'series' => []
                    ],
                    [
                        'name' => 'Gaia',
                        'slug' => 'gaia',
                        'description' => 'Gaia',
                        'series' => []
                    ],
                    [
                        'name' => 'Grand Hiace',
                        'slug' => 'grand_hiace',
                        'description' => 'Grand Hiace',
                        'series' => []
                    ],
                    [
                        'name' => 'Harrier',
                        'slug' => 'harrier',
                        'description' => 'Harrier',
                        'series' => []
                    ],
                    [
                        'name' => 'Hi Ace',
                        'slug' => 'hi_ace',
                        'description' => 'Hi Ace',
                        'series' => []
                    ],
                    [
                        'name' => 'Highlander',
                        'slug' => 'highlander',
                        'description' => 'highlander',
                        'series' => []
                    ],
                    [
                        'name' => 'Hilux',
                        'slug' => 'hilux',
                        'description' => 'Hilux',
                        'series' => []
                    ],
                    [
                        'name' => 'Ipsum',
                        'slug' => 'ipsum',
                        'description' => 'Ipsum',
                        'series' => []
                    ],
                    [
                        'name' => 'Iq',
                        'slug' => 'iq',
                        'description' => 'Iq',
                        'series' => []
                    ],
                    [
                        'name' => 'Isis',
                        'slug' => 'isis',
                        'description' => 'Isis',
                        'series' => []
                    ],
                    [
                        'name' => 'IST',
                        'slug' => 'ist',
                        'description' => 'IST',
                        'series' => []
                    ],
                    [
                        'name' => 'Kruger',
                        'slug' => 'kruger',
                        'description' => 'Kruger',
                        'series' => []
                    ],
                    [
                        'name' => 'Landcruiser',
                        'slug' => 'lundcruiser',
                        'description' => 'Landcruiser',
                        'series' => []
                    ],
                    [
                        'name' => 'Landcruiser Prado',
                        'slug' => 'landcruiser_prado',
                        'description' => 'Landcruiser Prado',
                        'series' => []
                    ],
                    [
                        'name' => 'Lexcen',
                        'slug' => 'lexcen',
                        'description' => 'Lexcen',
                        'series' => []
                    ],
                    [
                        'name' => 'Lite-Ace',
                        'slug' => 'lite_ace',
                        'description' => 'Lite-Ace',
                        'series' => []
                    ],
                    [
                        'name' => 'Mark ii',
                        'slug' => 'mark_ii',
                        'description' => 'Mark ii',
                        'series' => []
                    ],
                    [
                        'name' => 'Mark x',
                        'slug' => 'mark_x',
                        'description' => 'Mark x',
                        'series' => []
                    ],
                    [
                        'name' => 'Noah',
                        'slug' => 'noah',
                        'description' => 'Noah',
                        'series' => []
                    ],
                    [
                        'name' => 'Passo',
                        'slug' => 'passo',
                        'description' => 'Passo',
                        'series' => []
                    ],
                    [
                        'name' => 'Picnic',
                        'slug' => 'picnic',
                        'description' => 'Picnic',
                        'series' => []
                    ],
                    [
                        'name' => 'Platz',
                        'slug' => 'platz',
                        'description' => 'Platz',
                        'series' => []
                    ],
                    [
                        'name' => 'Porte',
                        'slug' => 'porte',
                        'description' => 'Porte',
                        'series' => []
                    ],
                    [
                        'name' => 'Premio',
                        'slug' => 'premio',
                        'description' => 'Premio',
                        'series' => []
                    ],
                    [
                        'name' => 'Rumion',
                        'slug' => 'rumion',
                        'description' => 'Rumion',
                        'series' => []
                    ],
                    [
                        'name' => 'Prius',
                        'slug' => 'prius',
                        'description' => 'Prius',
                        'series' => []
                    ],
                    [
                        'name' => 'Probox',
                        'slug' => 'probox',
                        'description' => 'Probox',
                        'series' => []
                    ],
                    [
                        'name' => 'Ractis',
                        'slug' => 'ractis',
                        'description' => 'Ractis',
                        'series' => []
                    ],
                    [
                        'name' => 'Raum',
                        'slug' => 'raum',
                        'description' => 'Raum',
                        'series' => []
                    ],
                    [
                        'name' => 'RAV4',
                        'slug' => 'rav4',
                        'description' => 'rav4',
                        'series' => []
                    ],
                    [
                        'name' => 'Regius van',
                        'slug' => 'regius_van',
                        'description' => 'Regius van',
                        'series' => []
                    ],
                    [
                        'name' => 'Run-X',
                        'slug' => 'run_x',
                        'description' => 'Run-X',
                        'series' => []
                    ],
                    [
                        'name' => 'Rush',
                        'slug' => 'rush',
                        'description' => 'Rush',
                        'series' => []
                    ],
                    [
                        'name' => 'Sai',
                        'slug' => 'sai',
                        'description' => 'Sai',
                        'series' => []
                    ],
                    [
                        'name' => 'Sienta',
                        'slug' => 'sienta',
                        'description' => 'Sienta',
                        'series' => []
                    ],
                    [
                        'name' => 'Spacio',
                        'slug' => 'spacio',
                        'description' => 'Spacio',
                        'series' => []
                    ],
                    [
                        'name' => 'Spade',
                        'slug' => 'spade',
                        'description' => 'Spade',
                        'series' => []
                    ],
                    [
                        'name' => 'Starlet',
                        'slug' => 'starlet',
                        'description' => 'Starlet',
                        'series' => []
                    ],
                    [
                        'name' => 'Succed',
                        'slug' => 'succed',
                        'description' => 'Succed',
                        'series' => []
                    ],
                    [
                        'name' => 'Surf',
                        'slug' => 'surf',
                        'description' => 'Surf',
                        'series' => []
                    ],
                    [
                        'name' => 'Townace',
                        'slug' => 'townace',
                        'description' => 'Townace',
                        'series' => []
                    ],
                    [
                        'name' => 'Toyoace',
                        'slug' => 'toyoace',
                        'description' => 'Toyoace',
                        'series' => []
                    ],
                    [
                        'name' => 'Vanguard',
                        'slug' => 'vanguard',
                        'description' => 'Vanguard',
                        'series' => []
                    ],
                    [
                        'name' => 'Vellfire',
                        'slug' => 'velfire',
                        'description' => 'Vellfire',
                        'series' => []
                    ],
                    [
                        'name' => 'Vits',
                        'slug' => 'vits',
                        'description' => 'Vits',
                        'series' => []
                    ],
                    [
                        'name' => 'Voxy',
                        'slug' => 'voxy',
                        'description' => 'Voxy',
                        'series' => []
                    ],
                    [
                        'name' => 'Wish',
                        'slug' => 'wish',
                        'description' => 'Wish',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'VOLKSWAGEN',
                'slug' => 'volkswagen',
                'description' => 'VOLKSWAGEN',
                'image_name' => 'volkswagen.png',
                'models' => [
                    [
                        'name' => 'Amarok',
                        'slug' => 'amarok',
                        'description' => 'Amarok',
                        'series' => []
                    ],
                    [
                        'name' => 'Beetle',
                        'slug' => 'beetle',
                        'description' => 'Beetle',
                        'series' => []
                    ],
                    [
                        'name' => 'CC',
                        'slug' => 'cc',
                        'description' => 'CC',
                        'series' => []
                    ],
                    [
                        'name' => 'Citi',
                        'slug' => 'citi',
                        'description' => 'Citi',
                        'series' => []
                    ],
                    [
                        'name' => 'Cross Polo',
                        'slug' => 'cross_polo',
                        'description' => 'Cross Polo',
                        'series' => []
                    ],
                    [
                        'name' => 'Cross Golf',
                        'slug' => 'cross_golf',
                        'description' => 'Cross Golf',
                        'series' => []
                    ],
                    [
                        'name' => 'Golf',
                        'slug' => 'golf',
                        'description' => 'Golf',
                        'series' => []
                    ],
                    [
                        'name' => 'Jetta',
                        'slug' => 'jetta',
                        'description' => 'Jetta',
                        'series' => []
                    ],
                    [
                        'name' => 'Passsat',
                        'slug' => 'passat',
                        'description' => 'Passat',
                        'series' => []
                    ],
                    [
                        'name' => 'Polo',
                        'slug' => 'polo',
                        'description' => 'Polo',
                        'series' => []
                    ],
                    [
                        'name' => 'Polo Hathback',
                        'slug' => 'polo_hathback',
                        'description' => 'Polo Hathback',
                        'series' => []
                    ],
                    [
                        'name' => 'Scirocco',
                        'slug' => 'scirocco',
                        'description' => 'Scirocco',
                        'series' => []
                    ],
                    [
                        'name' => 'Tiguan',
                        'slug' => 'tiguan',
                        'description' => 'Tiguan',
                        'series' => []
                    ],
                    [
                        'name' => 'Toureg',
                        'slug' => 'toureg',
                        'description' => 'Toureg',
                        'series' => []
                    ],
                    [
                        'name' => 'Touran',
                        'slug' => 'touran',
                        'description' => 'Touran',
                        'series' => []
                    ]
                ]
            ],
            [
                'name' => 'VOLVO',
                'slug' => 'volvo',
                'description' => 'VOLVO',
                'models' => [
                    [
                        'name' => '120',
                        'slug' => '120',
                        'description' => '120',
                        'series' => []
                    ],
                    [
                        'name' => '260',
                        'slug' => '260',
                        'description' => '260',
                        'series' => []
                    ],
                    [
                        'name' => '460',
                        'slug' => '460',
                        'description' => '460',
                        'series' => []
                    ],
                    [
                        'name' => 'S40',
                        'slug' => 's40',
                        'description' => 'S40',
                        'series' => []
                    ],
                    [
                        'name' => 'S60',
                        'slug' => 's60',
                        'description' => 'S60',
                        'series' => []
                    ],
                    [
                        'name' => 'S80',
                        'slug' => 's80',
                        'description' => 'S80',
                        'series' => []
                    ],
                    [
                        'name' => 'V49',
                        'slug' => 'v49',
                        'description' => 'V49',
                        'series' => []
                    ],
                    [
                        'name' => 'V50',
                        'slug' => 'v50',
                        'description' => 'V50',
                        'series' => []
                    ],
                    [
                        'name' => 'XC60',
                        'slug' => 'xc60',
                        'description' => 'XC60',
                        'series' => []
                    ],
                    [
                        'name' => 'XC90',
                        'slug' => 'xc90',
                        'description' => 'XC90',
                        'series' => []
                    ]
                ]
            ]
        ];


        foreach ($makes as $make){

            if(CarMake::where('slug', $make['slug'])->exists() == false){
                CarMake::create([
                    'name' => $make['name'],
                    'slug' => $make['slug'],
                    'image_name' => array_key_exists('image_name', $make) ? $make['image_name'] : null,
                    'description' => $make['description']
                ]);
            }else{

                $car_make_model = CarMake::where('slug', $make['slug'])->firstOrFail();

                $car_make_model->name = $make['name'];
                $car_make_model->slug = $make['slug'];
                $car_make_model->image_name = array_key_exists('image_name', $make) ? $make['image_name'] : null;
                $car_make_model->description = $make['description'];

                $car_make_model->save();

            }

            $car_make = CarMake::where('slug', $make['slug'])->firstOrFail();

            foreach ($make['models'] as $model){

                if(CarModel::where('slug', $model['slug'])
                        ->where('car_make_id', $car_make->id)
                        ->exists() == false){

                    $car_model = new CarModel();

                    $car_model->name = $model['name'];
                    $car_model->slug = $model['slug'];
                    $car_model->description = $model['description'];
                    $car_model->car_make_id = $car_make->id;

                    $car_model->save();
                }

                $car_model = CarModel::where('slug', $model['slug'])->firstOrFail();

                foreach ($model['series'] as $series){

                    if(CarSeries::where('slug', $series['slug'])
                            ->where('car_model_id', $car_model->id)
                            ->exists() == false){

                        $car_series = new CarSeries();

                        $car_series->name = $series['name'];
                        $car_series->slug = $series['slug'];
                        $car_series->description = $series['description'];
                        $car_series->car_model_id = $car_model->id;

                        $car_series->save();
                    }

                }
            }
        }
    }
}
