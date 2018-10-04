<?php

namespace App\Console\Commands;

use App\Area;
use Illuminate\Console\Command;

class AddAreasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'areas:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds areas';

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
        $counties = [
            [
                'name' => 'BARINGO',
                'code' => 30
            ],
            [
                'name' => 'BOMET',
                'code' => 36
            ],
            [
                'name' => 'BUNGOMA',
                'code' => 39
            ],
            [
                'name' => 'BUSIA',
                'code' => 40
            ],
            [
                'name' => 'ELGEYO/MARAKWET',
                'code' => 28
            ],
            [
                'name' => 'EMBU',
                'code' => 14
            ],
            [
                'name' => 'GARISSA',
                'code' => 7
            ],
            [
                'name' => 'HOMA BAY',
                'code' => 43
            ],
            [
                'name' => 'ISIOLO',
                'code' => 11
            ],
            [
                'name' => 'KAJIADO',
                'code' => 34
            ],
            [
                'name' => 'KAKAMEGA',
                'code' => 37
            ],
            [
                'name' => 'KERICHO',
                'code' => 35
            ],
            [
                'name' => 'KIAMBU',
                'code' => 22
            ],
            [
                'name' => 'KILIFI',
                'code' => 3
            ],
            [
                'name' => 'KIRINYAGA',
                'code' => 20
            ],
            [
                'name' => 'KISII',
                'code' => 45
            ],
            [
                'name' => 'KISUMU',
                'code' => 42
            ],
            [
                'name' => 'KITUI',
                'code' => 15
            ],
            [
                'name' => 'KWALE',
                'code' => 2
            ],
            [
                'name' => 'LAIKIPIA',
                'code' => 31
            ],
            [
                'name' => 'LAMU',
                'code' => 5
            ],
            [
                'name' => 'MACHAKOS',
                'code' => 16
            ],
            [
                'name' => 'MAKUENI',
                'code' => 17
            ],
            [
                'name' => 'MANDERA',
                'code' => 9
            ],
            [
                'name' => 'MARSABIT',
                'code' => 10
            ],
            [
                'name' => 'MERU',
                'code' => 12
            ],
            [
                'name' => 'MIGORI',
                'code' => 44
            ],
            [
                'name' => 'MOMBASA',
                'code' => 1
            ],
            [
                'name' => 'MURANG\'A',
                'code' => 21
            ],
            [
                'name' => 'NAIROBI CITY',
                'code' => 47
            ],
            [
                'name' => 'NAKURU',
                'code' => 32
            ],
            [
                'name' => 'NANDI',
                'code' => 29
            ],
            [
                'name' => 'NAROK',
                'code' => 33
            ],
            [
                'name' => 'NYAMIRA',
                'code' => 46
            ],
            [
                'name' => 'NYANDARUA',
                'code' => 18
            ],
            [
                'name' => 'NYERI',
                'code' => 19
            ],
            [
                'name' => 'SAMBURU',
                'code' => 25
            ],
            [
                'name' => 'SIAYA',
                'code' => 41
            ],
            [
                'name' => 'TAITA TAVETA',
                'code' => 6
            ],
            [
                'name' => 'TANA RIVER',
                'code' => 4
            ],
            [
                'name' => 'THARAKA - NITHI',
                'code' => 13
            ],
            [
                'name' => 'TRANS NZOIA',
                'code' => 26
            ],
            [
                'name' => 'TURKANA',
                'code' => 23
            ],
            [
                'name' => 'UASIN GISHU',
                'code' => 27
            ],
            [
                'name' => 'VIHIGA',
                'code' => 38
            ],
            [
                'name' => 'WAJIR',
                'code' => 8
            ],
            [
                'name' => 'WEST POKOT',
                'code' => 24
            ],
        ];

        foreach ($counties as $county){
            if(Area::where('code', $county['code'])->exists() == false){
                Area::create([
                    'name' => $county['name'],
                    'code' => $county['code']
                ]);
            }
        }
    }
}
