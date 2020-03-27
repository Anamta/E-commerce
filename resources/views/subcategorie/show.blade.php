@extends('master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Sub Category
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Setup</a></li>
          <li class="active">Sub Category</li>
        </ol>
      </section>
<div class="right-side">
  <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data</h3>
                    <a href="{{route('sub_category.create')}}" class="btn btn-info pull-right">Add Sub Category</a>
                    {{-- <button onclick="myFunction()" class="btn btn-info pull-right noprint" >Print this page</button> --}}
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>S:No</th>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>

                        </tr>
                        @foreach($subcategories as $subcategorie)
                        <tr>
                            <td>{{$subcategorie->id}}</td> 
                            <td>{{$subcategorie->name}}</td>
                            <td>{{$subcategorie->categorie->name}}</td>
                            <td>{{$subcategorie->created_at}}</td>
                            <td>{{$subcategorie->updated_at}}</td>
                            <td><a href="{{route('sub_category.delete',['id'=> $subcategorie->id])}}"><i class="glyphicon glyphicon-trash"></i> </a>
                                <a href="{{route('sub_category.edit',['id'=> $subcategorie->id])}}"><i class="glyphicon glyphicon-pencil"></i></a>
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