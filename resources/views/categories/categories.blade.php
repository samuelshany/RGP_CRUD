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
                                <h4 class="card-title">{{__('messages.categories')}}</h4>
                                <div class="w-100 d-flex justify-content-end">
                                <a href="{{url('admin/categories/create')}}" class="btn btn-primary" style="background-color: #7edb88;
    border-color: #7edb88;">{{__('messages.addCategory')}}</a>
</div>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>

                                                <th>{{__('messages.categoryName')}} </th>

                                                <th>{{__('messages.products')}} </th>

                                                <th>{{__('buttons.delete')}}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                        @foreach($categories as $category)
                                            <tr>

                                                <td>{{$category->name}}</td>
                                              <td>  <a style="color: black" href="{{url('/admin/categories/catProduct',$category->id)}}"> {{count($category->products)}} {{__('messages.products')}}</a></td>
                                               <td><a onClick="return confirm('{{__('messages.deleteCategory')}} ')" href="{{url('/categories/delete',$category->id)}}">{{__('buttons.delete')}}</a></td>
                                            </tr>
                                          @endforeach



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Show / hide columns dynamically -->

                <!-- Setting defaults -->
                <script type="text/javascript">
                    function ConfirmDelete()
                    {
                          if (confirm("Delete Account?"))
                               location.href='linktoaccountdeletion';
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
