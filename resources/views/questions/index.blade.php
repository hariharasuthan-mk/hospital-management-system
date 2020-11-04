@extends('backend.layout')

@section('content')
          @can('question-create')
          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="">
                    <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New question</a>
                  </div>
              </div>
          </div>
          @endcan

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
                <table id="all-question-list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Question</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th data-orderable="false" width="280px">Action</th>
                  </tr>
                  </thead>
                 <tbody>
                 @foreach ($question_data as $key => $question)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $question->name }}</td>
                    <td>{{ $question->requested }}</td>
                      @if($question->status =='yes')
                    <td class="table-success">{{ $question->status }}</td>
                      @else
                    <td class="table-danger">{{  $question->status }}</td>
                      @endif
                    <td>{{$question->created_at}}</td>
                    <td>{{$question->updated_at}}</td>
                    <td>
                       <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a>
                       @can('question-edit')
                       <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">Edit</a>
                       @endcan
                       @can('question-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['questions.destroy', $question->id],'style'=>'display:inline']) !!}
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
                   <th>Question</th>
                   <th>Author</th>
                   <th>Status</th>
                   <th>Created At</th>
                   <th>Updated At</th>
                   <th>Action</th>
                 </tr>
                 </tfoot>
                </table>
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                       {!! $question_data->render() !!}
                    </div>
                  </div>
                </div>
              </div>
          </div>
@endsection
