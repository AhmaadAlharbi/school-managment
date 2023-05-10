<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;

class GradeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Grades = Grade::all();
    return view('pages.Grades.Grades', compact('Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $listClasses = $request->List_Classes;

    try {
      foreach ($listClasses as $listClass) {
        $classroom = new Classroom();
        $classroom->Grade_id = $listClass['Grade_id'];
        $classroom->Name_Class = [
          'en' => $listClass['Name_class_en'],
          'ar' => $listClass['Name'],
        ];
        $classroom->save();
      }

      toastr()->success(trans('messages.success'));
      return redirect()->route('Classrooms.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreGrades $request)
  {
    try {
      $validated = $request->validated();
      $Grades = Grade::findOrFail($request->id);
      $Grades->update([
        $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
        $Grades->Notes = $request->Notes,
      ]);
      toastr()->success(trans('messages.Update'));
      return redirect()->route('Grades.index');
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    $MyClass_id = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');

    if ($MyClass_id->count() == 0) {

      $Grades = Grade::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Grades.index');
    } else {

      toastr()->error(trans('Grades_trans.delete_Grade_Error'));
      return redirect()->route('Grades.index');
    }
  }
}