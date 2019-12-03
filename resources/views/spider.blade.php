

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AirBNB REST API Pull Example -</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://autotrader-api.herokuapp.com/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://autotrader-api.herokuapp.com/css/mdb.min.css" rel="stylesheet">
    <!-- BST core CSS -->
    <link href="https://autotrader-api.herokuapp.com/js/bootstrap-table.min.css" rel="stylesheet">
</head>

<body>


    <div class="container" style="margin-top:25px;">
        <div class="flex-center flex-column">
            <h1 class="animated fadeIn mb-4">AirBNB REST API Pull Example</h1>

            <h5 class="animated fadeIn mb-3">Written by: <a href="" style="text-decoration:none;"></a> - 11/02/2018</b></h5>

            <p class="animated fadeIn text-muted">This is an example of pulling listings available on Air BNB in real-time from their localized hometabs API. In this example I am returning 250 results for locations in "France"; you can modify the URL to add filters to your search such as number of guests, children, etc; in addition you can also click on a listing ID to load the actual listing in a new window.</p>	&nbsp;<br /><small>Note: You can play with the query by adding /?query='COUNTRY' to this URL. For example: <a href=""></a> would return 250 results from Israel. You can modify the filters easily in the code to manipulate this data for any use (display, automation, monitoring, etc.).</small>


		<div class="table-responsive" id="results">

        <table id="table"
               data-toggle="table"
			   data-height="625"
			   data-page-size="100"
               data-show-columns="true"
               data-pagination="true"
               data-search="true" style="display:block;">
            <thead>
            <tr>
				<!--<th data-field="img" data-sortable="true">Image</th>-->
                <th data-field="id" data-sortable="true">ID</th>
                <th data-field="name" data-sortable="true">Name</th>
				<th data-field="city" data-sortable="true">City</th>
				<th data-field="bedrooms" data-sortable="bedrooms">Bedrooms</th>
				<th data-field="bathrooms" data-sortable="bathrooms">Bedrooms</th>
				<th data-field="guests" data-sortable="true">Guests</th>
				<th data-field="pictures" data-sortable="true">Pictures</th>
				<th data-field="reviews" data-sortable="true">Reviews</th>
				<th data-field="type" data-sortable="type">Property Type</th>
				<th data-field="price" data-sortable="true">Price</th>
				<th data-field="rate" data-sortable="true">Rate</th>
            </tr>
            </thead>
			<tbody>

<?php



$days_offset = 7;
$day_range = $days_offset+0;

while($days_offset <= $day_range){


    $date = new DateTime();
    $date->modify("+$days_offset day");

    $checkin = $date->format("Y-m-d");

    $date->modify("+2 day");
    $checkout = $date->format("Y-m-d");

    $items_offset = 0;
    $section_offset = 5;
    $status = true;
    while( $status ){
      echo "<br> [ Starting GET for $checkin on  items_offset: $items_offset  ] <br>";
      $rv_array = getPropertiesForDate($checkin, $checkout, $items_offset, $section_offset);
      //$status = $rv_array['status'];

      sleep(rand(30, 120));

      if($status==false){
        //break;
      }

      echo "Returned: ".$rv_array['items_offset']."</br>";

      $section_offset = $rv_array['section_offset'];
      //$items_offset = $rv_array['items_offset'];
      $items_offset = $items_offset + rand(1, 50);

      echo "Passed: ".$items_offset."</br>";
      if($items_offset > 3000 ){
        $status = false;
        break;
      }
    }

    $days_offset++;
}

$response_array = array();

//dd($checkin);
//getPropertiesForDate($checkin, $checkout, $items_offset);

function getPropertiesForDate($checkin, $checkout, $items_offset, $section_offset ){
    // Specify your search query
    if( isset($_GET['query'])){
      $query = $_GET['query'];
    }else{
    	$query = "South Lake Tahoe";

    }
    $query = str_replace ( ' ', '%20', $query);

    $parameters = "version=1.3.9";

    $parameters .= "&satori_version=1.1.0";


    $parameters .= "&_format=for_explore_search_web";

    $parameters .= "&experiences_per_grid=0";

    $parameters .= "&items_per_grid=50";

    $parameters .= "&section_offset=$section_offset";
    if($items_offset > 0){
      $parameters .= "&items_offset=$items_offset";
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

    /*$parameters .= "&adults=1";
    $parameters .= "&children=0";
    $parameters .= "&infants=0";
    $parameters .= "&guests=1";
    $parameters .= "&toddlers=0";*/

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

    echo "<br>";
    //var_dump($json);
    echo "<br>";
    //dd($json);

    $rv_array['items_offset'] = $items_offset;
    $rv_array['section_offset'] = 5;


    if( ! isset( $json["explore_tabs"][0]["sections"][0]["listings"] ) ){
      //dd($json);
      echo "<br>failed";
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

    echo "section_offset: ".$rv_array['section_offset'] . "<br>";

    echo "server item offset: ".$rv_array['items_offset'] . "<br>";


    $listings = $json["explore_tabs"][0]["sections"][0]["listings"];


    //dd($listings);

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

      if( isset($listing["listing"]["room_and_property_type"]) ){
    	   $property = $listing["listing"]["room_and_property_type"];
      }

    	$price = $listing["pricing_quote"]["price_string"];
    	$rate = $listing["pricing_quote"]["rate_type"];

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


      $amenities = json_encode( $listing["listing"]["preview_amenity_names"] );
      $min_nights = $listing["listing"]["min_nights"];;
      $lat = $listing["listing"]["lat"];
      $lng = $listing["listing"]["lng"];

      $host_id = $listing["listing"]["user"]["id"];



      $date = new DateTime();

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


            DB::table('airbnb_rentals_2019_2020')->insertOrIgnore($accountInfo);

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
    return $rv_array;
  }

?>

		</tbody>
        </table>
		</div>

		<center>

			<br>
			Written by: <a href="" style="text-decoration:none;">blah blah</a> - 11/02/2018)

		</center>
        </div>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="https://autotrader-api.herokuapp.com/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://autotrader-api.herokuapp.com/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://autotrader-api.herokuapp.com/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://autotrader-api.herokuapp.com/js/mdb.min.js"></script>
    <!-- BST core JavaScript -->
    <script type="text/javascript" src="https://autotrader-api.herokuapp.com/js/bootstrap-table.min.js"></script>
</body>
<script>
$(document).ready(function(){
});
</script>
</html>
