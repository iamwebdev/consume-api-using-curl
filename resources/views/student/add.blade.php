@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha256-xykLhwtLN4WyS7cpam2yiUOwr709tvF3N/r7+gOMxJw=" crossorigin="anonymous" />
<style type="text/css">
    .bigdrop {
    width: 270px !important;
}
.bg-white {
    background-color: #7f4c37 !important;
}
.card-header {
    background-color: rgb(127, 76, 55);color: white;
}
a {color: white!important;}
.btn-primary {
    color: #fff;
    background-color: #7f4c37;
    border-color: #7f4c37;
}
body {
        background: antiquewhite;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Student') }}<span style="float: right;"><a href="/student">View Student List</a></span></div>

                <div class="card-body">
                    <form method="POST" action="/student" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Student Code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') }}" required autocomplete="new-class">

                                @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="new-class">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Activity') }}</label>

                            <div class="col-md-6">
                                <select id="activity" class="bigdrop js-example-basic-multiple @error('activity') is-invalid @enderror" name="activity[]" multiple="multiple" required>
                                    <option value="">Please Select</option>
                                </select>
                                @error('activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Student') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @if(Session::has('success'))
                    <div id="alert" class="alert alert-success">
                        <strong>Success!</strong> {{  Session::get('success') }} 
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/activities.js') }}"></script>

<script type="text/javascript">
    setTimeout(()=>{
        $('#alert').hide()
    },2000)
</script>
@endsection    