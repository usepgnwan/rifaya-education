<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 
Route::post('/github-webhook', function () {
    if (!file_exists('/home/u504186664/domains/rifayaeducation.com/public_html/deploy.sh')) {
        Log::error("deploy.sh does not exist at the expected path.");
        return response()->json(['message' => 'deploy.sh file not found'], 500);
    }

    Log::info('GitHub Webhook Received: ');
    
    $output = shell_exec('whoami 2>&1'); // Check user running the script
    Log::info("Executing as: $output");

    $output = shell_exec('ls -l ./../deploy.sh 2>&1'); // Check script permissions
    Log::info("File permissions: $output");

    $output = shell_exec('/home/u504186664/domains/rifayaeducation.com/public_html/deploy.sh 2>&1'); // Capture errors
    Log::info("Shell Output: $output");

    if (is_null($output) || trim($output) === "") { 
        return response()->json(['message' => 'Webhook failed deploys', 'output' => $output], 500);
    }

    return response()->json(['message' => 'Webhook received', 'output' => $output]);
});