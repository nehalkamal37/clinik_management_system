@extends('admins.dashboard.app')


@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">patient Management</h2>
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
                  <form method="POST" action="{{ route('userprofile.update',$user->id) }}">
                    @csrf   
                    @method('PUT')                
                   <div class="row gy-3 overflow-hidden">
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="fname" value="{{old('fname',$user->fname)}}" id="firstName" placeholder="First Name" required>
                        <label for="firstName" class="form-label">First Name</label>
                      </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" value="{{old('lname',$user->lname)}}" name="lname" id="firstName" placeholder="First Name" required>
                          <label for="firstName" class="form-label">Last Name</label>
                        </div>
                      </div>
                  
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" value="{{old('email',$user->email)}}" id="email" placeholder="name@example.com" required>
                        <label for="email" class="form-label">Email</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password"  id="password" value="" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                      </div>
                    </div>

                      
                
                        <div>
                            <x-input-label for="name" :value="__('phone')" />
                            <input id="name" class="block mt-1 w-full" type="text" value="{{old('phone',$user->phone)}}" name="phone" :value="old('phone')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                                      
                                      </div>
                                 
                        <button class="btn btn-primary" type="submit">update</button>
                    </form>
                </div>
            </div>

@endsection