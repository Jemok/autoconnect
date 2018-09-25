<?php

namespace App\Console\Commands;

use App\CarMake;
use App\CarModel;
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
                'models' => [
                    [
                        'name' => 'A1',
                        'slug' => 'a1',
                        'description' => 'A1'
                    ],
                    [
                        'name' => 'A3',
                        'slug' => 'a3',
                        'description' => 'A3'
                    ],
                    [
                        'name' => 'A4',
                        'slug' => 'a4',
                        'description' => 'A4'
                    ],
                    [
                        'name' => 'A5',
                        'slug' => 'a5',
                        'description' => 'A5'
                    ],
                    [
                        'name' => 'A6',
                        'slug' => 'a6',
                        'description' => 'A6'
                    ],
                    [
                        'name' => 'Q5',
                        'slug' => 'q5',
                        'description' => 'Q5'
                    ],
                    [
                        'name' => 'Q7',
                        'slug' => 'q7',
                        'description' => 'Q7'
                    ],
                    [
                        'name' => 'TT',
                        'slug' => 'tt',
                        'description' => 'TT'
                    ]
                ]
            ],
            [
                'name' => 'ALFA ROMEO',
                'slug' => 'alfa_romeo',
                'description' => 'ALFA ROMEO',
                'models' => [
                    [
                        'name' => '147',
                        'slug' => '147',
                        'description' => '147'
                    ]
                ]
            ],
            [
                'name' => 'APRILIA',
                'slug' => 'aprilia',
                'description' => 'APRILIA',
                'models' => [
                    [
                        'name' => 'Dorsodoro',
                        'slug' => 'dorsodoro',
                        'description' => 'Dorsodoro'
                    ],
                    [
                        'name' => 'Tuono',
                        'slug' => 'tuono',
                        'description' => 'Tuono'
                    ]
                ]
            ],
            [
                'name' => 'AVELING BARFORD',
                'slug' => 'aveling_barford',
                'description' => 'AVELING BARFORD',
                'models' => [
                    [
                        'name' => 'Grader',
                        'slug' => 'grader',
                        'description' => 'Grader'
                    ]
                ]
            ],
            [
                'name' => 'BENTLEY',
                'slug' => 'bently',
                'description' => 'BENTLEY',
                'models' => [
                    [
                        'name' => 'Bentayga',
                        'slug' => 'bentayga',
                        'description' => 'Bentayga'
                    ]
                ]
            ],
            [
                'name' => 'BOBCAT',
                'slug' => 'bobcat',
                'description' => 'BOBCAT',
                'models' => [
                    [
                        'name' => 'T190',
                        'slug' => 't190',
                        'description' => 'T190'
                    ]
                ]
            ],
            [
                'name' => 'CADILLAC',
                'slug' => 'cadillac',
                'description' => 'CADILLAC',
                'models' => [
                    [
                        'name' => 'Escalade',
                        'slug' => 'escalade',
                        'description' => 'Escalade'
                    ]
                ]
            ],
            [
                'name' => 'CASE ii+',
                'slug' => 'case_ii+',
                'description' => 'CASE ii+',
                'models' => [
                    [
                        'name' => 'Skid Steel Loader',
                        'slug' => 'skid_steel_loader',
                        'description' => 'Skid Steel Loader'
                    ]
                ]
            ],
            [
                'name' => 'CHEVLORET',
                'slug' => 'chevloret',
                'description' => 'CHEVLORET',
                'models' => [
                    [
                        'name' => 'Captiva',
                        'slug' => 'captiva',
                        'description' => 'Captiva'
                    ],
                    [
                        'name' => 'Croze',
                        'slug' => 'croze',
                        'description' => 'Croze'
                    ],
                    [
                        'name' => 'Pick Up',
                        'slug' => 'pick_up',
                        'description' => 'Pick Up'
                    ],
                    [
                        'name' => 'Spark',
                        'slug' => 'spark',
                        'description' => 'Spark'
                    ]
                ]
            ],
            [
                'name' => 'CHRYSLER',
                'slug' => 'chrysler',
                'description' => 'CHRYSLER',
                'models' => [
                    [
                        'name' => '300c',
                        'slug' => '300c',
                        'description' => '300c'
                    ]
                ]
            ],
            [
                'name' => 'DAF',
                'slug' => 'daf',
                'description' => 'DAF',
                'models' => [
                    [
                        'name' => 'CF',
                        'slug' => 'cf',
                        'description' => 'CF'
                    ],
                    [
                        'name' => 'DF',
                        'slug' => 'df',
                        'description' => 'DF'
                    ]
                ]
            ],
            [
                'name' => 'DAIHATSU',
                'slug' => 'daihatsu',
                'description' => 'DAIHATSU',
                'models' => [
                    [
                        'name' => 'Bego',
                        'slug' => 'bego',
                        'description' => 'Bego'
                    ],
                    [
                        'name' => 'Boon',
                        'slug' => 'boon',
                        'description'=> 'Boon'
                    ],
                    [
                        'name' => 'Laminus',
                        'slug' => 'laminus',
                        'description' => 'Laminus'
                    ],
                    [
                        'name' => 'Mira',
                        'slug' => 'mira',
                        'description' => 'Mira'
                    ],
                    [
                        'name' => 'Move',
                        'slug' => 'move',
                        'description' => 'Move'
                    ],
                    [
                        'name' => 'Terios',
                        'slug' => 'terios',
                        'description' => 'Terios'
                    ]
                ]
            ],
            [
                'name' => 'DATSUN',
                'slug' => 'datsun',
                'description' => 'DATSUN',
                'models' => [
                    [
                        'name' =>  '1200',
                        'slug' => '1200',
                        'description' => '1200'
                    ],
                    [
                        'name' => 'GO',
                        'slug' => 'go',
                        'description' => 'GO'
                    ]
                ]
            ],
            [
                'name' => 'DOOSAN',
                'slug' => 'doosan',
                'description' => 'DOOSAN',
                'models' => [
                    [
                        'name' => 'Excavotor',
                        'slug' => 'excavotor',
                        'description' => 'Excavotor'
                    ]
                ]
            ],
            [
                'name' => 'DUCATI',
                'slug' => 'ducati',
                'description' => 'DUCATI',
                'models' => [
                    [
                        'name' => 'Monster',
                        'slug' => 'monster',
                        'description' => 'Monster'
                    ]
                ]
            ],
            [
                'name' => 'FAW',
                'slug' => 'faw',
                'description' => 'FAW',
                'models' => [
                    [
                        'name' => '5TON',
                        'slug' => '5ton',
                        'description' => '5TON'
                    ],
                    [
                        'name' => 'J5280',
                        'slug' => 'j5280',
                        'description' => 'J5280'
                    ]
                ]
            ],
            [
                'name' => 'FORD',
                'slug' => 'ford',
                'description' => 'FORD',
                'models' => [
                    [
                        'name' => '4600',
                        'slug' => '4600',
                        'description' => '4600'
                    ],
                    [
                        'name' => '5000',
                        'slug' => '5000',
                        'description' => '5000'
                    ],
                    [
                        'name' => '8210',
                        'slug' => '8210',
                        'description' => '8210'
                    ],
                    [
                        'name' => 'Escape',
                        'slug' => 'escape',
                        'description' => 'Escape'
                    ],
                    [
                        'name' => 'Escort',
                        'slug' => 'escort',
                        'description' => 'Escort'
                    ],
                    [
                        'name' => 'Everest',
                        'slug' => 'everest',
                        'description' => 'Everest'
                    ],
                    [
                        'name' => 'Focus',
                        'slug' => 'focus',
                        'description' => 'Focus'
                    ],
                    [
                        'name' => 'Kuga',
                        'slug' => 'kuga',
                        'description' => 'Kuga'
                    ],
                    [
                        'name' => 'Mondeo',
                        'slug' => 'mondeo',
                        'description' => 'Mondeo'
                    ],
                    [
                        'name' => 'Mustang',
                        'slug' => 'mustang',
                        'description' => 'Mustang'
                    ],
                    [
                        'name' => 'Ranger',
                        'slug' => 'ranger',
                        'description' => 'Ranger'
                    ]
                ]
            ],
            [
                'name' => 'FOTON',
                'slug' => 'fonton',
                'description' => 'FOTON',
                'models' => [

                ]
            ],
            [
                'name' => 'BMW',
                'slug' => 'bmw',
                'description' => 'BMW',
                'models' => [
                    [
                        'name' => 'I SERIES',
                        'slug' => 'i_series',
                        'description' => 'I SERIES'
                    ],
                    [
                        'name' => '116i',
                        'slug' => '116i',
                        'description' => '116i'
                    ],
                    [
                        'name' => '118i',
                        'slug' => '118i',
                        'description' => '118i'
                    ],
                    [
                        'name' => '120i',
                        'slug' => '120i',
                        'description' => '120i'
                    ],
                    [
                        'name' => '130i',
                        'slug' => '130i',
                        'description' => '130i'
                    ],
                    [
                        'name' => '2series',
                        'slug' => '2series',
                        'description' => '2series'
                    ],
                    [
                        'name' => '3series',
                        'slug' => '3series',
                        'description' => '3series'
                    ],
                    [
                        'name' => '3SERIES SEDAN',
                        'slug' => 's_series_sedan',
                        'description' => '3SERIES SEDAN'
                    ],
                    [
                        'name' => '318i',
                        'slug' => '318i',
                        'description' => '318i'
                    ],
                    [
                        'name' => '320i',
                        'slug' => '320i',
                        'description' => '320i'
                    ],
                    [
                        'name' => '323i',
                        'slug' => '323i',
                        'description' => '323i'
                    ],
                    [
                        'name' => '330i',
                        'slug' => '330i',
                        'description' => '330i'
                    ],
                    [
                        'name' => '335i',
                        'slug' => '335i',
                        'description' => '335i'
                    ],
                    [
                        'name' => '4SERIES',
                        'slug' => '4series',
                        'description' => '4series'
                    ],
                    [
                        'name' => '5SERIES',
                        'slug' => '5series',
                        'description' => '5series'
                    ],
                    [
                        'name' => '520i',
                        'slug' => '520i',
                        'description' => '5320i'
                    ],
                    [
                        'name' => '523i',
                        'slug' => '523i',
                        'description' => '523i'
                    ],
                    [
                        'name' => '525i',
                        'slug' => '525i',
                        'description' => '525i'
                    ],
                    [
                        'name' => '535i',
                        'slug' => '535i',
                        'description' => '535i'
                    ],
                    [
                        'name' => '6 Series',
                        'slug' => '6_series',
                        'description' => '6 Series',
                    ],
                    [
                        'name' => '7 Series',
                        'slug' => '7_series',
                        'description' => '7 Series'
                    ],
                    [
                        'name' => 'F800',
                        'slug' => 'f_800',
                        'description' => 'F800'
                    ],
                    [
                        'name' => 'M3',
                        'slug' => 'm3',
                        'description' => 'M3'
                    ],
                    [
                        'name' => 'Rseries',
                        'slug' => 'r_series',
                        'description' => 'Rseries'
                    ],
                    [
                        'name' => 'X1',
                        'slug' => 'x1',
                        'description' => 'X1'
                    ],
                    [
                        'name' => 'X3',
                        'slug' => 'x3',
                        'description' => 'X3'
                    ],
                    [
                        'name' => 'X5',
                        'slug' => 'x5',
                        'description' => 'X5'
                    ],
                    [
                        'name' => 'X6',
                        'slug' => 'x6',
                        'description' => 'X6'
                    ]
                ]
            ],
            [
                'name' => 'HALLEY DAVIDSON',
                'slug' => 'halley_davidson',
                'description' => 'HALLEY DAVIDSON',
                'models' => [
                    [
                        'name' => 'Electrica Glide',
                        'slug' => 'elecrica_glide',
                        'description' => 'Electrica Glide'
                    ],
                    [
                        'name' => 'SS',
                        'slug' => 'ss',
                        'description' => 'SS'
                    ],
                    [
                        'name' => 'Tour',
                        'slug' => 'tour',
                        'description' => 'Tour'
                    ],
                    [
                        'name' => 'XL',
                        'slug' => 'xl',
                        'description' => 'XL'
                    ]
                ]
            ],
            [
                'name' => 'HERO',
                'slug' => 'hero',
                'description' => 'HERO',
                'models' => [
                    [
                        'name' => 'HF Dawn',
                        'slug' => 'hf_dawn',
                        'description' => 'HF Dawn'
                    ]
                ]
            ],
            [
                'name' => 'HINO',
                'slug' => 'hino',
                'description' => 'HINO',
                'models' => [
                    [
                        'name' => 'Dutro',
                        'slug' => 'dutro',
                        'description' => 'Dutro'
                    ],
                    [
                        'name' => 'Hino',
                        'slug' => 'hino',
                        'description' => 'Hino'
                    ],
                    [
                        'name' => 'Ranger',
                        'slug' => 'ranger',
                        'description' => 'Ranger'
                    ],
                    [
                        'name' => 'Tipper',
                        'slug' => 'tipper',
                        'description' => 'Tipper'
                    ]
                ]
            ],
            [
                'name' => 'HITACHI',
                'slug' => 'hitachi',
                'description' => 'HITACHI',
                'models' => [
                    [
                        'name' => 'Earth Mover',
                        'slug' => 'earth_mover',
                        'description' => 'Earth Mover'
                    ]
                ]
            ],
            [
                'name' => 'HUMMER',
                'slug' => 'hummer',
                'description' => 'HUMMER',
                'models' => [
                    [
                        'name' => 'H3',
                        'slug' => 'h3',
                        'description' => 'H3'
                    ]
                ]
            ],
            [
                'name' => 'HYUNDAI',
                'slug'  => 'hyundai',
                'description' => 'HYUNDAI',
                'models' => [
                    [
                        'name' => 'Accenty',
                        'slug' => 'accenty',
                        'description' => 'Accenty'
                    ],
                    [
                        'name' => 'Santa fe',
                        'slug' => 'santa_fe',
                        'description' => 'Santa fe'
                    ]
                ]
            ],
            [
                'name' => 'HONDA',
                'slug' => 'honda',
                'description' => 'HONDA',
                'models' => [
                    [
                        'name' => '1300',
                        'slug' => '1300',
                        'description' => '1300'
                    ],
                    [
                        'name' => 'Accord',
                        'slug' => 'accord',
                        'description' => 'Accord'
                    ],
                    [
                        'name' => 'Airwave',
                        'slug' => 'airwave',
                        'description' => 'Airwave'
                    ],
                    [
                        'name' => 'Civic',
                        'slug' => 'civic',
                        'description' => 'Civic'
                    ],
                    [
                        'name' => 'CR-V',
                        'slug' => 'crv',
                        'description' => 'CR-V'
                    ],
                    [
                        'name' => 'CR-Z',
                        'slug' => 'crz',
                        'description' => 'CR-Z'
                    ],
                    [
                        'name' => 'Crossroad',
                        'slug' => 'crossroad',
                        'description' => 'Crossroad'
                    ],
                    [
                        'name' => 'Fit',
                        'slug' => 'fit',
                        'description' => 'Fit'
                    ],
                    [
                        'name' => 'Freed',
                        'slug' => 'freed',
                        'description' => 'Freed'
                    ],
                    [
                        'name' => 'HR-V',
                        'slug' => 'hrv',
                        'description' => 'HR-V'
                    ],
                    [
                        'name' => 'Insight',
                        'slug' => 'insight',
                        'description' => 'Insight'
                    ],
                    [
                        'name' => 'Inspire',
                        'slug' => 'inspire',
                        'description' => 'Inspire'
                    ],
                    [
                        'name' => 'Jade',
                        'slug' => 'jade',
                        'description' => 'Jade'
                    ],
                    [
                        'name' => 'N-Box',
                        'slug' => 'nbox',
                        'description' => 'N-Box'
                    ],
                    [
                        'name' => 'Odyssey',
                        'slug' => 'odyssey',
                        'description' => 'Odyssey'
                    ],
                    [
                        'name' => 'Shuttle',
                        'slug' => 'shuttle',
                        'description' => 'Shuttle'
                    ],
                    [
                        'name' => 'Spike',
                        'slug' => 'spike',
                        'description' =>'Spike'
                    ],
                    [
                        'name' => 'Stepwagon',
                        'slug' => 'stepwagon',
                        'description' =>  'Stepwagon'
                    ],
                    [
                        'name' => 'Stream',
                        'slug' => 'stream',
                        'description' => 'Stream'
                    ],
                    [
                        'name' => 'Vezel',
                        'slug' => 'vezel',
                        'description' => 'vezel'
                    ]
                ]
            ],
            [
                'name' => 'ISUZU',
                'slug' => 'isuzu',
                'description' => 'ISUZU',
                'models' => [
                    [
                        'name' => 'Como',
                        'slug' => 'como',
                        'description' => 'Como'
                    ],
                    [
                        'name' => 'D-MAX',
                        'slug' => 'dmax',
                        'description' => 'D-MAX'
                    ],
                    [
                        'name' => 'Direct',
                        'slug' => 'direct',
                        'description' => 'Direct'
                    ],
                    [
                        'name' => 'ELF Truck',
                        'slug' => 'elf_truck',
                        'description' => 'ELF Truck'
                    ],
                    [
                        'name' => 'FFR',
                        'slug' => 'ffr',
                        'description' => 'FFR'
                    ],
                    [
                        'name' => 'FSR',
                        'slug' => 'fsr',
                        'description' => 'FSR'
                    ],
                    [
                        'name' => 'FVR',
                        'slug' => 'fvr',
                        'description' => 'FVR'
                    ],
                    [
                        'name' => 'GIGA',
                        'slug' => 'giga',
                        'description' => 'GIGA'
                    ],
                    [
                        'name' => 'NKR',
                        'slug' => 'nkr',
                        'description' => 'NKR'
                    ],
                    [
                        'name' => 'NPR',
                        'slug' => 'npr',
                        'description' => 'NPR'
                    ],
                    [
                        'name' => 'NQR',
                        'slug' => 'nqr',
                        'description' => 'NQR'
                    ],
                    [
                        'name' => 'Rodeo',
                        'slug' => 'rodeo',
                        'description' => 'Rodeo'
                    ],
                    [
                        'name' => 'Tougher',
                        'slug' => 'tougher',
                        'description' => 'Tougher'
                    ],
                    [
                        'name' => 'Trooper',
                        'slug' => 'tropper',
                        'description' => 'Trooper'
                    ],
                    [
                        'name' => 'Wizard',
                        'slug' => 'wizard',
                        'description' => 'Wizard'
                    ]
                ]
            ],
            [
                'name' => 'INFINITI',
                'slug' => 'infiniti',
                'description' => 'INFINITI',
                'models' => [
                    [
                        'name' => 'QX80',
                        'slug' => 'qx80',
                        'description' => 'QX80'
                    ]
                ]
            ],
            [
                'name' => 'IVECO',
                'slug' => 'iveco',
                'description' => 'IVECO',
                'models' => [
                    [
                        'name' => 'Cusor',
                        'slug' => 'cusor',
                        'description' => 'Cusor'
                    ]
                ]
            ],
            [
                'name' => 'JAGUAR',
                'slug' => 'jaguar',
                'description' => 'JAGUAR',
                'models' => [
                    [
                        'name' => 'S-Type',
                        'slug' => 'stype',
                        'description' => 'S-Type'
                    ],
                    [
                        'name' => 'X-Type',
                        'slug' => 'xtype',
                        'description' => 'X-Type'
                    ],
                    [
                        'name' => 'Xe-25t',
                        'slug' => 'xe25t',
                        'description' => 'Xe-25t'
                    ],
                    [
                        'name' => 'XF',
                        'slug' => 'xf',
                        'description' => 'XF'
                    ],
                    [
                        'name' => 'XJ',
                        'slug' => 'xj',
                        'description' => 'XJ'
                    ]
                ]
            ],
            [
                'name' => 'JEEP',
                'slug' => 'jeep',
                'description' => 'JEEP',
                'models' => [
                    [
                        'name' => 'Cherokee',
                        'slug' => 'cherokee',
                        'description' => 'Cherokee'
                    ],
                    [
                        'name' => 'Compass',
                        'slug' => 'compass',
                        'description' => 'Compass'
                    ],
                    [
                        'name' => 'Grand Cherokee',
                        'slug' => 'grand_cherokee',
                        'description' => 'Grand Cherokee'
                    ],
                    [
                        'name' => 'Jeepster',
                        'slug' => 'jeepster',
                        'description' => 'Jeepster'
                    ],
                    [
                        'name' => 'Patriot',
                        'slug' => 'patriot',
                        'description' => 'Patriot'
                    ],
                    [
                        'name' => 'Wrangler',
                        'slug' => 'wrangler',
                        'description' => 'Wrangler'
                    ]
                ]
            ],
            [
                'name' => 'KAWASAKI',
                'slug' => 'kawasaki',
                'description' => 'KAWASAKI',
                'models' => [
                    [
                        'name' => 'GTR',
                        'slug' => 'gtr',
                        'description' => 'GTR'
                    ],
                    [
                        'name' => 'ZZR',
                        'slug' => 'zzr',
                        'description' => 'ZZR'
                    ]
                ]
            ],
            [
                'name' => 'KIA',
                'slug' => 'kia',
                'description' => 'KIA',
                'models' => [
                    [
                        'name' => 'Sorento',
                        'slug' => 'sorento',
                        'description' => 'Sorento'
                    ],
                    [
                        'name' => 'Sportage',
                        'slug' => 'sportage',
                        'description' => 'Sportage'
                    ]
                ]
            ],
            [
                'name' => 'LEYLAND',
                'slug' => 'leyland',
                'description' => 'LEYLAND',
                'models' => [
                    [
                        'name' => 'Ashok',
                        'slug' => 'ashok',
                        'description' => 'Ashok'
                    ]
                ]
            ],
            [
                'name' => 'LEXUS',
                'slug' => 'lexus',
                'description' => 'LEXUS',
                'models' => [
                    [
                        'name' => 'G70',
                        'slug' => 'g70',
                        'description' => 'G70'
                    ],
                    [
                        'name' => 'CT',
                        'slug' => 'ct',
                        'description' => 'CT'
                    ],
                    [
                        'name' => 'GS',
                        'slug' => 'gs',
                        'description' => 'GS'
                    ],
                    [
                        'name' => 'IS',
                        'slug' => 'is',
                        'description' => 'IS'
                    ],
                    [
                        'name' => 'LS',
                        'slug' => 'ls',
                        'description' => 'LS'
                    ],
                    [
                        'name' => 'LX',
                        'slug' => 'lx',
                        'description' => 'LX'
                    ],
                    [
                        'name' => 'NX',
                        'slug' => 'nx',
                        'description' => 'NX'
                    ]
                ]
            ],
            [
                'name' => 'LANDROVER',
                'slug' => 'landrover',
                'description' => 'LANDROVER',
                'models' => [
                    [
                        'name' => '88',
                        'slug' => '88',
                        'description' => '88'
                    ],
                    [
                        'name' => '88',
                        'slug' => '88',
                        'description' => '88'
                    ],
                    [
                        'name' => 'Defender',
                        'slug' => 'defender',
                        'description' => 'Defender'
                    ],
                    [
                        'name' => 'Defender110',
                        'slug' => 'defender110',
                        'description' => 'Defender110'
                    ],
                    [
                        'name' => 'Defender130',
                        'slug' => 'defender130',
                        'description' => 'Defender130'
                    ],
                    [
                        'name' => 'Discovery',
                        'slug' => 'discovery',
                        'description' => 'Discovery'
                    ],
                    [
                        'name' => 'Discovery 1',
                        'slug' => 'discovery_1',
                        'description' => 'Discovery 1'
                    ],
                    [
                        'name' => 'Discovery ii',
                        'slug' => 'discovery_ii',
                        'description' => 'discovery_iii'
                    ],
                    [
                        'name' => 'Discovery iv',
                        'slug' => 'discovery_iv',
                        'description' => 'Discovery iv'
                    ],
                    [
                        'name' => 'Freelancer',
                        'slug' => 'freelancer',
                        'description' => 'Freelancer'
                    ],
                    [
                        'name' => 'RangeRover',
                        'slug' => 'rangerover',
                        'description' => 'RangeRover'
                    ],
                    [
                        'name' => 'RangeRover Evoques',
                        'slug' => 'rangerover_evoques',
                        'description' => 'RangeRover Sport',
                    ],
                    [
                        'name' => 'RangeRover Vogue',
                        'slug' => 'rangerover_vogue',
                        'description' => 'RangeRover Vogue'
                    ]
                ]
            ],
            [
                'name' => 'MAN',
                'slug' => 'man',
                'description' => 'MAN',
                'models' => [
                    [
                        'name' => 'TGM',
                        'slug' => 'tgm',
                        'description' => 'TGM'
                    ],
                    [
                        'name' => 'TGS',
                        'slug' => 'tgs',
                        'description' => 'TGS'
                    ],
                    [
                        'name' => 'TGX',
                        'slug' => 'tgx',
                        'description' => 'TGX'
                    ]
                ]
            ],
            [
                'name' => 'MINI',
                'slug' => 'mini',
                'description' => 'MINI',
                'models' => [
                    [
                        'name' => 'Cooper',
                        'slug' => 'cooper',
                        'description' => 'Cooper'
                    ]
                ]
            ],
            [
                'name' => 'MITSUHIBSHI',
                'slug' => 'mitsubishi',
                'description' => 'MITSUHIBSHI',
                'models' => [
                    [
                        'name' => 'Canter',
                        'slug' => 'canter',
                        'description' => 'Canter'
                    ],
                    [
                        'name' => 'Colt',
                        'slug' => 'colt',
                        'description' => 'Colt'
                    ],
                    [
                        'name' => 'Delica',
                        'slug' => 'delica',
                        'description' => 'Delica'
                    ],
                    [
                        'name' => 'Fit',
                        'slug' => 'fit',
                        'description' => 'Fit'
                    ],
                    [
                        'name' => 'Fighter',
                        'slug' => 'fighter',
                        'description' => 'Fighter'
                    ],
                    [
                        'name' => 'Fuso Fighter',
                        'slug' => 'fuso_fighter',
                        'description' => 'Fuso Fighter'
                    ],
                    [
                        'name' => 'Galant',
                        'slug' => 'galant',
                        'description' => 'Galant'
                    ],
                    [
                        'name' => 'Grandis',
                        'slug' => 'grandis',
                        'description' => 'Grandis'
                    ],
                    [
                        'name' => 'L200',
                        'slug' => 'l200',
                        'description' => 'L200'
                    ],
                    [
                        'name' => 'Lancer',
                        'slug' => 'lancer',
                        'description' => 'Lancer'
                    ],
                    [
                        'name' => 'Lancer-Cedia',
                        'slug' => 'lancer_cedia',
                        'description' => 'Lancer-Cedia'
                    ],
                    [
                        'name' => 'Lancer Evo',
                        'slug' => 'lancer_evo',
                        'description' => 'Lancer Evo'
                    ],
                    [
                        'name' => 'Minicab',
                        'slug' => 'minicab',
                        'description' => 'Minicab'
                    ],
                    [
                        'name' => 'Mirage',
                        'slug' => 'mirage',
                        'description' => 'Mirage'
                    ],
                    [
                        'name' => 'Outlander',
                        'slug' => 'outlander',
                        'description' => 'Outlander'
                    ],
                    [
                        'name' => 'Pajero',
                        'slug' => 'pajero',
                        'description' => 'Pajero'
                    ],
                    [
                        'name' => 'Pajero 10',
                        'slug' => 'pajero_10',
                        'description' => 'Pajero 10'
                    ],
                    [
                        'name' => 'Pajero Mini',
                        'slug' => 'pajero_mini',
                        'description' => 'Pajero Mini'
                    ],
                    [
                        'name' => 'Rosa',
                        'slug' => 'rosa',
                        'description' => 'Rosa'
                    ],
                    [
                        'name' => 'RVR',
                        'slug' => 'rvr',
                        'description' => 'RVR'
                    ],
                    [
                        'name' => 'Shogon',
                        'slug' => 'shogon',
                        'description' => 'Shogon'
                    ]
                ]
            ],
            [
                'name' => 'MERCEDES BENZ',
                'slug' => 'mercedes_benz',
                'description' => 'MERCEDES BENZ',
                'models' => [
                    [
                        'name' => 'C Coupe',
                        'slug' => 'c_coupe',
                        'description' =>'C Coupe'
                    ],
                    [
                        'name' => '190E',
                        'slug' => '190e',
                        'description' => '190e'
                    ],
                    [
                        'name' => '200',
                        'slug' => '200',
                        'description' => '200'
                    ],
                    [
                        'name' => '200E',
                        'slug' => '200e',
                        'description' => '200E'
                    ],
                    [
                        'name' => '911',
                        'slug' => '911',
                        'description' => '911'
                    ],
                    [
                        'name' => 'A-Class',
                        'slug' => 'a_class',
                        'description' => 'A-Class'
                    ],
                    [
                        'name' => 'A180',
                        'slug' => 'a180',
                        'description' => 'A180'
                    ],
                    [
                        'name' => 'Actros',
                        'slug' => 'actros',
                        'description' => 'Actros'
                    ],
                    [
                        'name' => 'AMG C43',
                        'slug' => 'amg_c43',
                        'description' => 'AMG C43'
                    ],
                    [
                        'name' => 'Axor',
                        'slug' => 'axor',
                        'description' => 'Axor'
                    ],
                    [
                        'name' => 'B-Class',
                        'slug' => 'b_class',
                        'description' => 'B-Class'
                    ],
                    [
                        'name' => 'B180',
                        'slug' => 'b180',
                        'description' => 'B180'
                    ],
                    [
                        'name' => 'C180',
                        'slug' => 'c180',
                        'description' => 'C180'
                    ],
                    [
                        'name' => 'C200',
                        'slug' => 'c200',
                        'description' => 'C200'
                    ],
                    [
                        'name' => 'C230',
                        'slug' => 'c230',
                        'description' => 'C230'
                    ],
                    [
                        'name' => 'C240',
                        'slug' => 'c240',
                        'description' => 'C240'
                    ],
                    [
                        'name' => 'C250',
                        'slug' => 'c250',
                        'description' => 'C250'
                    ],
                    [
                        'name' => 'C63',
                        'slug' => 'c63',
                        'description' => 'C63'
                    ],
                    [
                        'name' => 'CLA-Class',
                        'slug' => 'cla_class',
                        'description' => 'CLA-Class'
                    ],
                    [
                        'name' => 'CLS',
                        'slug' => 'cls',
                        'description' => 'CLS'
                    ],
                    [
                        'name' => 'E-Class',
                        'slug' => 'e_class',
                        'description' => 'E-Class'
                    ],
                    [
                        'name' => 'E-200',
                        'slug' => 'e_200',
                        'description' => 'E-200'
                    ],
                    [
                        'name' => 'E-220',
                        'slug' => 'e220',
                        'description' => 'E-220'
                    ],
                    [
                        'name' => 'E-230',
                        'slug' => 'e_230',
                        'description' => 'E-230'
                    ],
                    [
                        'name' => 'E240',
                        'slug' => 'e240',
                        'description' => 'E240'
                    ],
                    [
                        'name' => 'E250',
                        'slug' => 'e250',
                        'description' => 'E250'
                    ],
                    [
                        'name' => 'E300',
                        'slug' => 'e300',
                        'description' => 'E300'
                    ],
                    [
                        'name' => 'E320',
                        'slug' => 'e320',
                        'description' => 'E320'
                    ],
                    [
                        'name' => 'E350',
                        'slug' => 'e350',
                        'description' => 'E350'
                    ],
                    [
                        'name' => 'E500',
                        'slug' => 'e500',
                        'description' => 'E500'
                    ],
                    [
                        'name' => 'GLA',
                        'slug' => 'gla',
                        'description' => 'GLA'
                    ],
                    [
                        'name' => 'GLE',
                        'slug' => 'gle',
                        'description' => 'GLE'
                    ],
                    [
                        'name' => 'M-Class',
                        'slug' => 'm_class',
                        'description' => 'M-Class'
                    ],
                    [
                        'name' => 'ML250',
                        'slug' => 'ml250',
                        'description' => 'ML250'
                    ],
                    [
                        'name' => 'ML320',
                        'slug' => 'ml320',
                        'description' => 'ML320'
                    ],
                    [
                        'name' => 'ML350',
                        'slug' => 'ml350',
                        'description' => 'ML350'
                    ],
                    [
                        'name' => 'S-Class',
                        'slug' => 's_class',
                        'description' => 'S-Class'
                    ],
                    [
                        'name' => 'S350',
                        'slug' => 's350',
                        'description' => 'S350'
                    ],
                    [
                        'name' => 'S550',
                        'slug' => 's550',
                        'description' => 'S550'
                    ],
                    [
                        'name' => 'SL',
                        'slug' => 'sl',
                        'description' => 'SL'
                    ],
                    [
                        'name' => 'SLK-Class',
                        'slug' => 'slk_class',
                        'description' => 'SLK-Class'
                    ],
                    [
                        'name' => 'Spinter',
                        'slug' => 'spinter',
                        'description' => 'Spinter'
                    ],
                    [
                        'name' => '2',
                        'slug' => '2',
                        'description' => '2'
                    ],
                    [
                        'name' => '3',
                        'slug' => '3',
                        'description' => '3'
                    ],
                    [
                        'name' => 'Atenza',
                        'slug' => 'atenza',
                        'description' => 'Atenza'
                    ],
                    [
                        'name' => 'Alexa',
                        'slug' => 'alexa',
                        'description' => 'Alexa'
                    ],
                    [
                        'name' => 'AZ',
                        'slug' => 'az',
                        'description' => 'AZ'
                    ],
                    [
                        'name' => 'Biante',
                        'slug' => 'biante',
                        'description' => 'Biante'
                    ],
                    [
                        'name' => 'Bongo',
                        'slug' => 'bongo',
                        'description' => 'Bongo'
                    ],
                    [
                        'name' => 'Carol',
                        'slug' => 'carol',
                        'description' => 'Carol'
                    ],
                    [
                        'name' => 'CX-3',
                        'slug' => 'cx3',
                        'description' => 'CX-3'
                    ],
                    [
                        'name' => 'CX-5',
                        'slug' => 'cx5',
                        'description' => 'CX-5'
                    ],
                    [
                        'name' => 'CX-7',
                        'slug' => 'cx7',
                        'description' => 'CX-7'
                    ],
                    [
                        'name' => 'Demio',
                        'slug' => 'demio',
                        'description' => 'Demio'
                    ],
                    [
                        'name' => 'Familia',
                        'slug' => 'familia',
                        'description' => 'Familia'
                    ],
                    [
                        'name' => 'MPV',
                        'slug' => 'mpv',
                        'description' => 'MPV'
                    ],
                    [
                        'name' => 'Premacy',
                        'slug' => 'premacy',
                        'description' => 'Premacy'
                    ],
                    [
                        'name' => 'Scrum',
                        'slug' => 'scrum',
                        'description' => 'Scrum'
                    ],
                    [
                        'name' => 'Titan Dash',
                        'slug' => 'titan_dash',
                        'description' => 'Titan Dash'
                    ],
                    [
                        'name' => 'Tribute',
                        'slug' => 'tribute',
                        'description' => 'Tribute'
                    ],
                    [
                        'name' => 'Verosa',
                        'slug' => 'verosa',
                        'description' => 'Verosa'
                    ]
                ]
            ],
            [
                'name' => 'NISSAN',
                'slug' => 'nissan',
                'description' => 'NISSAN',
                'models' => [
                    [
                        'name' => '100',
                        'slug' => '100',
                        'description' => '100'

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
                        'description' => 'Advan'
                    ],
                    [
                        'name' => 'Atlas',
                        'slug' => 'atlas',
                        'description' => 'Atlas'
                    ],
                    [
                        'name' => 'Blue Bird',
                        'slug' => 'blue_bird',
                        'description' => 'Blue Bird'
                    ],
                    [
                        'name' => 'Caravan',
                        'slug' => 'caravan',
                        'description' => 'Caravan'
                    ],
                    [
                        'name' => 'Carina',
                        'slug' => 'carina',
                        'description' => 'Carina'
                    ],
                    [
                        'name' => 'Civilian',
                        'slug' => 'civilian',
                        'description' => 'Civilian'
                    ],
                    [
                        'name' => 'Clipper',
                        'slug' => 'clipper',
                        'description' => 'Clipper'
                    ],
                    [
                        'name' => 'Cube',
                        'slug' => 'cube',
                        'description' => 'Cube'
                    ],
                    [
                        'name' => 'Datsun',
                        'slug' => 'datsun',
                        'description' => 'Datsun'
                    ],
                    [
                        'name' => 'Dualis',
                        'slug' => 'dualis',
                        'description' => 'Dualis'
                    ],
                    [
                        'name' => 'Elgrand',
                        'slug' => 'elgrand',
                        'description' => 'Elgrand'
                    ],
                    [
                        'name' => 'Fairlady',
                        'slug' => 'fairlady',
                        'description' => 'Fairlady'
                    ],
                    [
                        'name' => 'FB15',
                        'slug' => 'fb15',
                        'description' => 'FB15'
                    ],
                    [
                        'name' => 'Fuga',
                        'slug' => 'fuga',
                        'description' => 'Fuga'
                    ],
                    [
                        'name' => 'Hardbody',
                        'slug' => 'hardbody',
                        'description' => 'Hardbody'
                    ],
                    [
                        'name' => 'Homy',
                        'slug' => 'homy',
                        'description' => 'Homy'
                    ],
                    [
                        'name' => 'Interstar',
                        'slug' => 'interstar',
                        'description' => 'Interstar'
                    ],
                    [
                        'name' => 'Juke',
                        'slug' => 'juke',
                        'description' => 'Juke'
                    ],
                    [
                        'name' => 'KIX',
                        'slug' => 'kix',
                        'description' => 'KIX'
                    ],
                    [
                        'name' => 'Lafesta',
                        'slug' => 'lafesta',
                        'description' => 'Lafesta'
                    ],
                    [
                        'name' => 'Latio',
                        'slug' => 'latio',
                        'description' => 'Latio'
                    ],
                    [
                        'name' => 'Leaf',
                        'slug' => 'leaf',
                        'description' => 'Leaf'
                    ],
                    [
                        'name' => 'Maral',
                        'slug' => 'maral',
                        'description' => 'Maral'
                    ],
                    [
                        'name' => 'Maxima',
                        'slug' => 'maxima',
                        'description' => 'Maxima'
                    ],
                    [
                        'name' => 'Moco',
                        'slug' => 'moco',
                        'description' => 'Moco'
                    ],
                    [
                        'name' => 'Murano',
                        'slug' => 'murano',
                        'description' => 'Murano'
                    ],
                    [
                        'name' => 'Navara',
                        'slug' => 'navara',
                        'description' => 'Navara'
                    ],
                    [
                        'name' => 'Note',
                        'slug' => 'note',
                        'description' => 'Note'
                    ],
                    [
                        'name' => 'NP200',
                        'slug' => 'np200',
                        'description' => 'NP200'
                    ],
                    [
                        'name' => 'NP300',
                        'slug' => 'np300',
                        'description' => 'NP300'
                    ],
                    [
                        'name' => 'NV200',
                        'slug' => 'nv200',
                        'description' => 'NV200'
                    ],
                    [
                        'name' => 'NV3500',
                        'slug' => 'nv3500',
                        'description' => 'NV3500'
                    ],
                    [
                        'name' => 'Otti',
                        'slug' => 'otti',
                        'description' => 'Otti'
                    ],
                    [
                        'name' => 'Pathfiner',
                        'slug' => 'pathfiner',
                        'description' => 'Pathfiner'
                    ],
                    [
                        'name' => 'Patrol',
                        'slug' => 'patrol',
                        'description' => 'Patrol'
                    ],
                    [
                        'name' => 'Pickup',
                        'slug' => 'pickup',
                        'description' => 'Pickup'
                    ],
                    [
                        'name' => 'Pino',
                        'slug' => 'pino',
                        'description' => 'Pino'
                    ],
                    [
                        'name' => 'Primera',
                        'slug' => 'primera',
                        'description' => 'Primera'
                    ],
                    [
                        'name' => 'Qashqai',
                        'slug' => 'qashqai',
                        'description' => 'Qashqai'
                    ],
                    [
                        'name' => 'Teana',
                        'slug' => 'teana',
                        'description' => 'Teana'
                    ],
                    [
                        'name' => 'TIIDA',
                        'slug' => 'tiida',
                        'description' => 'TIIDA'
                    ],
                    [
                        'name' => 'UD',
                        'slug' => 'ud',
                        'description' => 'UD'
                    ],
                    [
                        'name' => 'Uruan',
                        'slug' => 'uruan',
                        'description' => 'Uruan'
                    ],
                    [
                        'name' => 'Vanette',
                        'slug' => 'vanette',
                        'description' => 'Vanette'
                    ],
                    [
                        'name' => 'Wingroad',
                        'slug' => 'wingroad',
                        'description' => 'Wingroad'
                    ],
                    [
                        'name' => 'X-Trail',
                        'slug' => 'x_trail',
                        'description' => 'X-Trail'
                    ]
                ]
            ],
            [
                'name' => 'PEUGEOT',
                'slug' => 'peugeot',
                'description' => 'PEUGEOT',
                'models' => [

                ]
            ],
            [
                'name' => 'PORSCHE',
                'slug' => 'porsche',
                'description' => 'PORSCHE',
                'models' => [

                ]
            ],
            [
                'name' => 'RENAULT',
                'slug' => 'renault',
                'description' => 'RENAULT',
                'models' => [

                ]
            ],
            [
                'name' => 'ROLLS ROYCE',
                'slug' => 'rolls_royce',
                'description' => 'ROLLS ROYCE',
                'models' => [

                ]
            ],
            [
                'name' => 'ROYAL',
                'slug' => 'royal',
                'description' => 'ROYAL',
                'models' => [

                ]
            ],
            [
                'name' => 'SUBARU',
                'slug' => 'subaru',
                'description' => 'SUBARU',
                'models' => [

                ]
            ],
            [
                'name' => 'SUZUKI',
                'slug' => 'suzuki',
                'description' => 'SUZUKI',
                'models' => [

                ]
            ],
            [
                'name' => 'SAAB',
                'slug' => 'saab',
                'description' => 'SAAB',
                'models' => [

                ]
            ],
            [
                'name' => 'SCANIA',
                'slug' => 'scania',
                'description' => 'SCANIA',
                'models' => [

                ]
            ],
            [
                'name' => 'SMART',
                'slug' => 'smart',
                'description' => 'SMART',
                'models' => [

                ]
            ],
            [
                'name' => 'SONALIKA',
                'slug' => 'sonalika',
                'description' => 'SONALIKA',
                'models' => [

                ]
            ],
            [
                'name' => 'TATA',
                'slug' => 'tata',
                'description' => 'TATA',
                'models' => [

                ]
            ],
            [
                'name' => 'TOYOTA',
                'slug' => 'toyota',
                'description' => 'TOYOTA',
                'models' => [

                ]
            ],
            [
                'name' => 'VOLKSWAGEN',
                'slug' => 'volkswagen',
                'description' => 'VOLKSWAGEN',
                'models' => [

                ]
            ],
            [
                'name' => 'VOLVO',
                'slug' => 'volvo',
                'description' => 'VOLVO',
                'models' => [

                ]
            ]
        ];


        foreach ($makes as $make){

            if(CarMake::where('slug', $make['slug'])->exists() == false){
                CarMake::create([
                    'name' => $make['name'],
                    'slug' => $make['slug'],
                    'description' => $make['description']
                ]);
            }

            $car_make = CarMake::where('slug', $make['slug'])->firstOrFail();

            foreach ($make['models'] as $model){

                if(CarModel::where('slug', $model['slug'])->exists() == false){

                    $car_model = new CarModel();

                    $car_model->name = $model['name'];
                    $car_model->slug = $model['slug'];
                    $car_model->description = $model['description'];
                    $car_model->car_make_id = $car_make->id;

                    $car_model->save();
                }
            }
        }
    }
}
