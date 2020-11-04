@extends('backend.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3 class="card-title">{{$title }}</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            @if(!empty($user_organization))
                <strong>Hospital/Organization:</strong>
                @foreach($user_organization as $data)
                <label class="badge badge-success">{{ $data->name }}</label>
                @endforeach
            @endif


        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            @if(!empty($phone1))
                <strong>Primary Contact Details:</strong>
                <label class="badge badge-success">{{ $phone1 }}</label>
            @endif

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            @if(!empty($phone2))
                <strong>Secondary Contact number:</strong>
                <label class="badge badge-success">{{ $phone2 }}</label>
            @endif
        </div>
    </div>

</div>


@endsection
