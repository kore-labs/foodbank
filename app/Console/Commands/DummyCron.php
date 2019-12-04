<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DummyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get AirBNB listings';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
      echo "Dummy Cron found\n";

        parent::__construct();
        //$this->handle();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

      \Log::info("Dummy Cron Running!");

      $days_offset = 14;
      $day_range = $days_offset+50;

      $query = array();
      $query[] = "South Lake Tahoe";
      $query[] = "tahoe";
      $query[] = "kirkwood";
      $query[] = "olympic valley";

$rv_array['has_listings'] = false;

foreach( $query as $location ){

      while($days_offset <= $day_range){


          $date = new \DateTime();
          $date->modify("+$days_offset day");

          $checkin = $date->format("Y-m-d");

          $date->modify("+2 day");
          $checkout = $date->format("Y-m-d");

          $items_offset = 1;
          $section_offset = 5;
          $status = true;
          while( $status ){
            echo "[--------------------------------------------------]";
            echo "\n\n [ Starting GET for $checkin on  items_offset: $items_offset  ] \n";
            $rv_array = $this->getPropertiesForDate( $location, $checkin, $checkout, $items_offset, $section_offset);
            //$status = $rv_array['status'];

            //More random sleep period
            sleep( rand( rand(17,25), rand(26,45) ) );

            if($status==false){
              //break;
            }

            echo "Returned: ".$rv_array['items_offset']."\n";

            $section_offset = $rv_array['section_offset'];
            $items_offset = $rv_array['items_offset'];
            $items_offset = $items_offset + rand(1, 50); 

            echo "Passed: ".$items_offset."\n";
            if($items_offset > 1200 || ( !$rv_array['has_listings'] && $items_offset > 450 ) ){
              $status = false;
              break;
            }
          }

          $days_offset++;
      }

    }



    }


    //dd($checkin);
    //getPropertiesForDate($checkin, $checkout, $items_offset);

    protected function getPropertiesForDate($location, $checkin, $checkout, $items_offset, $section_offset ){
        // Specify your search query
          $query = $location;



        $query = str_replace ( ' ', '%20', $query);

        $parameters = "version=1.3.9";

        $parameters .= "&satori_version=1.1.0";


        $parameters .= "&_format=for_explore_search_web";

        $parameters .= "&experiences_per_grid=0";

        $parameters .= "&items_per_grid=50";

        $parameters .= "&section_offset=$section_offset";
        if($items_offset > 0){
          $parameters .= "&items_offset=$items_offset";
        }else{
          $parameters .= "&items_offset=1";
        }
        $parameters .= "&guidebooks_per_grid=0";
        $parameters .= "&auto_ib=true";
        $parameters .= "&fetch_filters=true";
        $parameters .= "&has_zero_guest_treatment=false";
        $parameters .= "&is_guided_search=true";
        $parameters .= "&is_new_cards_experiment=true";//true
        $parameters .= "&luxury_pre_launch=true";

        $parameters .= "&query_understanding_enabled=false";

        $parameters .= "&show_groupings=false";

        $parameters .= "&supports_for_you_v3=true";

        $parameters .= "&timezone_offset=-240";

        $parameters .= "&metadata_only=false";

        $parameters .= "&is_standard_search=true";
        $parameters .= "&tab_id=home_tab";


        $parameters .= "&recommendation_item_cursor=";

        $parameters .= "&refinement_paths[]=/homes";

        $parameters .= "&checkin=$checkin";
        $parameters .= "&checkout=$checkout";

        $parameters .= "&adults=1";
        $parameters .= "&children=0";
        $parameters .= "&infants=0";
        $parameters .= "&guests=1";
        $parameters .= "&toddlers=0";

        //$parameters .= "&start-index=100";
        //$parameters .= "&max-results=50";

        $parameters .= "&allow_override[]=";
        $parameters .= "&zoom=10";
        $parameters .= "&search_by_map=false";
        $parameters .= "&map_toggle=false";
        $parameters .= "&screen_size=large";
        $parameters .= "&query=".$query."";
        $parameters .= "&_intents=p1";
        $parameters .= "&key=d306zoyjsyarp7ifhu67rjxn52tv0t20";
        $parameters .= "&currency=USD";
        $parameters .= "&locale=en";
        $parameters .= "&allow_override%5B%5D=";
        $parameters .= "&refinement_paths%5B%5D=%2Fhomes";

        // Call AirBNB's service
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.airbnb.com/api/v2/explore_tabs?".$parameters,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        // Gather and decode the response
        $response = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($response, true);
        //dd($json);

        $rv_array = array();
        $rv_array['items_offset'] = $items_offset;
        $rv_array['section_offset'] = 5;


        if( ! isset( $json["explore_tabs"][0]["sections"][0]["listings"] ) ){
          //dd($json);
          echo "\nfailed";
          $rv_array['status'] = false;
          return $rv_array;
        }

        //echo $json["explore_tabs"][0]["sections"][0]["has_pagination"]
        $rv_array['status'] = true;

        if (   isset( $json["explore_tabs"][0]["pagination_metadata"]["items_offset"] ) ) {
          $rv_array['items_offset'] = $json["explore_tabs"][0]["pagination_metadata"]["items_offset"];
        }

        if (   isset( $json["explore_tabs"][0]["pagination_metadata"]["section_offset"] ) ) {
            $rv_array['section_offset'] = $json["explore_tabs"][0]["pagination_metadata"]["section_offset"];
        }

        echo "section_offset: ".$rv_array['section_offset'] . "\n";

        echo "server item offset: ".$rv_array['items_offset'] . "\n";


        $listings = $json["explore_tabs"][0]["sections"][0]["listings"];

        //echo "count: ".count($listings);

        //dd($listings);

        $result = "Result: ";
        $count = 0;
        $has_listings = false;


        // Itirate through all the results and display them in a table
        foreach($listings as $listing){
        	// Store our variables from each listing
        //dd($listing);
        	$id = $listing["listing"]["id"];

          $beds = 0;
          if( isset( $listing["listing"]["beds"] )){
        	   $beds = $listing["listing"]["beds"];
          }else{
            //dd($listing);
          }

    $bathrooms =0;
          if( isset( $listing["listing"]["beds"] )){
        	   $bathrooms = $listing["listing"]["beds"];
          }
    $bedrooms =0;
          if( isset( $listing["listing"]["bedrooms"] )){
            $bedrooms = $listing["listing"]["bedrooms"];
          }
          $name =0;
          if( isset( $listing["listing"]["name"] )){
        	   $name = $listing["listing"]["name"];
          }
        	//$neighborhood = $listing["listing"]["neighborhood"];
          $neighborhood = str_replace ( '%20', ' ', $query);

          $city = 0;
          if( isset( $listing["listing"]["city"] )){
        	   $city = $listing["listing"]["city"];
          }

          $persons = 0;
          if( isset( $listing["listing"]["persons"] )){
        	   $persons = $listing["listing"]["persons"];
          }
        	//$pictures = $listing["listing"]["picture_count"];
        	//$picture = $listing["listing"]["picture_url"];
          $reviews = 0;
          if( isset( $listing["listing"]["reviews_count"] )){
        	   $reviews = $listing["listing"]["reviews_count"];
          }

          $property = 0;
          if( isset($listing["listing"]["room_and_property_type"]) ){
        	   $property = $listing["listing"]["room_and_property_type"];
          }

          $price = 0;
          if( isset($listing["pricing_quote"]["price_string"]) ){
        	   $price = $listing["pricing_quote"]["price_string"];
          }
          $rate=0;
          if( isset($listing["pricing_quote"]["rate_type"]) ){
            $rate = $listing["pricing_quote"]["rate_type"];
          }

          $cleaning_fee = 0;
          $service_fee = 0;
          $price_with_fees = 0;

          if( isset( $listing["pricing_quote"]["price"]["price_items"] ) ){
            foreach($listing["pricing_quote"]["price"]["price_items"] as $price_item ){
              if( $price_item["localized_title"] == "Cleaning fee"){
                $cleaning_fee = $price_item["total"]["amount"];

              }
              else if( $price_item["localized_title"] == "Service fee"){
                $service_fee = $price_item["total"]["amount"];

              }

              $price_with_fees += $price_item["total"]["amount"];
            }
          }

          $amenities=0;
          if( isset($listing["listing"]["preview_amenity_names"])){
            $amenities = json_encode( $listing["listing"]["preview_amenity_names"] );

          }

          $min_nights = 0;
          if( isset($listing["listing"]["min_nights"])){
            $min_nights = $listing["listing"]["min_nights"];
          }
          $lat=0;
          if( isset($listing["listing"]["lat"])){
            $lat = $listing["listing"]["lat"];
          }
          $lng =0;
          if( isset($listing["listing"]["lng"])){
            $lng = $listing["listing"]["lng"];

          }

          $host_id = 0;
          if( isset($listing["listing"]["user"]["id"])){
            $host_id = $listing["listing"]["user"]["id"];
          }



          $date = new \DateTime();

          $today = $date->format("Y-m-d");

          $hash_id = md5($id.$checkin.$today);

          $accountInfo = [
                          "id"=>$id,
                          "beds"=>$beds,
                          "bathrooms"=>$bathrooms,
                          "bedrooms"=>$bedrooms,
                          "name"=>$name,
                          "neighborhood"=>$neighborhood,
                          "bathrooms"=>$bathrooms,
                          "persons"=>$persons,
                          "reviews"=>$reviews,
                          "property"=>$property,
                          "price"=>$price,
                          "rate_type"=>$rate,
                          "rate_with_service_fee"=>$price_with_fees,
                          "city"=>$city,
                          "min_nights"=>$min_nights,
                          "amenities"=>$amenities,
                          "checkin"=>$checkin,
                          "checkout"=>$checkout,
                          "latitude"=>$lat,
                          "longitude"=>$lng,
                          "hash_id_checkin_today"=>$hash_id,
                          "created_at"=>$today,
                          "host_id"=>$host_id,
                          "service_fee"=>$service_fee,
                          "cleaning_fee"=>$cleaning_fee

                          //"state"=>$aRequest->input('state'),
                          //"zip"=> $aRequest->input('zip'),
                          ];


                $rv = \DB::table('airbnb_rentals_2019_2020')->insertOrIgnore($accountInfo);

                $count += $rv;
                $result .=$rv." - ";
                $has_listings = true;
        	//$instantbook = $listing["pricing_quote"]["can_instant_book"];

        	// Echo each listings variable into a table row
        /*	echo "<tr>";
        	//echo "<td><img src='".$picture."' style='width:45px;height;45px'></td>";
        	echo "<td><a href='https://www.airbnb.com/rooms/".$id."' target='_new'>" . $id . "</a></td>";
        	echo "<td>" . $name . "</td>";
        	echo "<td>" . $city . "</td>";
        	echo "<td>" . $bedrooms . "</td>";
        	echo "<td>" . $bathrooms . "</td>";
        	echo "<td>" . $persons . "</td>";
        	//echo "<td>" . $pictures . "</td>";
        	echo "<td>" . $reviews . "</td>";
        	echo "<td>" . $property . "</td>";
        	echo "<td>" . $price . "</td>";
        	echo "<td>" . $rate . "</td>";
        	echo "</tr>";*/

        }
        $rv_array['has_listings'] = $has_listings;
        echo $result."\n";
        return $rv_array;
      }







}
