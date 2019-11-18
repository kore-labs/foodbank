@extends('layouts.octopus-dashboard')

      @section('page-specific-styles')
        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="/vendor/summernote/summernote.css" />
        <link rel="stylesheet" href="/vendor/summernote/summernote-bs3.css" />
      @endsection


      @section('content')
        @include('octopus-components.mail-box-expanded')
      @endsection


      @section('page-specific-scripts')
        <!-- page specific vendor -->
        <script src="/vendor/summernote/summernote.js"></script>

      @endsection
