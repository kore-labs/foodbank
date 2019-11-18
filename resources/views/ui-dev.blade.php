@extends('layouts.story')

@section('content')

	@include('story-components.nav')

	@include('story-components.main-menu')

	@include('story-components.about')

	@include('story-components.how-our-service-works')

	@include('story-components.pricing')

	@include('story-components.farms')

	@include('story-components.customers')

	<!-- Dev content -->
	@include('story-components.additional-elements')

	@include('story-components.footer')

@endsection
