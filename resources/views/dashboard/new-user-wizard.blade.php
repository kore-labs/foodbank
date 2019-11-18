@extends('layouts.octopus-dashboard')

      @section('content')

        @include('octopus-components.account-setup')

      @endsection

      @section('page-specific-scripts')

        <!-- Specific Page Vendor -->
        <script src="/vendor/jquery-validation/jquery.validate.js"></script>
        <script src="/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
        <script src="/vendor/pnotify/pnotify.custom.js"></script>

        <!-- Example JS -->
        <script src="/javascripts/forms/examples.wizard.js"></script>

      @endsection
