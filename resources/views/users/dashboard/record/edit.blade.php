@extends('users.dashboard.app')


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
					
					</div>
                </div>
                <!-- /Title -->
            </div>
            <!-- /Container -->


            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('record.update',$user->id)}}" method="POST">
                        @method('PUT')
                        @csrf

                        
                            <div class="col-md-6 form-group">
                 <label for="lastName"> register date : 
                   {{ old('registration_date',date('Y-m-d', strtotime($user->registration_date)))}}</label>
                   <input type="date" name="registration_date" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
               value="{{ old('registration_date',date('Y-m-d', strtotime($user->registration_date)))}}">                          
                   </div>
                                               @error('registration_date')
                                               <div class="alert alert-warning" role="alert">
                                               {{$message}}
                                                 </div>
                                               @enderror  
                   
                                     
                                             <div class="col-md-6 form-group">
                                               <label for="lastName"> condition</label>
                   <textarea type="" name="medical_condition" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
                   value="">  {{old('medical_condition',$user->medical_condition)}}  </textarea>                        
                   </div>
                                           @error('medical_condition')
                                           <div class="alert alert-warning" role="alert">
                                           {{$message}}
                                             </div>
                                           @enderror   
                                           
                                           <div class="col-md-6 form-group">
                                             <label for="lastName"> history</label>
                   <textarea type="" name="medical_history" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
                   value="">  {{old('medical_history',$user->medical_history)}}  </textarea>                        
                   </div>
                                         @error('medical_history')
                                         <div class="alert alert-warning" role="alert">
                                         {{$message}}
                                           </div>
                                         @enderror   
                                         
                                         <div class="col-md-6 form-group">
                                           <label for="lastName"> mediciens</label>
                   <textarea type="" name="mediciens" id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" 
                   value="">  {{old('mediciens',$user->mediciens)}}  </textarea>                        
                   </div>
                                       @error('mediciens')
                                       <div class="alert alert-warning" role="alert">
                                       {{$message}}
                                         </div>
                                       @enderror  
                                         
                      
                        
                        <button class="btn btn-primary" type="submit">update</button>
                    </form>
                </div>
            </div>

@endsection