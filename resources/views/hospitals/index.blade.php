@extends('backend.layout')

@section('title', $title)

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $title }}</h2>
            </div>
            <div class="pull-right">
                @can('hospital-create')
                <a class="btn btn-success" href="{{ route('hospitals.create') }}"> Create New hospital</a>
                @endcan
            </div>
        </div>
    </div>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <!--<th>#</th>-->
      <th>Hospital</th>
      <th>Author</th>
  <!--<th>Status</th>-->
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hospital_data as $hospital)
        <tr>
            <td><a href="hospitals/{{$hospital->id}}">
              {{ $hospital->name }}</a></td>
            <th>{{ $hospital->authorby }}</th>
            <td>
               <form action="{{ route('hospitals.destroy',$hospital->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('hospitals.show',$hospital->id) }}">Show</a>
                    @can('hospital-edit')
                    <a class="btn btn-primary" href="{{ route('hospitals.edit',$hospital->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('hospital-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
    @endforeach

  </tbody>

</table>
<div>{{ $hospital_data->links() }}</div>
@endsection
