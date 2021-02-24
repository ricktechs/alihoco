<?php

use Illuminate\Support\Facades\Route;

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
   
    $client = new \GuzzleHttp\Client();
    $response =   $client->request('POST', 'https://api.travelgatex.com/', [ 
        'headers' => [
          'Authorization' => 'Apikey 97953250-6dde-489b-67e6-f781510f78bf'
        ],
          'json' => [
              'query' => '
              {
                hotelX{
                 hotels(criteria:{access:"0"},relay:{},){
                  edges{
                    node{
                      code
                      hotelData{
                        hotelCode
                        hotelName
                        location{
                          address
                          city
                          country
                        }
                      }
                    }
                  }
                  token
                  count
                } 
                }
              }
              '
            ] 
      ]);
      $data = json_decode($response->getBody()->getContents(), true);
     dd($data);
    return view('welcome');
});

Route::post('/search', 'App\Http\Controllers\BookingFlowController@search')->name('bookingflow');
 