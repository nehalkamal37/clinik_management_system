@extends('admins.dashboard.app')


@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Doctor Management</h2>
					</div>
					<div class="d-flex w-500p">
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">Latest Products</option>
							<option value="1">CRM</option>
							<option value="2">Projects</option>
							<option value="3">Statistics</option>
						</select>
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">USA</option>
							<option value="1">USA</option>
							<option value="2">India</option>
							<option value="3">Australia</option>
						</select>
						<select class="form-control custom-select custom-select-sm">
							<option selected="">December</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="1">April</option>
							<option value="2">May</option>
							<option value="3">June</option>
							<option value="1">July</option>
							<option value="2">August</option>
							<option value="3">September</option>
							<option value="1">October</option>
							<option value="2">November</option>
							<option value="3">December</option>
						</select>
					</div>
                </div>
                <!-- /Title -->

                <!-- Row -->
               
                <!-- /Row -->
            </div>
            <!-- /Container -->


            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('doctorsAppointments.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-6 form-group">

    <select name="doctor_id" class="" aria-label=".form-select-sm example">
                            <option selected>choose the doctor</option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id}}">{{$doctor->name}}</option>
                            
                            @endforeach
                          </select>
                          </div>
                            @error('doctor_id')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  
                        </div>

                            <div class="col-md-6 form-group">
           <label for="lastName"> appointments dates</label>
<input type="date" name="appointment_time" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
required value="">                            
</div>
                            @error('appointment_time')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  

                            <div class="col-md-6 form-group">
                              <label for="lastName"> start time</label>
<input type="time" name="start_time" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
required value="">                            
</div>
                          @error('start_time')
                          <div class="alert alert-warning" role="alert">
                          {{$message}}
                            </div>
                          @enderror  
                          <div class="col-md-6 form-group">
                            <label for="lastName"> end time</label>
<input type="time" name="end_time" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
required value="">                            
</div>
                        @error('end_time')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  
                        
                      
                       

                      

                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>

@endsection