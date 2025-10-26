<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Get positions by department ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDepartment(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id'
        ], [
            'department_id.required' => 'Department ID is required',
            'department_id.exists' => 'Department not found'
        ]);

        $departmentId = $request->get('department_id');

        $positions = Position::active()
            ->byDepartment($departmentId)
            ->get(['id', 'name', 'level']);

        return response()->json([
            'success' => true,
            'data' => $positions,
            'message' => 'Positions retrieved successfully'
        ]);
    }

    /**
     * Get all active positions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $positions = Position::with('department:id,name,code')
            ->active()
            ->get(['id', 'name', 'level', 'department_id']);

        return response()->json([
            'success' => true,
            'data' => $positions,
            'message' => 'All positions retrieved successfully'
        ]);
    }
}
