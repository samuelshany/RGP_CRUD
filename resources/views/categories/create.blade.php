@extends('dashboard')
@section('content')
<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card card-body">
                <h3 class="mb-0">{{__('messages.addCategory')}}</h3>

                <form action="{{ url('admin/categories/store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.categoryNameen')}} </label>
                        <div class="col-sm-9">
                            <input type="text" name="name_en" class="form-control" autocomplete="false"
                            id="inputEmail3" value="{{old('name_en')}}" placeholder="{{__('messages.categoryNameen')}}">
                        </div>
                        @error('name_en')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">{{__('messages.categoryNamear')}} </label>
                        <div class="col-sm-9">
                            <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control" autocomplete="false"
                            id="inputEmail3" placeholder="{{__('messages.categoryNamear')}}">
                        </div>
                    </div>
                    @error('name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                    <div class="form-group mb-0">
                        <div class="offset-sm-3 col-sm-9 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info waves-effect waves-light mt-2 "
                                style="background-color:#00b9f0">{{__('buttons.add')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

