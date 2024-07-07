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
						
					
					</div>
                </div>
                <!-- /Title -->

            </div>
            <!-- /Container -->


            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('userRecord.store')}}" method="POST" >
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
           <label for="lastName"> register date</label>
<input type="date" name="registration_date" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
required value="">                            
</div>
                            @error('registration_date')
                            <div class="alert alert-warning" role="alert">
                            {{$message}}
                              </div>
                            @enderror  

                  
                          <div class="col-md-6 form-group">
                            <label for="lastName"> condition</label>
<textarea type="" name="medical_condition" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
value="">  {{old('medical_condition')}}  </textarea>                        
</div>
                        @error('medical_condition')
                        <div class="alert alert-warning" role="alert">
                        {{$message}}
                          </div>
                        @enderror   
                        
                        <div class="col-md-6 form-group">
                          <label for="lastName"> history</label>
<textarea type="" name="medical_history" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
value="">  {{old('medical_history')}}  </textarea>                        
</div>
                      @error('medical_history')
                      <div class="alert alert-warning" role="alert">
                      {{$message}}
                        </div>
                      @enderror   
                      
                      <div class="col-md-6 form-group">
                        <label for="lastName"> mediciens</label>
<textarea type="" name="mediciens" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
value="">  {{old('mediciens')}}  </textarea>                        
</div>
                    @error('mediciens')
                    <div class="alert alert-warning" role="alert">
                    {{$message}}
                      </div>
                    @enderror  
                      

                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>

@endsection