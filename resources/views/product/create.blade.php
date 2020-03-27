<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@extends('master')

@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
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

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
        </div>
        <div class="box-body">

        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="field_wrapper">

          <div class="form-group col-md-6">
            <label for="inputsubcategoryid">Category :</label>
            <Select name="sub_category_id" class="form-control category">
              <option value="SubCategory">Select Category Type</option>
                @foreach ($categorie as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </Select>
          </div>



          <div class="form-group col-md-6">
            <label for="inputsubcategoryid">SubCategory Id:</label>
            <Select name="sub_category_id" class="form-control sub_category">
              <option value="SubCategory">Select SubCategory Type</option>
                {{--  @foreach ($subcats as $subcat)
                  <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                @endforeach  --}}
            </Select>
          </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control"  >
                    <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" class="form-control"  >
                    <span class="text-danger">{{$errors->first('price') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" name="image" class="form-control"  >
                    <span class="text-danger">{{$errors->first('image') ?? null}}</span>
                </div>
            </div>

            {{-- <div class="form-group col-md-6">
                <label for="inputsubcategoryid">SubCategory Id:</label>
                <Select name="sub_category_id" class="form-control">                          
                  <option value="SubCategory">Select SubCategory Type</option>
                    @foreach ($subcats as $subcat)
                      <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                    @endforeach  
                </Select>  
              </div> --}}

              <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control"></textarea>
                    <span class="text-danger">{{$errors->first('description') ?? null}}</span>
                </div>
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
    <script>

      jQuery(document).ready(function() {
          var subcats = {!!json_encode($subcats)!!}
          // On Change Category
          $(document).on('change','.category',function(){
          $('.sub_category').empty();
            $('.sub_category').append(`
          <option value="" selected disabled>Select Sub Category</option>
          `);
          // console.log($('.category:selected').val());
          var category_id = $(this).val();
          $(subcats).each(function(index, val){
              if(category_id == val.category_id ){`
                      $('.sub_category').append(`
                      <option value="${val.id}">${val.name}</option>
                      `);
                  }

          });
      });
    });

    </script>
@endsection

