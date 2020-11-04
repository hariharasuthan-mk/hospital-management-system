@extends('backend.layout')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Hospital</th>
      <th>Status</th>
      <th>Author On</th>
      <th>Updated On</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td> {{ $hospitals_data->name }} </td>
            <td>{{ $hospitals_data->status }}</td>
            <td>
              {{date('d-m-Y H:i:s', strtotime($hospitals_data->created_at))}}
            </td>
            <td>
              {{date('d-m-Y H:i:s', strtotime($hospitals_data->updated_at))}}
            </td>
        </tr>
  </tbody>
</table>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <a class="btn btn-primary" href="/hospitals" role="button">Go to Hospital List</a>
  </div>
</div>

@endsection
