@extends('master')

@section('content')
<div class="content-wrapper">
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
<div class="right-side">
  <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data</h3>
                    <a href="{{route('category.create')}}" class="btn btn-info pull-right">Add Category</a>
                    {{-- <button onclick="myFunction()" class="btn btn-info pull-right noprint" >Print this page</button> --}}
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>S:No</th>
                            <th>Category Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>

                        </tr>
                        @foreach($categories as $categorie)
                        <tr>
                            <td>{{$categorie->id}}</td> 
                            <td>{{$categorie->name}}</td>
                            <td>{{$categorie->created_at}}</td>
                            <td>{{$categorie->updated_at}}</td>
                            <td><a href="{{route('category.delete',['id'=> $categorie->id])}}"><i class="glyphicon glyphicon-trash"></i> </a>
                                <a href="{{route('category.edit',['id'=> $categorie->id])}}"><i class="glyphicon glyphicon-pencil"></i></a>
                            </td>
                        </tr>    
                        @endforeach
                    </table>
                    
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
</div>
@endsection