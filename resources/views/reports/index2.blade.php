@extends('dashboard')
@section('content')
<div class="container">
    <div class="row">
<div class="col-md-12 d-flex justify-content-center align-items-center">
    <form action="{{url('/admin/reports/filter')}}" method="POST">
        @csrf
        <input type="date" name="from" class="form-control" placeholder="from">
        <input type="date" name="to" class="form-control" placeholder="to">
        <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>
<h1>{{__('messages.products')}} {{count($products)}}</h1>
<div class="table-responsive">
    <form action="{{ url('/admin/products/deletegroup') }}" method="POST">
        @csrf
        <table id="file_export" class="table table-striped table-bordered display">
            <thead>
                <tr>
                    <th># </th>
                    <th>{{ __('messages.productName') }} </th>
                    <th>{{ __('messages.productImage') }} </th>
                    <th>{{ __('messages.productCategory') }} </th>
                    <th>{{ __('messages.productDesc') }} </th>
                    <th>{{ __('messages.productPrice') }} </th>
                    <th>{{ __('messages.productQuantity') }} </th>
                    <th>{{ __('buttons.edit') }}</th>
                    <th>{{ __('buttons.delete') }}</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td><input onclick="showdel()" type="checkbox" name="products[]"
                                value="{{ $product->id }}"></td>
                        <td>{{ $product->name }}</td>
                        <td><img src="http://localhost/RGB/public/{{ $product->photo }}"
                                class="rounded-circle" width="50" height="50" /></td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->description }}</td>

                        <td>{{ $product->price }} {{ __('messages.curency') }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td><a class="btn btn-warning"
                                href="{{ url('admin/products/edit', $product->id) }}">{{ __('buttons.edit') }}</a>
                        </td>
                        <td><a onClick="return confirm('{{ __('messages.deleteProduct') }} ')"
                                class="btn btn-danger"
                                href="{{ url('admin/products/delete', $product->id) }}">{{ __('buttons.delete') }}</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
        <button type="submit" id="del" class="btn btn-danger"
            onClick="return confirm('{{ __('messages.deleteProduct') }} ')"
            style="display: none">{{ __('buttons.deletegroup') }}</button>
    </form>
</div>
    </div>
</div>
@endsection
