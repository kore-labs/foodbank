<!doctype html>
<html class="fixed sidebar-left-collapsed">

	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>{{ config('app.name', 'AirBNB-Spider') }}</title>
		<meta name="keywords" content="{{ config('app.name', 'AirBNB-Spider') }}" />
		<meta name="description" content="{{ config('app.name', 'AirBNB-Spider') }} - Table to Farm food waste collection">
		<meta name="author" content="{{ config('app.name', 'AirBNB-Spider') }}.org">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/vendor/bootstrap-datepicker/css/datepicker3.css" />

		@yield('page-specific-styles')


		<!-- Theme CSS -->
		<link rel="stylesheet" href="/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
		    @include('octopus-components.header')
			<!-- end: header -->

			<div class="inner-wrapper">

				<!-- start: sidebar -->
				@include('octopus-components.sidebar')
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header"></header>

					<!-- start: page -->
          @yield('content')
					<!-- end: page -->

				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="/vendor/jquery/jquery.js"></script>
		<script src="/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="/vendor/jquery-autosize/jquery.autosize.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/javascripts/theme.init.js"></script>

		@yield('page-specific-scripts')


	</body>
</html>
