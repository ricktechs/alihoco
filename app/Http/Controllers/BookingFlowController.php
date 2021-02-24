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
            'Authorization' => 'Apikey 97953250-6dde-489b-67e6-f781510f78bf'
          ],
            'json' => [
                'query' => '
                # Write your query or mutation here
                {
                  hotelX {
                    search(criteria: {checkIn: "2021-02-23", checkOut: "2021-02-27",
                    hotels:["1","1149","2","34"],
                    occupancies: [{paxes: [{age: 30}, {age: 30}]}], language: "es", nationality: "ES", currency: "EUR", market: "ES", 
                    destinations: ["1149", "AD", "31256"]}, settings: {suppliers: {code: "HOTELTEST"}, 
                    businessRules: null, timeout: 24700, 
                    context:"HOTELTEST", client: "all_inclusive", testMode: true}, filter: {access: {includes: []}}) {
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
       // dd($data);
      return view('result', compact('data'));
    }
}
