<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detection extends Model {

    public $timestamps = false;

	public function student()
    {
        return $this->belongsTo('App\Student', 'tag_id', 'tag_id');
    }

}
