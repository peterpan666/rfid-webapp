<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateStudentRequest;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;

class StudentsController extends Controller {
    /**
     * @var Student
     */
    private $student;
    /**
     * @var Input
     */
    private $input;

    /**
     * Create a new controller instance.
     * @param Student $student
     * @param Input $input
     */
    public function __construct(Student $student, Input $input)
    {
        $this->middleware('auth');
        $this->student = $student;
        $this->input = $input;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        $date = $request->has('date') ? Carbon::createFromFormat('d-m-Y', $request->get('date')) : Carbon::now();

        $promotions = $this->student
            ->distinct()
            ->orderBy('promotion', 'DESC')
            ->get(['promotion']);

        $activePromotion = $this->input->get('promotion', $promotions->first()->promotion);

        $students = $this->student
            ->with(['detections' => function($query) use ($date) {
                $start = $date->startOfDay()->toDateTimeString();
                $stop = $date->endOfDay()->toDateTimeString();

                $query->whereBetween('created_at', [$start, $stop])->orderBy('created_at', 'desc');
            }])->where('promotion', '=', $activePromotion)
            ->orderBy('name')
            ->get();

		return view('students.index')
            ->with('students', $students)
            ->with('activePromotion', $activePromotion)
            ->with('date', $date->format('d-m-Y'))
            ->with('promotions', $promotions->toArray());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = $this->student->find($id);

        if (!$student) {
            return redirect('/');
        }

        return view('students.edit')
            ->with('student', $student);
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UpdateStudentRequest $request
     * @return Response
     */
	public function update($id, UpdateStudentRequest $request)
	{
        $student = $this->student->find($id);

        if (!$student) {
            return back()->withInput();
        }

        $student->email = $request->email;
        $student->tag_id = $request->tag_id;
        $student->save();

        return redirect()->route('students.index')
            ->with('success', "L'étudiant {$student->name} a bien été modifié.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
