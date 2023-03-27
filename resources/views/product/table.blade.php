@extends('layouts.master')
@section('content')


    <!-- Main content -->

        <div class="container-fluid">
            <section class="content">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Table</h3>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('product.create') }}"><button type="button"
                                        class="btn btn-primary btn-sm">Create Product</button></h3></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{-- id datatable  id="mytable"--}}
                            <table class="table table-bordered" id="myTable">
                                {{-- end --}}
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th style="width:20px">Title</th>
                                        <th style="width:30px">description</th>
                                        <th style="width:30px">image</th>
                                        <th style="width:30px">Category Name</th>
                                        <th style="width:30px">Actions</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td> {{ $d->id }}</td>
                                            <td> {{ $d->title }}</td>
                                            <td> {{ $d->description }}</td>
                                            <td><img
                                                src="{{ asset('uploads/' . $d->image) }}"width="50px"height="50px" alt="">
                                        </td>
                                            <td>{{$d->category->title }}</td>
                                            <td><button type="button" class="btn btn-warning">
                                                    <a href="{{ route('product.edit', $d->id) }}">
                                                        Edit</button></a>
                                                <button type="button" class="btn btn-danger">
                                                    <a href="{{ route('product.delete', $d->id) }}">

                                                        delete</button></a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{-- <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    </div>

{{-- datatable take same (id  #myTable=myTable --}}
@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        "pageLength" :3
    });
} );
</script>
@endpush

{{-- end --}}
