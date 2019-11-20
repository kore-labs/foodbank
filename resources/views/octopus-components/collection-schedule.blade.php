  <?php

    $data = \DB::table('collection_site')->where('primaryCollectorId', auth()->user()->id )->orderBy('id', 'ASC')->get();

    //dd($data);
    $data_sorted_by_day = array(
      array(),array(),array(),
      array(),array(),array(), array()
    );

    foreach( $data as $item ){
      $day = $item->scheduled_collection_day;
      $data_sorted_by_day[ sortDays($day) ][] = $item ;
    }

    $lastDay = "null";
    $ol_flag = true;

    function sortDays($day){

      switch ($day) {
          case "Sunday":
              return 0;
              break;
          case "Monday":
              return 1;
              break;
          case "Tuesday":
              return 2;
              break;
          case "Wednesday":
              return 3;
              break;
          case "Thursday":
              return 4;
              break;
          case "Friday":
              return 5;
              break;
          case "Saturday":
              return 6;
              break;
      }


    }

   ?>

  <section>
  <h4 class="mb-xlg">Collection Schedule</h4>

  <div class="timeline timeline-simple mt-xlg mb-md">
    <div class="tm-body">

      @foreach ($data_sorted_by_day as $day)

        @foreach ($day as $item)


            @if( $lastDay != $item->scheduled_collection_day )

              <?php
                  $lastDay = $item->scheduled_collection_day;

                  if( !$ol_flag ){
                    $ol_flag = true;
                  }else{
                    echo "</ol>";
                    $ol_flag = false;
                  }
              ?>

              <div class="tm-title">
                <h3 class="h5 text-uppercase">{{ $item->scheduled_collection_day }}</h3>
              </div>

              <ol class="tm-items">


            @endif


            <li>
              <div class="tm-box">
                <p> {{ $item->scheduled_collection_day }} </p>
                <p class="text-muted mb-none">{{ $item->scheduled_collection_time }}</p>
                <p>
                  Business Name: {{ $item->business_name }}
                  <br>Address: {{ $item->business_address }}
                  <br>City: {{ $item->city }}
                  <br>State: {{ $item->state }}
                  <br>Zip: {{ $item->zip }}

                </p>

                <form method="post" action="/collection/defer">
                  @csrf
                  <input type="hidden" value="{{ $item->id }}" name="id">
                  <button type="submit"> Defer Collection </button>
                </form>
                <br>
                <form method="post" action="/collection/delete">
                  @csrf
                  <input type="hidden" value="{{ $item->id }}" name="id">
                  <button type="submit"> delete </button>
                </form>
              </div>




            </li>



            @endforeach

        @endforeach


    </div>
  </div>
</section>
