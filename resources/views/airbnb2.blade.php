

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




  $days = 7;
  $date = new DateTime();
  $date->modify("+$days day");

  $checkin = $date->format("Y-m-d");

  $number_of_nights = 2;
  $date->modify("+$number_of_nights day");
  $checkout = $date->format("Y-m-d");


    $items_offset =1;
    $status = true;
    /*while( $status ){
      $status = getPropertiesForDate($checkin, $checkout, $items_offset);
      $items_offset +=50;
      sleep(1);
    }*/

    $status = getPropertiesForDate($checkin, $checkout, $items_offset);




function getPropertiesForDate($checkin, $checkout, $items_offset){


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
    $parameters .= "&section_offset=0";
    $parameters .= "&items_offset=$items_offset";

    $parameters .= "&guidebooks_per_grid=0";
    $parameters .= "&auto_ib=true";
    $parameters .= "&fetch_filters=true";
    $parameters .= "&has_zero_guest_treatment=false";
    $parameters .= "&is_guided_search=true";
    $parameters .= "&is_new_cards_experiment=true";
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

    //$parameters .= "&adults=1";
    //$parameters .= "&children=0";
    //$parameters .= "&infants=0";
    //$parameters .= "&guests=1";
    //$parameters .= "&toddlers=0";

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
    $listings = $json["explore_tabs"][0]["sections"][0]["listings"];

    if( $response == null ){
      return false;
    }
    //dd($listings);

    // Itirate through all the results and display them in a table
    foreach($listings as $listing){
    	// Store our variables from each listing
    //dd($listing);
    	$id = $listing["listing"]["id"];
    	$beds = $listing["listing"]["beds"];
    	$bathrooms = $listing["listing"]["bathrooms"];
    	$bedrooms = $listing["listing"]["bedrooms"];
    	$name = $listing["listing"]["name"];
    	//$neighborhood = $listing["listing"]["neighborhood"];
      $neighborhood = str_replace ( '%20', ' ', $query);

    	$city = $listing["listing"]["city"];
    	$persons = $listing["listing"]["person_capacity"];
    	//$pictures = $listing["listing"]["picture_count"];
    	//$picture = $listing["listing"]["picture_url"];
    	$reviews = $listing["listing"]["reviews_count"];
    	$property = $listing["listing"]["room_and_property_type"];

    	$price = $listing["pricing_quote"]["price_string"];
    	$rate = $listing["pricing_quote"]["rate_type"];

      $rate_with_service_fee = $listing["pricing_quote"]["rate_with_service_fee"]["amount"];
      $amenities = json_encode( $listing["listing"]["preview_amenity_names"] );
      $min_nights = $listing["listing"]["min_nights"];;


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
                      "rate"=>$rate,
                      "rate_with_service_fee"=>$rate_with_service_fee,
                      "city"=>$city,
                      "min_nights"=>$min_nights,
                      "amenities"=>$amenities,
                      "checkin"=>$checkin,
                      "checkout"=>$checkout
                      //"state"=>$aRequest->input('state'),
                      //"zip"=> $aRequest->input('zip'),
                      ];


            DB::table('airbnb_rentals')->insertOrIgnore($accountInfo);

          }

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
