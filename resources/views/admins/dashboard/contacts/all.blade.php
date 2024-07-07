@extends('admins.dashboard.app')


@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Doctors Management</h2>
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
 @if(Session('success'))

<div class="alert alert-success" role="alert">
{{Session('success')}}</div>
@endif

<section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">doctors Table</h5>
    <div class="row">
        <div class="col-sm">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th> email</th>
                                <th> subject</th>
                                <th> message</th>
                                
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $doctor)
                            <tr>
                                <th scope="row">{{ $loop->index+1}}</th>
                                <td>{{$doctor->name}}</td>
                               <td>{{$doctor->email}}</td>
                                <td>{{$doctor->subject}}</td>
                                <td>{{$doctor->msg}}</td>
                                <td>
  <button type="button" class="btn btn-info" ><a style="color: beige" href="{{ route('contacts.edit',$doctor->id)}}">update</a></button>
            <form action="{{ route('contacts.destroy',$doctor->id)}}" method="post"> 
                @csrf
                @method('Delete')
        <button type="submit" class="btn btn-warning" >delete</button>
            </form>
                                </td>     
                            </tr>
                            @endforeach
                           
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection