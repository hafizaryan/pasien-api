<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
  /**
   * Get API status and information
   */
  public function status()
  {
    try {
      $patientsCount = Patient::count();
      $latestPatient = Patient::latest()->first();

      return response()->json([
        'success' => true,
        'message' => 'RS Syafira Patient API is running',
        'data' => [
          'api_name' => 'RS Syafira Patient API',
          'version' => '1.0.0',
          'status' => 'active',
          'environment' => app()->environment(),
          'timestamp' => now()->toISOString(),
          'database' => [
            'connected' => true,
            'patients_count' => $patientsCount,
            'latest_patient_created' => $latestPatient ? $latestPatient->created_at->toISOString() : null
          ],
          'endpoints' => [
            'GET /api/patients' => 'Get all patients',
            'GET /api/patients/{id}' => 'Get patient by ID',
            'POST /api/patients' => 'Create new patient',
            'PUT /api/patients/{id}' => 'Update patient',
            'DELETE /api/patients/{id}' => 'Delete patient',
            'GET /api/status' => 'Get API status'
          ],
          'documentation' => [
            'url' => url('/api-docs'),
            'postman_collection' => url('/docs/Patient_API.postman_collection.json'),
            'google_integration_guide' => url('/docs/GOOGLE_INTEGRATION.md')
          ]
        ]
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'API status check failed',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get API statistics
   */
  public function statistics()
  {
    try {
      $stats = [
        'total_patients' => Patient::count(),
        'patients_today' => Patient::whereDate('created_at', today())->count(),
        'patients_this_week' => Patient::whereBetween('created_at', [
          now()->startOfWeek(),
          now()->endOfWeek()
        ])->count(),
        'patients_this_month' => Patient::whereMonth('created_at', now()->month)
          ->whereYear('created_at', now()->year)
          ->count(),
        'latest_patients' => Patient::latest()->take(5)->get(),
        'database_info' => [
          'driver' => config('database.default'),
          'connection' => config('database.connections.' . config('database.default')),
        ]
      ];

      return response()->json([
        'success' => true,
        'data' => $stats
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to get statistics',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get API health check
   */
  public function health()
  {
    try {
      // Check database connection
      $dbStatus = true;
      $dbMessage = 'Database connected';

      try {
        DB::connection()->getPdo();
      } catch (\Exception $e) {
        $dbStatus = false;
        $dbMessage = 'Database connection failed: ' . $e->getMessage();
      }

      // Check if patients table exists and is accessible
      $tableStatus = true;
      $tableMessage = 'Patients table accessible';

      try {
        Patient::count();
      } catch (\Exception $e) {
        $tableStatus = false;
        $tableMessage = 'Patients table error: ' . $e->getMessage();
      }

      $overallStatus = $dbStatus && $tableStatus;

      return response()->json([
        'success' => $overallStatus,
        'status' => $overallStatus ? 'healthy' : 'unhealthy',
        'timestamp' => now()->toISOString(),
        'checks' => [
          'database' => [
            'status' => $dbStatus ? 'ok' : 'error',
            'message' => $dbMessage
          ],
          'patients_table' => [
            'status' => $tableStatus ? 'ok' : 'error',
            'message' => $tableMessage
          ]
        ]
      ], $overallStatus ? 200 : 503);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'status' => 'unhealthy',
        'message' => 'Health check failed',
        'error' => $e->getMessage()
      ], 503);
    }
  }
}
