@extends('admins.dashboard.app')
@section('title','users records')

@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10"> Management</h2>
					</div>
					<div class="d-flex w-500p">

                       <form action="{{ route('filterRecord')}}" method="GET">
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
 <button type="button" class="btn btn-info" ><a style="color: beige" href="{{ route('userRecord.create')}}">add </a></button>

                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Patient Name</th>
                                <th> day</th>
                                <th> med-condition</th>
                                <th> med-history</th>
                                <th> medicine</th>
                                <th> actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $user)
                            <tr>
                                <th scope="row">{{ $loop->index+1}}</th>
                               <td>{{$user->user->fname}}</td>
                               <td>{{date('d-m-Y', strtotime($user->registration_date))}}</td>
                               <td>{{$user->medical_condition}}</td>
                               <td>{{$user->medical_history}}</td>
                               <td>{{$user->mediciens}}</td>

                                <td>
        <button type="button" class="btn btn-info" ><a style="color: beige" href="{{ route('userRecord.edit',$user->id)}}">update</a></button>
            <form action="{{ route('userRecord.destroy',$user->id)}}" method="post"> 
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