<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Groups;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GroupApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $groups = Groups::all(); // Fetch all groups
            return ResponseHelper::success(
                message: 'Successfully fetched all groups.',
                data: $groups,
                statusCode: 200
            );
        } catch (Exception $e) {
            Log::error('Exception while fetching groups: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while fetching groups.',
                statusCode: 400
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                // Add other validation rules
            ]);

            $group = Groups::create($request->all()); // Create a new group
            return ResponseHelper::success(
                message: 'Group created successfully.',
                data: $group,
                statusCode: 201 // HTTP status code for created
            );
        } catch (Exception $e) {
            Log::error('Exception while creating group: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while creating group.',
                statusCode: 400
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($group_id)
    {
        try {
            // fetch group with id
            $group = Groups::findOrFail($group_id);
            if ($group) {
                return ResponseHelper::success(message: 'Successfuly fetch Group by ID', data: $group, statusCode: 200);
            }
            return ResponseHelper::error(message: 'Failed to fetch group by that ID', statusCode: 400);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the job with given ID is not found
            return ResponseHelper::error(message: 'Group With that id does not exist | 404: ' . $group_id, statusCode: 404);
        } catch (Exception $e) {
            // try to log error
            Log::error('Exception while fetching group by that ID!' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(message: 'Exception while fetching group by that ID!',  statusCode: 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $group_id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                // Add other validation rules as needed
            ]);

            $group = Groups::findOrFail($group_id);
            // dd($group);
            $group->update($request->all()); // Update the group

            return ResponseHelper::success(
                message: 'Group updated successfully.',
                data: $group,
                statusCode: 200
            );
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'Group with that ID does not exist | 404: ' . $group_id,
                statusCode: 404
            );
        } catch (Exception $e) {
            Log::error('Exception while updating group: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while updating group.',
                statusCode: 400
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($group_id)
    {
        try {
            $group = Groups::findOrFail($group_id);
            // dd($group);
            $group->delete(); // Delete the group

            return ResponseHelper::success(
                message: 'Group deleted successfully.',
                statusCode: 200
            );
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'Group with that ID does not exist | 404: ' . $group_id,
                statusCode: 404
            );
        }

    }
}
