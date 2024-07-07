@extends('admins.dashboard.app')


@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">users appointments</h2>
					</div>
					<div class="d-flex w-500p">
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">Latest Products</option>
							<option value="1">CRM</option>
							<option value="2">Projects</option>
							<option value="3">Statistics</option>
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

            </div>
            <!-- /Container -->


            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('userAppointment.store')}}" method="POST" >
                        @csrf
                        <div class="row">
                          <div class="col-md-6 form-group">
                          <select name="user_id" class="" aria-label=".form-select-sm example">
                            <option selected>choose the user</option>
                            @foreach($users as $user)
                          
                            <option value="{{ $user->id}}">{{$user->fname.' '.$user->lname}}</option>
                            
                            @endforeach
                          </select>
                          </div>
                            @error('user_id')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  
                        </div>

                            <div class="col-md-6 form-group">
           <label for="lastName"> appointments dates</label>
<input type="date" name="day" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
required value="">                            
</div>
                            @error('day')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  

                            <div class="col-md-6 form-group">
                              <label for="lastName"> start time</label>
<input type="time" name="hour" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
required value="">                            
</div>
                          @error('hour')
                          <div class="alert alert-warning" role="alert">
                          {{$message}}
                            </div>
                          @enderror  
                      

                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>

@endsection