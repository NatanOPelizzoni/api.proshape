<?php

namespace App\Http\Controllers;

use App\Http\Requests\training_sheet\TrainingSheetRequest;
use App\Models\TrainingSheet;
use Illuminate\Http\Request;

class TrainingSheetController extends Controller
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
        $train_sheets = TrainingSheet::all();

        return response()->json([
            'success' => true,
            'message' => 'Train Sheet List',
            'data' => $train_sheets
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingSheetRequest $request)
    {
        $train_sheet = TrainingSheet::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Train Sheet Created',
            'data' => $train_sheet
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = $this->request->route('id');
        $train_sheet = TrainingSheet::find($id);
        if(!$train_sheet){
            return response()->json([
                'success' => false,
                'message' => 'Train Sheet Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Train Sheet',
            'data' => $train_sheet
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingSheetRequest $request)
    {
        $id = $this->request->route('id');
        $train_sheet = TrainingSheet::find($id);
        if(!$train_sheet){
            return response()->json([
                'success' => false,
                'message' => 'Train Sheet Not Found',
                'data' => null
            ], 404);
        }

        $train_sheet->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Train Sheet Updated',
            'data' => $train_sheet
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = $this->request->route('id');
        $train_sheet = TrainingSheet::find($id);
        if(!$train_sheet){
            return response()->json([
                'success' => false,
                'message' => 'Train Sheet Not Found',
                'data' => null
            ], 404);
        }

        $train_sheet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Train Sheet Deleted',
            'data' => $train_sheet
        ], 200);
    }
}
