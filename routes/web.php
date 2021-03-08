<?php

use Illuminate\Support\Facades\Route;



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

  return view('welcome',compact('destinations'));
});

Route::post('/search', 'App\Http\Controllers\BookingFlowController@search')->name('bookingflow');
 