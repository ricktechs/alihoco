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
                    destinations(criteria:{access:"8394",destinationCodes:['.$destinations.']},relay:{},){
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
        




        // $response =   $client->request('POST', 'https://api.travelgatex.com/', [ 
        //   'headers' => [
        //     'Authorization' => 'Apikey 97953250-6dde-489b-67e6-f781510f78bf'
        //   ], 
        //     'json' => [
        //         'query' => ' 
        //         {
        //           hotelX { 
        //             search(criteria: {checkIn: "'.$checkin.'", checkOut: "'.$checkout.'",destinations:["016880"]
        //             occupancies: [{paxes: [{age: 30}, {age: 30}]}], language: "es", nationality: "ES", currency: "EUR", market: "ES"}, settings: {suppliers:{code: "MTBK"}, 
        //             plugins: {step: REQUEST, pluginsType: [{type: POST_STEP, name: "search_by_destination", 
        //             parameters: [{key: "accessID", value: "8394"}]}]}, businessRules: null, timeout: 24700, useContext:true,
        //             context: "MTBK", client: "allinclusive", testMode: false}, filter: {access: {includes: ["8394"]}}) {
        //               context
        //               warnings {
        //                 code
        //                 type
        //                 description
        //               }
        //               options {
        //                 surcharges {
        //                   chargeType
        //                   mandatory
        //                   description
        //                   price {
        //                     currency
        //                     binding
        //                     net
        //                     gross
        //                     exchange {
        //                       currency
        //                       rate
        //                     }
        //                     markups {
        //                       channel
        //                       currency
        //                       binding
        //                       net
        //                       gross
        //                       exchange {
        //                         currency
        //                         rate
        //                       }
        //                     }
        //                   }
        //                 }
        //                 accessCode
        //                 supplierCode
        //                 hotelCode
        //                 hotelName
        //                 boardCode
        //                 paymentType
        //                 status
                        
        //                 occupancies {
        //                   id
        //                   paxes {
        //                     age
        //                   }
        //                 }
        //                 rooms {
        //                   occupancyRefId
        //                   code
        //                   description
        //                   refundable
        //                   units
        //                   roomPrice {
        //                     price {
        //                       currency
        //                       binding
        //                       net
        //                       gross
        //                       exchange {
        //                         currency
        //                         rate
        //                       }
        //                       markups {
        //                         channel
        //                         currency
        //                         binding
        //                         net
        //                         gross
        //                         exchange {
        //                           currency
        //                           rate
        //                         }
        //                       }
        //                     }
        //                   }
        //                   beds {
        //                     type
                           
        //                     count
        //                     shared
        //                   }
        //                   ratePlans {
        //                     code
        //                     name
                            
        //                   }
        //                   promotions {
        //                     code
        //                     name
                          
        //                   }
        //                 }
        //                 price {
        //                   currency
        //                   binding
        //                   net
        //                   gross
        //                   exchange {
        //                     currency
        //                     rate
        //                   }
        //                   markups {
        //                     channel
        //                     currency
        //                     binding
        //                     net
        //                     gross
        //                     exchange {
        //                       currency
        //                       rate
        //                     }
        //                   }
        //                 }
        //                 supplements {
        //                   code
        //                   name
        //                   description
        //                   supplementType
        //                   chargeType
        //                   mandatory
        //                   durationType
        //                   quantity
        //                   unit
        //                   resort {
        //                     code
        //                     name
        //                     description
        //                   }
        //                   price {
        //                     currency
        //                     binding
        //                     net
        //                     gross
        //                     exchange {
        //                       currency
        //                       rate
        //                     }
        //                     markups {
        //                       channel
        //                       currency
        //                       binding
        //                       net
        //                       gross
        //                       exchange {
        //                         currency
        //                         rate
        //                       }
        //                     }
        //                   }
        //                 }
        //                 surcharges {
        //                   chargeType
        //                   description
        //                   price {
        //                     currency
        //                     binding
        //                     net
        //                     gross
        //                     exchange {
        //                       currency
        //                       rate
        //                     }
        //                     markups {
        //                       channel
        //                       currency
        //                       binding
        //                       gross
        //                       exchange {
        //                         currency
        //                         rate
        //                       }
        //                     }
        //                   }
        //                 }
        //                 rateRules
        //                 cancelPolicy {
        //                   refundable
        //                   cancelPenalties {
        //                     hoursBefore
        //                     penaltyType
        //                     currency
        //                     value
        //                   }
        //                 }
        //                 remarks
        //                 id
        //               }
        //               errors {
        //                 code
        //                 type
        //                 description
        //               }
        //               warnings {
        //                 code
        //                 type
        //                 description
        //               }
        //             }
        //           }
        //         }
        //         '
        //       ] 
        // ]);
        $data = json_decode($response->getBody()->getContents(), true);
       // $options = $data['data']['hotelX']['search']['options'];
       dd($data);
      return view('results', compact('options'));
    }
}
