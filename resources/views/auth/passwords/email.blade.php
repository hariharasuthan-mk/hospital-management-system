@extends('login.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">You forgot your password? Here you can easily retrieve a new password.</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                          <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                              </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>


                        </div>

                        <div class="row">
                          <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">  {{ __('Send Password Reset Link') }}</button>
                          </div>
                          <!-- /.col -->
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
