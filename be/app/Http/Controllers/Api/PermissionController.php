<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // store
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'date' => 'required',
            'reason' => 'required'
        ]);

        // Create a new permission
        $permission = new Permission();
        $permission->user_id = $request->user()->id;
        $permission->date_permission = $request->date;
        $permission->reason = $request->reason;
        $permission->is_approved = 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/permission', $image->hashName());
            $permission->image = $image->hashName();
        }

        $permission->save();

        // Return a response
        return response()->json([
            'message' => 'Permission created successfully',
            'permission' => $permission,
        ], 201);
    }
}
