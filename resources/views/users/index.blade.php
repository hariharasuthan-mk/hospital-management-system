@extends('backend.layout')

@section('content')
          
        <div class="row">
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>

                <p>New Enquiry</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paperplane"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>3</h3>

                <p>Doctors</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people-outline"></i>
              </div>
              <a href="{{ route('users.create',['role' => 'Patient']) }}" class="small-box-footer">Add New Patience<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>8</h3>

                <p>Registered User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('users.create') }}" class="small-box-footer">Add User <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>2</h3>

                <p>Patients</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
              <a href="{{ route('users.index',['role' => 'Patient']) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          


        </div>

        <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="">
                      <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                  </div>
              </div>
          </div>


          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
          @endif

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$title }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="all-user-list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>                    
                    <th>Created On</th>
                    <th>Updated On</th>
                    <th data-orderable="false" width="280px">Action</th>
                  </tr>
                  </thead>
                 <tbody>
                 @foreach ($data as $key => $user)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                           <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                      @endif
                    </td>                    
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                       @can('user-edit')
                       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                       @endcan
                       @can('user-delete') 
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      @endcan
                    </td>
                  </tr>
                 @endforeach
                 </tbody>
                 <tfoot>
                 <tr>
                   <th>No</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Roles</th>
                   <th>Created On</th>
                   <th>Updated On</th>
                   <th width="auto;">Action</th>
                 </tr>
                 </tfoot>
                </table>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                       {!! $data->render() !!}
                    </div>
                  </div>
                </div>
              </div>
          </div>
@endsection
