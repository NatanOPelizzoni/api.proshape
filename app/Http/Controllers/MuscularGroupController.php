<?php

namespace App\Http\Controllers;

use App\Http\Requests\muscular_group\MuscularGroupRequest;
use App\Models\MuscularGroup;
use Illuminate\Http\Request;

class MuscularGroupController extends Controller
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
        $muscular_groups = MuscularGroup::all();

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group List',
            'data' => $muscular_groups
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MuscularGroupRequest $request)
    {
        $muscular_group = MuscularGroup::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Created',
            'data' => $muscular_group
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = $this->request->route('id');
        $muscular_group = MuscularGroup::find($id);
        if(!$muscular_group){
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Detail',
            'data' => $muscular_group
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MuscularGroupRequest $request)
    {
        $id = $this->request->route('id');
        $muscular_group = MuscularGroup::find($id);
        if(!$muscular_group){
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        $muscular_group->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Updated',
            'data' => $muscular_group
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = $this->request->route('id');
        $muscular_group = MuscularGroup::find($id);
        if(!$muscular_group){
            return response()->json([
                'success' => false,
                'message' => 'Muscular Group Not Found',
                'data' => null
            ], 404);
        }

        $muscular_group->delete();

        return response()->json([
            'success' => true,
            'message' => 'Muscular Group Deleted'
        ], 200);
    }
}
