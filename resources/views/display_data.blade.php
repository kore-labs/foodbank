

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


      $result = \DB::table('airbnb_rentals_2019_2020')->get()->count();
      echo "<br><h2>".$result."</h2>";
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
