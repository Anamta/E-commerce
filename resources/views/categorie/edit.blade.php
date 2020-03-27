@extends('master')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Category
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Category</li>
          </ol>
        </section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
        </div>
        <div class="box-body">

        <form action="{{route('category.update',['id'=>$categories->id])}}" method="POST">

        @csrf

        <div class="field_wrapper">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control"  value="{{$categories->name}}">
                    <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                </div>
            </div>

        </div>
        <br><br>
        <div class="col-md-6 col-md-offset-5">
            <a href="{{route('welcome')}}" class="btn btn-primary">Back</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary ">
                    Update
            </button>
        </div>
        </form>
        </div>
    </div>


</div>

      </div>

</section>
</div>

@endsection
