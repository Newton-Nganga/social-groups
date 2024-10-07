<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Analytics;

class AnalyticsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $agent = $request->header('User-Agent');
        $deviceType = $this->getDeviceType($agent);
        $page = $request->path();

        // Log analytics data
        Analytics::create([
            'device_type' => $deviceType,
            'page' => $page,
            'ip_address' => $request->ip(),
        ]);

        return $next($request);
    }

    private function getDeviceType($agent)
    {
        if (preg_match('/Android/i', $agent)) {
            return 'Android';
        } elseif (preg_match('/iPhone|iPad/i', $agent)) {
            return 'iPhone/iPad';
        } elseif (preg_match('/Windows|Mac/i', $agent)) {
            return 'Desktop';
        }

        return 'Unknown';
    }
}
