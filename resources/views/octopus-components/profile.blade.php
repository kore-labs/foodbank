
<div class="row" style="position:relative; top:-45px;">
  <div class="col-md-4 col-lg-3">

    <section class="panel">
      <div class="panel-body">
        <div class="thumb-info mb-md">
          <img src="/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
          <div class="thumb-info-title">
            <span class="thumb-info-inner">{{ auth()->user()->name }}</span>

          </div>

        </div>
        <div>
          <p>
              <?php
                $data = \DB::table('account_info')->where('email', auth()->user()->email )->first();
               ?>

              Business Name: {{ $data->business_name }}
          </p>
          <p>
            Address: <br>{{ $data->business_address }}, {{ $data->city }} {{ $data->state }}, {{ $data->zip }}
          </p>


        </div>





      </div>
    </section>


        <h4 class="mb-md">Collection Stats</h4>
        <ul class="simple-card-list mb-xlg">
          <li class="primary">
            <h3>0</h3>
            <p>Collections Made</p>
          </li>
          <li class="primary">
            <h3>$0.00</h3>
            <p>of food saved.</p>
          </li>
          <li class="primary">
            <h3>0</h3>
            <p>Collections Deferred</p>
          </li>
        </ul>




  </div>


  <div class="col-md-8 col-lg-6">


    <div class="tabs">
      <ul class="nav nav-tabs tabs-primary">
        <li class="active">
          <a href="#overview" data-toggle="tab">Overview</a>
        </li>
        <li>
          <a href="#edit" data-toggle="tab">Edit</a>
        </li>
      </ul>
      <div class="tab-content">
        <div id="overview" class="tab-pane active">

          <h4 class="mb-md">Add Collection Location to Schedule </h4>

          <br>
            <form method="post" action="/collection/add-location" id="locationForm">
              @csrf
              <fieldset>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="business-name">Business Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="business-name" name="business-name">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="fullname">Contact Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="fullname" name="fullname">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="day">Collection Day</label>
                  <div class="col-md-6" id="day">
                    <select name="day">
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                      <option value="Sunday">Sunday</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label" for="time">Collection Time</label>
                  <div class="col-md-6">
                    <input type="time" class="form-control" id="time" name="time">
                  </div>
                </div>

              </fieldset>

<hr>
              <h4 class="mb-md"> Location </h4>

              <fieldset>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="address">Address</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="address" name="address">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="city">City</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="city" name="city">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="state">State</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="state" name="state">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="zip">Zip</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="zip" name="zip">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="lat">Latitude</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="lat" name="lat">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label" for="long">Longitude</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="long" name="long">
                  </div>
                </div>
              </fieldset>
              <br>
            </form>
            <section class="simple-compose-box mb-xlg">

            <div class="compose-box-footer">
              <ul class="compose-toolbar">

                <li>
                  <a href="#"><i class="fa fa-map-marker"></i></a>
                </li>
              </ul>
              <ul class="compose-btn">
                <li>
                  <a class="btn btn-primary btn-xs" onclick="submitForm()" >Add Location</a>
                </li>
              </ul>
            </div>

          </section>

          <script>

            function submitForm(){

                document.getElementById('locationForm').submit();

            }

          </script>


        </div>





        <div id="edit" class="tab-pane">

          <form class="form-horizontal" method="get">
            <h4 class="mb-xlg">Personal Information</h4>
            <fieldset>
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileFirstName">First Name</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="profileFirstName">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileLastName">Last Name</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="profileLastName">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileAddress">Address</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="profileAddress">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileCompany">Company</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="profileCompany">
                </div>
              </div>
            </fieldset>
            <hr class="dotted tall">
            <h4 class="mb-xlg">About Yourself</h4>
            <fieldset>
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
                <div class="col-md-8">
                  <textarea class="form-control" rows="3" id="profileBio"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-xs-3 control-label mt-xs pt-none">Public</label>
                <div class="col-md-8">
                  <div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
                    <input type="checkbox" checked="" id="profilePublic">
                    <label for="profilePublic"></label>
                  </div>
                </div>
              </div>
            </fieldset>
            <hr class="dotted tall">
            <h4 class="mb-xlg">Change Password</h4>
            <fieldset class="mb-xl">
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="profileNewPassword">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" id="profileNewPasswordRepeat">
                </div>
              </div>
            </fieldset>
            <div class="panel-footer">
              <div class="row">
                <div class="col-md-9 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>



  </div>


  <div class="col-md-12 col-lg-3">

    @include('octopus-components.collection-schedule')

  </div>

</div>
