@extends('admin.layout')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1>Class</h1>
    </div>
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Class</li>
    </ol>
    </div>
    </div>
    </div>
    </section>

    <section class="content">
    <div class="container-fluid">
    <div class="row">

    <div class="col-md-12">

    <div class="card card-primary">
        @if (Session::has('success'))
          <div class="alert alert-success">
            {{ Session::get('success') }}
          </div>
        @endif
    <div class="card-header">
    <h3 class="card-title">Update Class</h3>
    </div>


    <form action="{{ route('class.update') }}" method="POST">
        @csrf
    <div class="card-body">
        <input type="hidden" name="id" value="{{ $class->id }}"/>
    <div class="form-group">
    <label for="exampleInputEmail1">Class Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter class name" value="{{ old('name',$class->name) }}">
    </div>
     @error('name')
       <p class="text-danger">{{ $message }}</p>
     @enderror
    </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Update class</button>
    </div>
    </form>
    </div>


    </div>


    </div>

    </div>
    </section>

    </div>
@endsection

