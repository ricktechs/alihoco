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
                  destinations(criteria:{access:"8394"},relay:{},){
                   token
                    edges{
                      node{
                        code
                        destinationData{
                          destinationLeaf
                          available
                          code
                          type
                          parent
                          texts{
                            language
                            text
                          }
                        }
                        
                      }
                    }
                    
                  }
                }
              }
              ']  
      ]);
      $data = json_decode($response->getBody()->getContents());
      $destinations = $data->data->hotelX->destinations->edges;
    //dd($data->data->hotelX->hotels->edges);
    foreach($destinations as $destination => $values){
       $destinationCodes = implode(', ',$destinations->node->destinationData->destinationLeaf);
       dd($destinationCodes);
    }
    

  return view('welcome',compact('destinations'));
});

Route::post('/search', 'App\Http\Controllers\BookingFlowController@search')->name('bookingflow');
 