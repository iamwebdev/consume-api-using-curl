@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Filter Student') }}<span style="float: right;"></div>
                <div class="card-body">
                    <form action="/student-filter" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                                        <select class="form-control" name="code">
                                            <option value="">Please Select</option>
                                            @if(isset($studentCodes))
                                                @foreach($studentCodes as $studentCode)
                                                    <option value="{{ $studentCode->code }}">{{ $studentCode->code }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Class') }}</label>
                                        <select class="form-control" name="class">
                                            <option value="">Please Select</option>
                                            @if(isset($standards))
                                                @foreach($standards as $standard)
                                                    <option value="{{ $standard->class }}">{{ $standard->class }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Activity') }}</label>

                                        <select name="activity[]" id="activity" class="bigdrop js-example-basic-multiple @error('activity') is-invalid @enderror"  multiple="multiple">
                                            <option value="">Please Select</option>
                                        </select>
                                        @error('activity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>    
                        </div>
                        
                        <div class="form-group">
                            <center><button type="submit" class="btn btn-primary">Filter</button></center>
                        </div>
                    </form>
                </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Students</div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Code</th>
                                    <th>Activies</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($studentList))
                                @php $i = 1; @endphp
                                    @foreach($studentList as $student) 
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->class }}</td>
                                            <td>{{ $student->code }}</td>
                                            <td>{{ $student->activity }}</td>
                                            <td><a href="/student/{{ $student->id }}/edit" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @php $i++; @endphp    
                                    @endforeach
                                @endif      
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Code</th>
                                    <th>Activies</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
        </div>

</div>

@endsection
@section('scripts')
<script src="{{ asset('js/datatable.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/activities.js') }}"></script>
@endsection
