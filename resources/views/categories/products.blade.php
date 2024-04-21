@extends('dashboard')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- File export -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$category->name}} [{{ __('messages.products') }}]</h4>
                        @if (Session::has('succes'))
                            <div class="alert alert-success text-center fs-1" role="alert">
                                <p>{{ Session::get('succes') }}</p>
                            </div>
                        @endif
                        @if (Session::has('failed'))
                            <div class="alert alert-danger text-center fs-1" role="alert">
                                <p>{{ Session::get('failed') }}</p>
                            </div>
                        @endif


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

                                        @foreach ($category->products as $product)
                                            <tr>
                                                <td><input onclick="showdel()" type="checkbox" name="products[]"
                                                        value="{{ $product->id }}"></td>
                                                <td>{{ $product->name }}</td>
                                                <td><img src="http://localhost/RGB/public/{{$product->photo}}" class="rounded-circle" width="50" height="50" /></td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $product->description }}</td>

                                                <td>{{ $product->price }} {{ __('messages.curency') }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td><a
                                                      class="btn btn-warning"  href="{{ url('admin/products/edit', $product->id) }}">{{ __('buttons.edit') }}</a>
                                                </td>
                                                <td><a onClick="return confirm('{{ __('messages.deleteProduct') }} ')"
                                                      class="btn btn-danger"  href="{{ url('admin/products/delete', $product->id) }}">{{ __('buttons.delete') }}</a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                                <button type="submit" id="del" class="btn btn-danger"
                                onClick="return confirm('{{ __('messages.deleteProduct') }} ')"   style="display: none">{{__('buttons.deletegroup')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function showdel() {
                var checkboxes = document.querySelectorAll('input[name="products[]"]');
                var isChecked = false;

                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                        return; // Exit the loop if any checkbox is checked
                    }
                });
                if (isChecked) {
                    $del = document.getElementById('del');
                    $del.style.display = 'block';
                } else {
                    $del = document.getElementById('del');
                    $del.style.display = 'none';
                }


            }

            function ConfirmDelete() {
                if (confirm("Delete Account?"))
                    location.href = 'linktoaccountdeletion';
            }
        </script>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection
