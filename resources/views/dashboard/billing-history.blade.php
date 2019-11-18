@extends('layouts.octopus-dashboard')

      @section('page-specific-styles')
        <!-- Specific Page Vendor CSS -->
      @endsection


      @section('content')

         @include('octopus-components.bill')

        {{-- @include('octopus-components.bill-list') --}}
      @endsection


      @section('page-specific-scripts')
        <!-- page specific vendor -->
      @endsection
