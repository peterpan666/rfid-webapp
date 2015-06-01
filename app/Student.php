<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    public function detections()
    {
        return $this->hasMany('App\Detection', 'tag_id', 'tag_id');
    }

}
