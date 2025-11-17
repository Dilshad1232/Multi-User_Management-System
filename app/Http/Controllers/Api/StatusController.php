<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * 📋 Get all statuses
     */
    public function index()
    {
        return response()->json(Status::all());
    }

    /**
     * ➕ Create a new status (Admin only)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:statuses,name',
            'color' => 'nullable|string|max:20', // optional color tag
        ]);

        $status = Status::create($request->only(['name', 'color']));

        return response()->json([
            'message' => 'Status created successfully',
            'data' => $status
        ]);
    }

    /**
     * ✏️ Update a status
     */
    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:statuses,name,' . $id,
            'color' => 'nullable|string|max:20',
        ]);

        $status->update($request->only(['name', 'color']));

        return response()->json(['message' => 'Status updated successfully']);
    }

    /**
     * ❌ Delete a status
     */
    public function destroy($id)
    {
        Status::destroy($id);
        return response()->json(['message' => 'Status deleted successfully']);
    }
}
