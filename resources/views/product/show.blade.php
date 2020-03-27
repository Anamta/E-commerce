@extends('master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Product
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Setup</a></li>
          <li class="active">Product</li>
        </ol>
      </section>
<div class="right-side">
  <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data</h3>
                    <a href="{{route('product.create')}}" class="btn btn-info pull-right">Add Product</a>
                    {{-- <button onclick="myFunction()" class="btn btn-info pull-right noprint" >Print this page</button> --}}
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>S:No</th>
                            <th>Category Name</th>
                            <th>Sub Category Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Product Description</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Actions</th>

                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td> 
                            <td>{{$product->subcategorie->categorie->name}}</td>
                            <td>{{$product->subcategorie->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td><img src={{asset($product->image)}} style="height:30px;width:30px;"></td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td><a href="{{route('product.delete',['id'=> $product->id])}}"><i class="glyphicon glyphicon-trash"></i> </a>
                                <a href="{{route('product.edit',['id'=> $product->id])}}"><i class="glyphicon glyphicon-pencil"></i></a>
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