<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiLogging
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        // Log request
        $requestData = [
            'method' => $request->getMethod(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now()->toISOString(),
        ];

        // Log request body for POST/PUT requests (excluding sensitive data)
        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'])) {
            $requestData['body'] = $request->except(['password', 'token']);
        }

        Log::info('API Request', $requestData);

        // Process request
        $response = $next($request);

        // Calculate response time
        $responseTime = (microtime(true) - $startTime) * 1000; // in milliseconds

        // Log response
        $responseData = [
            'method' => $request->getMethod(),
            'url' => $request->fullUrl(),
            'status_code' => $response->getStatusCode(),
            'response_time_ms' => round($responseTime, 2),
            'timestamp' => now()->toISOString(),
        ];

        // Log response body only for errors or if specifically needed
        if ($response->getStatusCode() >= 400) {
            $responseData['response_body'] = $response->getContent();
        }

        Log::info('API Response', $responseData);

        return $response;
    }
}
