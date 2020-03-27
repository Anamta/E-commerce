@extends('master')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            SubCategory
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">SubCategory</li>
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

        <form action="{{route('sub_category.store')}}" method="POST">

        @csrf

        <div class="field_wrapper">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control"  >
                    <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="inputcategoryid">Category Id:</label>
                <Select name="category_id" class="form-control">                          
                  <option value="Category">Select Category Type</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach  
                </Select>  
              </div>

        </div>
        <br><br>
        <div class="col-md-6 col-md-offset-5">
            <a href="{{route('welcome')}}" class="btn btn-primary">Back</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary ">
                    Create
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
