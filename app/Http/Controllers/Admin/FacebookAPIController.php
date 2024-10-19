<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\FacebookGroup;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class FacebookAPIController extends Controller
{
    //  api for all facebook Groups.
    public function index()
    {
        try {
            $facebook_groups = FacebookGroup::all();
            return ResponseHelper::success(
                message: 'Successfully fetched all  facebook groups',
                data: $facebook_groups,
                statusCode: 200
            );
        } catch (Exception $e) {
            Log::error('Exception while fetching facebook groups : ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exceprion while fetching .',
                statusCode: 400
            );
        }
    }

    /**
     *  Store newly created resource in database
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'group_name' => 'required|string',
                'group_link' => 'required|url',
            ]);

            $facebook_group =   FacebookGroup::create([
                'group_name' => $request->group_name,
                'group_link' => $request->group_link,
                'user_id' => auth()->id(),
            ]);

            return ResponseHelper::success(
                message: 'facebook  Group created successfully.',
                data: $facebook_group,
                statusCode: 201 // HTTP status code fir created.
            );
        } catch (Exception $e) {
            Log::error('Exception while creating facebook group: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while creating facebook group.',
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
            //  fetch facebook  group with id
            $facebook_group =  FacebookGroup::findOrFail($group_id);

            if ($facebook_group) {
                return ResponseHelper::success(message: 'Successfuly fetch facebook Group by ID', data: $facebook_group, statusCode: 200);
            }
            return ResponseHelper::error(message: 'Failed to fetch facebook group by that ID', statusCode: 400);
        } catch (Exception $e) {
            // try to log error
            Log::error('Exception while fetching facebook group by that ID!' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(message: 'Exception while fetching  facebook group by that ID!',  statusCode: 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $group_id)
    {
        try {
            $request->validate([
                'group_name' => 'required|string',
                'group_link' => 'required|url',
            ]);

            $facebook_group = FacebookGroup::findOrFail($group_id);

            $facebook_group->update($request->all());

            return ResponseHelper::success(
                message: 'facebook Group updated successfully.',
                data: $facebook_group,
                statusCode: 200
            );
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'facebook Group with that ID does not exist | 404: ' . $group_id,
                statusCode: 404
            );
        } catch (Exception $e) {
            Log::error('Exception while updating facebook group: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while updating facebook group.',
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
            $facebook_group =  FacebookGroup::findOrFail($group_id);
            $facebook_group->delete(); // delete facebook group associated with the id.

        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'facebook Group with that Id does not exist!',
                statusCode: 404
            );
        }
    }
}
