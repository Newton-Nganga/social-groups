<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Investment;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class InvestmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $investments = Investment::all(); // Fetch all investiments
            return ResponseHelper::success(
                message: 'Successfully fetched all investments.',
                data: $investments,
                statusCode: 200
            );
        } catch (Exception $e) {
            Log::error('Exception while fetching investments: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while fetching investments.',
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
                // 'name' => 'required|string|max:255',
                // Add other validation rules
            ]);

            $investments = Investment::create($request->all()); // Create a new Invests
            return ResponseHelper::success(
                message: 'investment created successfully.',
                data: $investments,
                statusCode: 201 // HTTP status code for created
            );
        } catch (Exception $e) {
            Log::error('Exception while creating investments: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while creating investiments.',
                statusCode: 400
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            // fetch investment with id
            $investment = Investment::findOrFail($id);
            if ($investment) {
                return ResponseHelper::success(message: 'Successfuly fetch Investment by ID', data: $investment, statusCode: 200);
            }
            return ResponseHelper::error(message: 'Failed to fetch investiment by that ID', statusCode: 400);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the job with given ID is not found
            return ResponseHelper::error(message: 'Investment With that id does not exist | 404: ' . $id, statusCode: 404);
        } catch (Exception $e) {
            // try to log error
            Log::error('Exception while fetching Investment by that ID!' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(message: 'Exception while fetching Investment by that ID!',  statusCode: 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                // Add other validation rules as needed
            ]);

            $investment = Investment::findOrFail($id);
            dd($investment);
            $investment->update($request->all()); // Update the investments

            return ResponseHelper::success(
                message: 'investment updated successfully.',
                data: $investment,
                statusCode: 200
            );
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'Investment with that ID does not exist | 404: ' . $id,
                statusCode: 404
            );
        } catch (Exception $e) {
            Log::error('Exception while updating Investment: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while updating Investment.',
                statusCode: 400
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $investment = Investment::findOrFail($id);
            // dd($investment);
            $investment->delete(); // Delete the investments

            return ResponseHelper::success(
                message: 'Investment deleted successfully.',
                statusCode: 200
            );
        } catch (ModelNotFoundException $e) {
            return ResponseHelper::error(
                message: 'Investment with that ID does not exist | 404: ' . $id,
                statusCode: 404
            );
        }
    }
}
