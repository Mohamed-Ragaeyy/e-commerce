@extends('admin.container')
@section('content')
    <h1 style="color:white; padding-top:25px;font-size:28px;">Add Product</h1>
         @if (session()->has('message'))
          <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>
                {!! session()->get('message')!!}
            </strong>
          </div>
         @endif

        <form method="post" action="{{ url('addproduct') }}" enctype="multipart/form-data">
            @csrf
            <div style="padding:15px;">
                <label style="width: 200px">product title</label>
                <input style="color:black" type="text" name="title" placeholder = "product title" required>
            </div>

            <div style="padding:15px;">
                <label style="width: 200px">price</label>
                <input style="color:black" type="text" name="price" placeholder = "price" required>
            </div>

            <div style="padding:15px;">
                <label style="width: 200px">Description</label>
                <input style="color:black" type="text" name="desc" placeholder = "Description" required>
            </div>

            <div style="padding:15px;">
                <label style="width: 200px">Quantity</label>
                <input style="color:black" type="text" name="quantity" placeholder = "Quantity" required>
            </div>

            <div style="padding:15px;">
                <input  type="file" name="img" required>
            </div>

            <div style="padding:15px;">
                <button type="submit" class="btn btn-success">add product</button>
            </div>

        </form>
@endsection
@include('admin.footer')
