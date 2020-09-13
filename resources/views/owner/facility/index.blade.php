@extends('layouts.owner_master')

@section('head')

@endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Facility</a></li>
              <li class="breadcrumb-item active">index</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Facility -->
    <section class="facility">
      <div class="row">
        @forelse($buildings as $building)
        <div class="col-12">
          <div class="card">
            <div class="card-header">Facility: <a href="{{route('building.edit',$building->id)}}">{{$building->name}}</a></div>
            <div class="card-body">
              <form action="{{route('facility.update',$building->facility->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Cooling Option </label>
                    <select name="cooling" value="" class="form-control">
                      <option value="Ac" {{$building->facility->cooling == 'Ac' ? 'selected' : '' }}>Ac</option>
                      <option value="Non Ac" {{$building->facility->cooling == 'Non Ac' ? 'selected' : '' }}>Non AC</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Bed Type</label>
                    <select name="bed_type" class="form-control" required>
                      <option value="Normal" {{$building->bed_type == 'Normal' ? 'selected' : ''}}>Normal</option>
                      <option value="Double Decker" {{$building->bed_type == 'Double Decker' ? 'selected' : ''}}>Double Decker</option>
                    </select>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Water Purifier </label>
                    <select name="water_purifier" value="" class="form-control">
                      <option value="No" {{$building->facility->water_purifier == 'No' ? 'selected' : '' }}>No</option>
                      <option value="Yes" {{$building->facility->water_purifier == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Electricity (hour)</label>
                    <select name="electricity" class="form-control" required>
                      <?php for($i=16; $i<=24; $i++ ) { ?>
                      <option value="{{$i}}" {{$building->facility->electricity == 'ah' ? 'selected' : ''}}>{{$i}} hour</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Wifi </label>
                    <select name="wifi" value="" class="form-control">
                      <option value="No" {{$building->facility->wifi == 'NO' ? 'selected' : '' }}>No</option>
                      <option value="Yes" {{$building->facility->wifi == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">CC TV</label>
                    <select name="cc_tv" class="form-control" required>
                      <option value="No" {{$building->facility->cc_tv == 'No' ? 'selected' : ''}}>No</option>
                      <option value="Yes" {{$building->facility->cc_tv == 'Yes' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Kitchen with gas </label>
                    <select name="kitchen_with_gas" value="" class="form-control">
                      <option value="No" {{$building->facility->kitchen_with_gas == 'No' ? 'selected' : '' }}>No</option>
                      <option value="Yes" {{$building->facility->kitchen_with_gas == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Parking Area</label>
                    <select name="parking" class="form-control" required>
                      <option value="No" {{$building->facility->parking == 'No' ? 'selected' : ''}}>No</option>
                      <option value="Yes" {{$building->facility->parking == 'Yes' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div> 
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Security Guard </label>
                    <select name="security_guard" value="" class="form-control">
                      <option value="No" {{$building->facility->security_guard == 'No' ? 'selected' : '' }}>No</option>
                      <option value="Yes" {{$building->facility->security_guard == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Water Supply (24 hour)</label>
                    <select name="water_supply" class="form-control" required>
                      <option value="Hot" {{$building->facility->water_supply == 'Hot' ? 'selected' : ''}}>No</option>
                      <option value="Cold" {{$building->facility->water_supply == 'Cold' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div> 
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Bathroom </label>
                    <select name="bathroom" value="" class="form-control">
                      <option value="Common" {{$building->facility->bathroom == 'Common' ? 'selected' : '' }}>Common</option>
                      <option value="In each room" {{$building->facility->bathroom == 'In each room' ? 'selected' : '' }}>In each room</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Washing Machine</label>
                    <select name="washing_machine" class="form-control" required>
                      <option value="No" {{$building->facility->washing_machine == 'No' ? 'selected' : ''}}>No</option>
                      <option value="Yes" {{$building->facility->washing_machine == 'Yes' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div> 
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="teresh">Teresh </label>
                    <select name="teresh" value="" class="form-control">
                      <option value="No" {{$building->facility->teresh == 'No' ? 'selected' : '' }}>No</option>
                      <option value="Yes" {{$building->facility->teresh == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Metress</label>
                    <select name="metress" class="form-control" required>
                      <option value="No" {{$building->facility->metress == 'No' ? 'selected' : ''}}>No</option>
                      <option value="Yes" {{$building->facility->metress == 'Yes' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div> 
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Chair/Table </label>
                    <select name="chair_table" value="" class="form-control">
                      <option value="No" {{$building->facility->chair_table == 'No' ? 'selected' : '' }}>No</option>
                      <option value="Yes" {{$building->facility->chair_table == 'Yes' ? 'selected' : '' }}>Yes</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="type">Wordrobe</label>
                    <select name="wordrobe" class="form-control" required>
                      <option value="No" {{$building->facility->wordrobe == 'No' ? 'selected' : ''}}>No</option>
                      <option value="Yes" {{$building->facility->wordrobe == 'Yes' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div> 
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Gate opening </label>
                    <input type="time" name="gate_opening" class="form-control" value="{{$building->facility->gate_closing}}" required>
                  </div>
                  <div class="col-md-6">
                    <label for="Name">Gate close at </label>
                    <input type="time" name="gate_closing" class="form-control" value="{{$building->facility->gate_closing}}" required>
                  </div> 
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Furnished/SemiFurnished </label>
                    <select name="furnished" class="form-control" required>
                      <option value="Furnished" {{$building->facility->furnished == 'Furnished' ? 'selected' : ''}}>Furnished</option>
                      <option value="SemiFurnished" {{$building->facility->furnished == 'SemiFurnished' ? 'selected' : ''}}>SemiFurnished</option>
                    </select>
                  </div> 
                  <div class="col-md-6">
                    <label for="Name">Food </label>
                    <select name="food" class="form-control food" required>
                      <option value="No" {{$building->facility->food == 'No' ? 'selected' : ''}}>No</option>
                      <option value="Yes" {{$building->facility->food == 'Yes' ? 'selected' : ''}}>Yes</option>
                    </select>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <label for="Name">Food time </label>
                    <div class="form-check">
                      <input name="breakfast" class="form-check-input food-time" type="checkbox" value="breakfast" id="breakfast" {{$building->facility->breakfast == 'breakfast' ? 'checked': ''}}>
                      <label class="form-check-label" for="breakfast">Breakfast</label>
                    </div>
                    <div class="form-check">
                      <input name="lunch" class="form-check-input food-time" type="checkbox" value="lunch" id="lunch" {{$building->facility->lunch == 'lunch' ? 'checked' :''}}>
                      <label class="form-check-label" for="lunch">Lunch</label>
                    </div>
                    <div class="form-check">
                      <input name="dinner" class="form-check-input food-time" type="checkbox" value="dinner" id="dinner" {{$building->facility->dinner == 'dinner' ? 'checked' :''}}>
                      <label class="form-check-label" for="dinner">Dinner</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="Name">Food type</label>
                    <select name="food_type" class="form-control food_type" required>
                      <option value="lacality based" {{$building->facility->food_type == 'lacality type' ? 'selected' : ''}}>lacality type</option>
                      <option value="mixed" {{$building->facility->food_type == 'mixed' ? 'selected' : ''}}>mixed</option>
                    </select>

                    <label for="Name">Sunday</label>
                    <select name="sunday" class="form-control sunday" required>
                      <option value="off" {{$building->facility->food_on_sunday == 'off' ? 'selected' : ''}}>off</option>
                      <option value="on" {{$building->facility->food_on_sunday == 'on' ? 'selected' : ''}}>on</option>
                    </select>
                  </div>
                </div>
                <div class="form-group d-flex">
                  <div class="col-md-6">
                    <input type="reset" class="btn btn-warning btn-block" value="Reset">
                  </div>
                  <div class="col-md-6">
                    <input type="submit" class="btn btn-primary btn-block" value="Update facility">
                  </div>
                </div>
              </form>           
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        @empty
        @endforelse
      </div>
      <!-- /.row -->
    </section>
    <!-- /.facility -->
  </div>

  <script>
    $(document).ready(function(){
      var food = $('.food').val();
      if(food == 'No'){
        $('.food-time').attr('disabled',true);
        $('.food_type').attr('disabled',true);
        $('.sunday').attr('disabled',true);
      }else{
        $('.food-time').removeAttr('disabled');
        $('.food_type').removeAttr('disabled');
        $('.sunday').removeAttr('disabled');
      }
      $(document).on('change','.food',function(){
        food = $(this).val();
        if(food == 'No'){
          $('.food-time').attr('disabled',true);
          $('.food_type').attr('disabled',true);
          $('.sunday').attr('disabled',true);
        }else{
          $('.food-time').removeAttr('disabled');
          $('.food_type').removeAttr('disabled');
          $('.sunday').removeAttr('disabled');
        }
      });
    });
  </script>

@endsection