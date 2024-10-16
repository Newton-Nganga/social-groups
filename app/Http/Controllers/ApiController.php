<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Analytics;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    /**
     * Display a For home /index API
     */
    public function index()
    {


        try {
            // Example Home data
            $data = [
                'message' => 'Welcome to the Social Groups API',
                'description' => 'This API provides access to manage and retrieve information about social media groups including WhatsApp, Facebook, Telegram, and more.',
                'version' => '1.0.0',
                'status' => 'success',
                'endpoints' => [
                    // 'GET /api/home' => 'API home route, providing information about the API.',
                    // 'GET /api/scripts' => 'Retrieve a list of available social media automation scripts.',
                    // 'GET /api/whatsapp' => 'Retrieve a list of WhatsApp groups.',
                    // 'GET /api/facebook' => 'Retrieve a list of Facebook groups.',
                    // 'GET /api/telegram' => 'Retrieve a list of Telegram groups.',
                    // 'GET /api/about' => 'Learn more about the API and its purpose.',
                    // 'GET /api/contact' => 'Contact information for the API team.',
                    // 'POST /api/groups' => 'Create a new social media group (WhatsApp, Facebook, Telegram, etc.).',
                    // 'GET /api/groups' => 'Retrieve a list of all social media groups.'
                ],

                'documentation_url' => '<documentation>',
                'support' => [
                    'email' => 'support@socialgroupsapi.com',
                    'phone' => '<Phone Number>'
                ]
            ];
            return ResponseHelper::success(
                message: 'Successfully fetched all groups.',
                data: $data,
                statusCode: 200
            );
        } catch (Exception $e) {
            return ResponseHelper::error(
                message: 'Exception while fetching groups.',
                statusCode: 400
            );
        }
    }

    /**
     * Fetch All Analytics  resource in storage.
     */
    public function analytics()
    {
        try {
            $analytics = Analytics::all(); // Fetch all Analytic data
            return ResponseHelper::success(
                message: 'Successfully fetched all Analytics info.',
                data: $analytics,
                statusCode: 200
            );
        } catch (Exception $e) {
            Log::error('Exception while fetching analytics info: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while fetching Analytics info.',
                statusCode: 400
            );
        }
    }

    /**
     * Fetch All Users  in storage.
     */
    public function users()
    {
        try {
            $users = User::all(); // Fetch all users data
            return ResponseHelper::success(
                message: 'Successfully fetched users.',
                data: $users,
                statusCode: 200
            );
        } catch (Exception $e) {
            Log::error('Exception while fetching users: ' . $e->getMessage() . ' - Line no. ' . $e->getLine());
            return ResponseHelper::error(
                message: 'Exception while fetching Auser.',
                statusCode: 400
            );
        }
    }


}
