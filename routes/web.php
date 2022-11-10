<?php

use Illuminate\Support\Facades\Route;
use \RouterOS\Client;
use \RouterOS\Query;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

// Initiate client with config object
$client2 = new Client([
    'host' => '172.16.20.1',
    'user' => 'adm',
    'pass' => 'NOCsisfokom08',
    'port' => 19745,
]);

$client = new Client([
    'host' => '192.168.52.1',
    'user' => 'adm',
    'pass' => '',
    'port' => 8728,
]);

// Create "where" Query object for RouterOS
$query =
    // (new Query('/ip/hotspot/ip-binding/print'));
    (new Query('/ip/hotspot/user/print'));

// Send query and read response from RouterOS
$response = $client->query($query)->read();
$response = json_encode($response);

echo $response;
});
