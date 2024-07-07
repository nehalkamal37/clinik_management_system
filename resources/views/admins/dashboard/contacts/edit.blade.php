@extends('admins.dashboard.app')


@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">data Management</h2>
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
						
					</div>
                </div>
                <!-- /Title -->

                <!-- Row -->
               
                <!-- /Row -->
            </div>
            <!-- /Container -->


            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('contacts.update',$data->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="firstName"> name</label>
                                <input class="form-control" id="firstName" name="name" placeholder="" value="{{old('name',$data->name)}}" type="text">
                            </div>
                            @error('name')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  

                        </div>
                     
                       

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" placeholder="" value="{{old('email',$data->email)}}" name="email" type="email">
                        </div>
                        @error('email')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  

                        <div class="form-group">
                            <label for="email">subject</label>
                            <input class="form-control" name="subject" value="{{old('subject',$data->subject)}}" placeholder="" type="">
                        </div>
                        @error('subject')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  

                        <div class="form-group">
                            <label for="address">message</label>
                            <input class="form-control" name="msg" value="{{old('msg',$data->msg)}}" type="text">
                        </div>
                        @error('msg')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror  
                        
                       

                        

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>

@endsection