@extends('layouts.app')

@section('content')
    <x-breadcrumb />
    <div class="card">
        <div class="card-body">
            <!-- This is Home || {{ Auth::user()->isAuthor() ? "yes" : "no" }} -->
            <form action="{{route('homeupload')}}" enctype="multipart/form-data" method="post" >
                @csrf
                <input type="file" @class('form-control form-control-lg mb-3') name="photo" >
                <button class="btn btn-primary">upload</button>
            </form>
        </div>
    </div>
@endsection
