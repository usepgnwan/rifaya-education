<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('tes', function(){
echo "jajaja";
});

Route::post('/github-webhook', function () {
    Log::info('GitHub Webhook Received: ');  
    $output = shell_exec('./../deploy.sh');
    if(is_null($output) || $output == ""){ 
       return response()->json(['message' => 'Webhook failed deploys','output' => $output], 500); // tesss
    }
    Log::info($output); 
    Log::info('Deployment Output:', ['output' => $output]);
   return response()->json(['message' => 'Webhook received','output' => $output]);
});
