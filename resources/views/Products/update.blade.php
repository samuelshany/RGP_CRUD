@extends('dashboard')
@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card card-body">
                <h3 class="mb-0">{{__('messages.updateProduct')}}</h3>

                <form action="{{ url('admin/products/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
<input name='id' value="{{$product->id}}" type="hidden">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.categoryName')}} </label>
                        <div class="col-sm-9">
                            <select  name="category_id" class="form-control" autocomplete="false"
                            >
                            @foreach ($categories as $category )

<option value="{{$category->id}}"  @if($product->category_id == $category->id) selected @endif> {{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productNameen')}} </label>
                        <div class="col-sm-9">
                            <input type="text" name="name_en" class="form-control" autocomplete="false" value="{{$product->name_en}}"
                            id="inputEmail3" placeholder="{{__('messages.productNameen')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productNamear')}} </label>
                        <div class="col-sm-9">
                            <input type="text" name="name_ar" class="form-control" autocomplete="false" value="{{$product->name_ar}}"
                            id="inputEmail3" placeholder="{{__('messages.productNamear')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productDescen')}} </label>
                        <div class="col-sm-9">
                            <input type="text" name="description_en" class="form-control" autocomplete="false" value="{{$product->description_en}}"
                                id="inputEmail3" placeholder="{{__('messages.productDescen')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productDescar')}} </label>
                        <div class="col-sm-9">
                            <input type="text" name="description_ar" class="form-control" autocomplete="false" value="{{$product->description_ar}}"
                                id="inputEmail3" placeholder="{{__('messages.productDescar')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productPrice')}} </label>
                        <div class="col-sm-9">
                            <input type="number" name="price" class="form-control" autocomplete="false" value="{{$product->price}}"
                                id="inputEmail3" placeholder="{{__('messages.productPrice')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productQuantity')}} </label>
                        <div class="col-sm-9">
                            <input type="number" name="quantity" class="form-control" autocomplete="false" value="{{$product->quantity}}"
                                id="inputEmail3" placeholder="{{__('messages.productQuantity')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.productImage')}} </label>
                        <div class="col-sm-9">
                            <input type="file" name="file" class="form-control" autocomplete="false"
                                id="inputEmail3" placeholder="Title">
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="offset-sm-3 col-sm-9 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info waves-effect waves-light mt-2 "
                                style="background-color:#00b9f0">{{__('buttons.edit')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

