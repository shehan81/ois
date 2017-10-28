<?php
/**
 * Author : Shehan Fernando
 * Module : Subject
 * Date   : 2017-10-27
 */
namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Helpers\Helper as Helper;

class SubjectController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->wantsJson()) {
            return (new Datatables)->eloquent(Subject::query())
                            ->addColumn('action', function ($model) {
                                return Helper::getDataTableActions($model->subject_id, [Helper::ACTIONS_EDIT => 'subject.edit', Helper::ACTIONS_DELETE => 'subject.destroy']);
                            })
                            ->make(true);
        }
        return view('subjects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('subjects.edit', ["method" => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm();

        $data = $request->all();

        Subject::create($data);
        return redirect()->route('subject.index')
                        ->with('success', 'Subject created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $subject = Subject::find($subject->subject_id);
        return view('subjects.edit', compact('subject'), ["method" => 'store']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
       $this->validateForm($subject);

        $data = $request->all();

        Subject::find($subject->subject_id)->update($data);
        return redirect()->route('subject.index')
                        ->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        Subject::find($subject->subject_id)->delete();
        return redirect()->route('subject.index')
                        ->with('success', 'Subject deleted successfully');
    }
    
    /**
     * 
     * @param Subject $subject
     * @return type
     */
    public function validateForm(Subject $subject = null) {

        $code = 'required|min:4|max:4|regex:/(^[A-Za-z0-9^\S]+$)+/|unique:subjects';
        switch (request()->method()) {
            case "PUT":
            case "PATCH":
                $code .= ',code,' . $subject->subject_id . ',subject_id';
                break;
        }
        return request()->validate([
                    'code' => $code,
                    'title' => 'required',
        ]);
    }

}
