<?php

namespace App\Http\Controllers;

use App\Http\Requests\exercise_training_sheet\ExerciseTrainingSheetRequest;
use App\Models\ExerciseTrainingSheet;
use Illuminate\Http\Request;

class ExerciseTrainingSheetController extends Controller
{

    private $request;

    public function __construct(
        Request $request,
    ){
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exerciseTrainingSheets = ExerciseTrainingSheet::all();

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheets List',
            'data' => $exerciseTrainingSheets
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ExerciseTrainingSheetRequest $request)
    {
        $exerciseTrainingSheet = ExerciseTrainingSheet::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet Created',
            'data' => $exerciseTrainingSheet
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = $this->request->route('id');
        $exerciseTrainingSheet = ExerciseTrainingSheet::find($id);
        if(!$exerciseTrainingSheet){
            return response()->json([
                'success' => false,
                'message' => 'Exercise Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet',
            'data' => $exerciseTrainingSheet
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ExerciseTrainingSheetRequest $request)
    {
        $id = $this->request->route('id');
        $exerciseTrainingSheet = ExerciseTrainingSheet::find($id);
        if(!$exerciseTrainingSheet){
            return response()->json([
                'success' => false,
                'message' => 'Exercise Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        $exerciseTrainingSheet->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet Updated',
            'data' => $exerciseTrainingSheet
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = $this->request->route('id');
        $exerciseTrainingSheet = ExerciseTrainingSheet::find($id);
        if(!$exerciseTrainingSheet){
            return response()->json([
                'success' => false,
                'message' => 'Exercise Training Sheet Not Found',
                'data' => null
            ], 404);
        }

        $exerciseTrainingSheet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Exercise Training Sheet Deleted',
            'data' => $exerciseTrainingSheet
        ], 200);
    }
}
