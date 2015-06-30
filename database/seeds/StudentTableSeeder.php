<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('students')->delete();
        \App\Student::truncate();

        $students = [
            [
                'name' => 'bonicel louis',
                'promotion' => 2017,
            ],
            [
                'name' => 'bonneau thomas',
                'promotion' => 2017,
            ],
            [
                'name' => 'boyer florian',
                'promotion' => 2017,
            ],
            [
                'name' => 'dalmasso loic',
                'promotion' => 2017,
            ],
            [
                'name' => 'desvignes nicolas',
                'promotion' => 2017,
            ],
            [
                'name' => 'galliano paul',
                'promotion' => 2017,
            ],
            [
                'name' => 'gouget romain',
                'promotion' => 2017,
            ],
            [
                'name' => 'heinrich guillaume',
                'promotion' => 2017,
            ],
            [
                'name' => 'joly vincent',
                'promotion' => 2017,
            ],
            [
                'name' => 'marnas victor',
                'promotion' => 2017,
            ],
            [
                'name' => 'monge remi',
                'promotion' => 2017,
            ],
            [
                'name' => 'morel gautier',
                'promotion' => 2017,
            ],
            [
                'name' => 'saury morgane',
                'promotion' => 2017,
            ],
            [
                'name' => 'vayssade thibault',
                'promotion' => 2017,
            ],
            [
                'name' => 'aubert estelle',
                'promotion' => 2016,
            ],
            [
                'name' => 'blanc dominique',
                'promotion' => 2016,
            ],
            [
                'name' => 'cazaux alexandre',
                'promotion' => 2016,
            ],
            [
                'name' => 'deneau guillaume',
                'promotion' => 2016,
            ],
            [
                'name' => 'gallego-martinez thomas',
                'promotion' => 2016,
            ],
            [
                'name' => 'gomez-pescie michel',
                'promotion' => 2016,
            ],
            [
                'name' => 'khlok antony',
                'promotion' => 2016,
            ],
            [
                'name' => 'lescaudron jeremy',
                'promotion' => 2016,
            ],
            [
                'name' => 'mirambet laurie',
                'promotion' => 2016,
            ],
            [
                'name' => 'olivero guillaume',
                'promotion' => 2016,
            ],
            [
                'name' => 'prin gaetan',
                'promotion' => 2016,
            ],
            [
                'name' => 'rabotin maximilien',
                'promotion' => 2016,
            ],
            [
                'name' => 'touze hugo',
                'promotion' => 2016,
            ],
            [
                'name' => 'vianey julien',
                'promotion' => 2016,
            ],
            [
                'name' => 'Abdallah Aiman',
                'promotion' => 2015,
            ],
            [
                'name' => 'Bernard Alex',
                'promotion' => 2015,
            ],
            [
                'name' => 'Boissin Bastien',
                'promotion' => 2015,
            ],
            [
                'name' => 'Faes Elie',
                'promotion' => 2015,
            ],
            [
                'name' => 'Ferrigno Frederic',
                'promotion' => 2015,
            ],
            [
                'name' => 'Lazareth Alexandre',
                'promotion' => 2015,
            ],
            [
                'name' => 'Petitjean Cedric',
                'promotion' => 2015,
            ],
            [
                'name' => 'Peyrouty Adrien',
                'promotion' => 2015,
            ],
            [
                'name' => 'Pomaret Benoit',
                'promotion' => 2015,
            ],
            [
                'name' => 'Ripoll Benjamin',
                'promotion' => 2015,
            ],
            [
                'name' => 'Sanchez Marvin',
                'promotion' => 2015,
            ],
            [
                'name' => 'Zaplotny Clement',
                'promotion' => 2015,
            ],
        ];

        $i = 0;

        foreach ($students as $student) {
            $student['name'] = ucwords($student['name']);
            $student['email'] =  strtolower(join('.', array_reverse(explode(' ', $student['name'])))) . '@polytech.univ-montp2.fr';
            $student['tag_id'] = ++$i;
            \App\Student::create($student);
        }
    }

}
