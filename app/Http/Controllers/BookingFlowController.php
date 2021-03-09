<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BookingFlowController extends Controller
{
    public function search(Request $request){
        
        //$advertiserName =   $request->input('advertiserName');
        //$contactName =   $request->input('contactName');
        //$contactEmail =   $request->input('contactEmail');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $destinations = $request->input('location');
        $client = new \GuzzleHttp\Client();
        $response =   $client->request('POST', 'https://api.travelgatex.com/', [ 
          'headers' => [
            'Authorization' => 'Apikey 97953250-6dde-489b-67e6-f781510f78bf'
          ], 
            'json' => [
                'query' => ' 
                {
                  hotelX{
                    destinations(criteria:{access:"8394",destinationCodes:["'.$destinations.'"]},relay:{},){
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
                '
              ] 
        ]);
        $data = json_decode($response->getBody()->getContents(), true);
        $options = $data['data']['hotelX']['destinations']['edges'][0]['node']['destinationData']['destinationLeaf'];

       foreach($options as $option){
       $response =   $client->request('POST', 'https://api.travelgatex.com/', [ 

          'headers' => [
            'Authorization' => 'Apikey 97953250-6dde-489b-67e6-f781510f78bf'
          ], 
            'json' => [
                'query' => ' 
                {
                  hotelX {
                    search(criteria: {checkIn: "'.$checkin.'", checkOut: "'.$checkout.'",destinations:["'.$option.'"]
                    occupancies: [{paxes: [{age: 30}, {age: 30},{age: 9},{age: 30}]}], language: "es", nationality: "ES", currency: "EUR", market: "ES"}, settings: {suppliers:{code: "MTBK"}, 
                    plugins: {step: REQUEST, pluginsType: [{type: POST_STEP, name: "search_by_destination", 
                    parameters: [{key: "accessID", value: "8394"}]}]}, businessRules: null, timeout: 24700, useContext:true,
                    context: "MTBK", client: "allinclusive", testMode: false}, filter: {access: {includes: ["8394"]}}) {
                      context
                      options {
                        accessCode
                        supplierCode
                        hotelCode
                        hotelName
                        boardCode
                        paymentType
                        status
                      }
                      errors {
                        code
                        type
                        description
                      }
                      warnings {
                        code
                        type
                        description
                      }
                    }
                  }
                }
                '
              ] 
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $options = $data['data']['hotelX']['search']['options'];
        $hotels = array();
        $i = 0;
        $key_array = array();
           
        foreach($options as $option){
          if (!in_array($option['hotelCode'], $key_array)) {
            $key_array[$i] = $option['hotelCode'];
            $hotels[$i] = $option;
          }
          $i++;
        }

        
       } //close array 
 
       dd($hotels);
        
        
    //  return view('results', compact('options'));
    }
}
