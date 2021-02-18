<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BookingFlowController extends Controller
{
    public function search(Request $request){
        
        $advertiserName =   $request->input('advertiserName');
        $contactName =   $request->input('contactName');
        $contactEmail =   $request->input('contactEmail');

        $client = new \GuzzleHttp\Client();
        $response =   $client->request('POST', 'https://api.travelgatex.com/', [
          'headers' => [
            'Authorization' => 'Apikey 5067eb7a-6020-4621-79d3-1c5cd8c1d27b'
          ],
            'json' => [
                'query' => '
                {
                  hotelX {
                    search(criteria: {checkIn: "2021-02-18", checkOut: "2021-02-19", 
                    hotels:["intercontinenetal","1","1149","2","34"],
                    occupancies: [{paxes: [{age: 30}, {age: 30}]}], language: "es", nationality: "ES", currency: "EUR", market: "ES", 
                    destinations: ["1149", "AD", "31256"]}, settings: {suppliers: {code: "HOTELTEST"}, 
                    plugins: {step: REQUEST, pluginsType: [{type: POST_STEP, name: "search_by_destination", 
                    parameters: [{key: "accessID", value: "422"}]}]}, businessRules: null, timeout: 24700, 
                    context:"HOTELTEST", client: "tgx", testMode: true}, filter: {access: {includes: []}}) {
                      context
                      warnings {
                        code
                        type
                        description
                        
                      }
                      options {
                        surcharges {
                          chargeType
                          mandatory
                          description
                          price {
                            currency
                            binding
                            net
                            gross
                            exchange {
                              currency
                              rate
                            }
                            markups {
                              channel
                              currency
                              binding
                              net
                              gross
                              exchange {
                                currency
                                rate
                              }
                            }
                          }
                        }
                        accessCode
                        supplierCode
                        hotelCode
                        hotelName
                        boardCode
                        paymentType
                        status
                        occupancies {
                          id
                          paxes {
                            age
                          }
                        }
                        rooms {
                          occupancyRefId
                          code
                          description
                          refundable
                          units
                          roomPrice {
                            price {
                              currency
                              binding
                              net
                              gross
                              exchange {
                                currency
                                rate
                              }
                              markups {
                                channel
                                currency
                                binding
                                net
                                gross
                                exchange {
                                  currency
                                  rate
                                }
                              }
                            }
                          }
                          beds {
                            type
                            count
                            shared
                          }
                          ratePlans {
                            code
                            name
                          }
                          promotions {
                            code
                            name
                          }
                        }
                        price {
                          currency
                          binding
                          net
                          gross
                          exchange {
                            currency
                            rate
                          }
                          markups {
                            channel
                            currency
                            binding
                            net
                            gross
                            exchange {
                              currency
                              rate
                            }
                          }
                        }
                        supplements {
                          code
                          name
                          description
                          supplementType
                          chargeType
                          mandatory
                          durationType
                          quantity
                          unit
                          resort {
                            code
                            name
                            description
                          }
                          price {
                            currency
                            binding
                            net
                            gross
                            exchange {
                              currency
                              rate
                            }
                            markups {
                              channel
                              currency
                              binding
                              net
                              gross
                              exchange {
                                currency
                                rate
                              }
                            }
                          }
                        }
                        surcharges {
                          chargeType
                          description
                          price {
                            currency
                            binding
                            net
                            gross
                            exchange {
                              currency
                              rate
                            }
                            markups {
                              channel
                              currency
                              binding
                              gross
                              exchange {
                                currency
                                rate
                              }
                            }
                          }
                        }
                        rateRules
                        cancelPolicy {
                          refundable
                          cancelPenalties {
                            hoursBefore
                            penaltyType
                            currency
                            value
                          }
                        }
                        remarks
                        id
                      }
                      errors {
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
      dd($data);

    }
}
