<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\TelegramGroup;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class TelegramAPIController extends Controller
{
    //  api for all Telegram Groups.
    public function index()
    {
        try {
            $whatsapp_groups = TelegramGroup::all();
            return ResponseHelper::success(
                message: 'Successfully fetched all  Telegram grousp',
                data: $whatsapp_groups,
                statusCode: 200
            );
        } catch (Exception $e) {
            Log::error('Exception while fetching telegram groups : ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
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

            $whatsapp_group =   TelegramGroup::create([
                'group_name' => $request->group_name,
                'group_link' => $request->group_link,
                'user_id' => auth()->id(),
            ]);

            return ResponseHelper::success(
                message: 'telegram  Group created successfully.',
                data: $whatsapp_group,
                statusCode: 201 // HTTP status code fir created.
            );
        } catch (Exception $e) {
            Log::error('Exception while creating telegram group: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while creating telegram group.',
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
            //  fetch telegram  group with id
            $whatsapp_group =  TelegramGroup::findOrFail($group_id);

            if ($whatsapp_group) {
                return ResponseHelper::success(message: 'Successfuly fetch telegram Group by ID', data: $whatsapp_group, statusCode: 200);
            }
            return ResponseHelper::error(message: 'Failed to fetch telegram group by that ID', statusCode: 400);
        } catch (Exception $e) {
            // try to log error
            Log::error('Exception while fetching telegram group by that ID!' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(message: 'Exception while fetching  telegram group by that ID!',  statusCode: 400);
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

            $whatsapp_group = TelegramGroup::findOrFail($group_id);

            $whatsapp_group->update($request->all());

            return ResponseHelper::success(
                message: 'telegram Group updated successfully.',
                data: $whatsapp_group,
                statusCode: 200
            );
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'telegram Group with that ID does not exist | 404: ' . $group_id,
                statusCode: 404
            );
        } catch (Exception $e) {
            Log::error('Exception while updating telegram group: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while updating telegram group.',
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
            $whatsapp_group =  TelegramGroup::findOrFail($group_id);
            $whatsapp_group->delete(); // delete telegram group associated with the id.

        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'telegram Group with that Id does not exist!',
                statusCode: 404
            );
        }
    }
}
