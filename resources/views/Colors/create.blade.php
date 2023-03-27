@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
     {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif  --}}
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Color create</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" action="{{ route('color.store') }}" method="post"  >

                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter name" value="{{old('name')}}" name="name">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">User_id</label>
                                    <input type="integer" class="form-control" id="user_id" placeholder="Enter user_id"
                                    name="user_id" value="{{old('user_id')}}" name="user_id">
                                        <span class="text-danger">
                                            @error('user_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="product_id">Product_id</label>
                                    <input type="integer" class="form-control" id="product_id" placeholder="Enter product_id"
                                    name="product_id" value="{{old('product_id')}}" name="product_id">
                                        <span class="text-danger">
                                            @error('product_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                </div> --}}
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Product_id</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="product_id" value="">
                                        @foreach($products as $product)
                                      <option value="{{$product->id}}">{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                  </div>


{{--
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                        @foreach($categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                  </div> --}}


                            </div>

                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <script>
                        ClassicEditor
                        .create(document.querySelector('#description'))
                        .catch(error=>{
                          console.error(error);
                        })</script>
                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
