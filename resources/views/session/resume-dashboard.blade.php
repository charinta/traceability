@extends('layouts.user_type.guest')

@section('content')
    <div class="row justify-content-center">
        <div class="card card-plain col-4">
            <a href="{{ url('resume-tool') }}" class="btn btn-icon btn-2 btn-primary" type="button">
                <br>
                <span class="btn-inner--icon"><i class="fa fa-wrench fa-3x"></i></span>
                <br><br>
                <p>Resume Tool</p>
            </a>
        </div>
        <div class="card card-plain col-4">
            <a href="{{ url('resume-holder') }}" class="btn btn-icon btn-2 btn-primary" type="button">
                <br>
                <span class="btn-inner--icon"><i class="fa fa-toolbox fa-3x"></i></span>
                <br><br>
                <p>Resume Holder</p>
            </a>
        </div>
    </div>
@endsection
