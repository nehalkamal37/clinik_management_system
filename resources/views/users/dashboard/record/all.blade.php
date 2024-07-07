@extends('users.dashboard.app')


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

                       <form action="{{ route('filterUser')}}" method="GET">
                            @csrf
						<input name="user_id" placeholder="search for user" class="form-control custom-select custom-select-sm mr-15">
                           
                        <button type="submit" class="btn btn-info" ><a style="color: beige">find </a></button>
                            
                        </form>
						
					</div>
                </div>
                <!-- /Title -->
            </div>
            <!-- /Container -->
 @if(Session('success'))

<div class="alert alert-success" role="alert">
{{Session('success')}}</div>
@endif

<section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">data Table</h5>
    <div class="row">
        <div class="col-sm">
            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>medical_condition</th>
                                <th>medical_history</th>
                                <th> registration_date</th>
                                <th> mediciens</th>
                                <th>actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            
                              @foreach($data as $u)

                                <th scope="row"></th>
                               <td>{{$u->medical_condition}}</td>
                               <td>{{$u->medical_history}}</td>
                               <td>{{$u->registration_date}}</td>
                               <td>{{$u->mediciens}}</td>
                              
                                <td>
        <button type="button" class="btn btn-info" ><a style="color: beige" href="{{ route('record.edit',$u->id)}}">update</a></button>
            <form action="{{ route('record.destroy',$u->id)}}" method="post"> 
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