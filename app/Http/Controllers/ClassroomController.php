<?php namespace App\Http\Controllers;

use App\Detection;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ClassroomController extends Controller {

	public function store(Request $request)
    {
        \Debugbar::disable();

        foreach ($request->tag_id as $tag_id) {
            $detection = new Detection;
            $detection->tag_id = $tag_id;
            $detection->room = $request->room;
            $detection->created_at = Carbon::now();
            $detection->save();
        }

        return $request;
    }

}
