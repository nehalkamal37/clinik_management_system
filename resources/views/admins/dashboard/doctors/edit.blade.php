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
                    <form action="{{ route('doctors.update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="firstName"> name</label>
                                <input class="form-control" id="firstName" name="name" placeholder="" value="{{old('name',$doctor->name)}}" type="text">
                            </div>
                            @error('name')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  

                            <div class="col-md-6 form-group">
                                <label for="lastName"> description</label>
                                <input class="form-control" id="lastName" name="small_desc" placeholder="" value="{{old('small_desc',$doctor->small_desc)}}" type="text">
                            </div>
                            @error('small_desc')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <input class="form-control"  placeholder="" type="file" name="doc_image">
                        </div>
                        @error('doc_image')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  
                       

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" placeholder="" value="{{old('email',$doctor->email)}}" name="email" type="email">
                        </div>
                        @error('email')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  

                        <div class="form-group">
                            <label for="email">Password</label>
                            <input class="form-control" name="password" value="{{old('password',$doctor->password)}}" placeholder="Password" type="password">
                        </div>
                        @error('password')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  

                        <div class="form-group">
                            <label for="address">phone</label>
                            <input class="form-control" name="phone" value="{{old('phone',$doctor->phone)}}" type="text">
                        </div>
                        @error('phone')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  
                        
                        <div class="form-group">
                            <label for="input_tags">department</label>
                            <input class="form-control" type="text" name="doc_department" value="{{ old('doc_department',$doctor->doc_department)}}" type="text">
                        </div>
                        @error('doc_department')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  

                        <div class="form-check">
                            <input class="form-check-input" value="male" type="radio" name="gender" id="flexRadioDefault1">
                            <label class="form-check-label"  for="flexRadioDefault1">
                           male
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" value="female" type="radio" name="gender" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">
                           female  
                          </label>
                          @error('gender')
                          <div class="alert alert-warning" role="alert">
                          {{$message}}
                            </div>
                          @enderror  
                          </div>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>

@endsection