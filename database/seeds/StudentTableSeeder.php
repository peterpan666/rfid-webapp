<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('students')->delete();
        \App\Student::truncate();

        $students = [
            [
                'name' => 'Faes Elie',
                'promotion' => 2015,
            ],
            [
                'name' => 'Peyrouty Adrien',
                'promotion' => 2015,
            ],
            [
                'name' => 'Boissin Bastien',
                'promotion' => 2015,
            ],
            [
                'name' => 'Cazaux Alexandre',
                'promotion' => 2016,
            ],
            [
                'name' => 'Mirambet Laurie',
                'promotion' => 2016,
            ],
        ];

        $i = 0;

        foreach ($students as $student) {
            $student['email'] =  strtolower(join('.', array_reverse(explode(' ', $student['name'])))) . '@polytech.univ-montp2.fr';
            $student['tag_id'] = ++$i;
            \App\Student::create($student);
        }
    }

}
