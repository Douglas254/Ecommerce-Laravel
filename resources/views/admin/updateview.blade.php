<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
    <head>

        <base href="/public">  <!-- denote we have a css folder in public directory -->

        @include('admin.css')

                <style type="text/css">
            .title
            {
                color: white; 
                padding-top: 25px; 
                font-size: 25px; 
                text-align: center;
            }

            .title_input
            {
                text-align: center;
                padding-top: 15px;
            }

            label
            {
                display: inline-block;
                width: 200px;
            }

            .input_field
            {
                color: black;
            }
            
        </style>

    </head>
    <body>

            @include('admin.sidebar')

            <!-- partial -->

            @include('admin.navbar')
            
                <!-- partial -->

                <div class="container-fluid page-body-wrapper">
                <div class="container" class="title" align="center">
                    <h1 class="title">Update Product</h1>

                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span style="padding-right: 5px; font-size: 20px;">X</span></button>

                            {{session()->get('message')}}

                        </div>
                    @endif

                    <form action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="title_input">
                        <label for="product-title">Product title</label>
                        <input class="input_field" type="text" name="title" value={{$data->title}} required="">
                        </div>

                        <div class="title_input">
                        <label for="product-title">Price</label>
                        <input class="input_field" type="number" name="price" value={{$data->price}} required="">
                        </div>

                        <div class="title_input">
                        <label for="product-title">Description</label>
                        <input class="input_field" type="text" name="des" value={{$data->description}} required="">
                        </div>

                        <div class="title_input">
                        <label for="product-title">Quantity</label>
                        <input class="input_field" type="text" name="quantity" value={{$data->quantity}} required="">
                        </div>

                        <div class="title_input">
                        <label for="old-image">Old Image</label>
                        </div>
                        <div>
                        <img style="align-item: center;" width="100px" height="100px" src="/productimage/{{$data->image}}">
                        </div>

                        <div class="title_input">
                        <label for="changeimage">Change Image</label>
                        <input class="input_field" type="file" name="file" >
                        </div>

                        <div class="title_input">
                        <input class="btn btn-success input_field" type="submit" >
                    </form>
                </div>
            </div>

               
            <!-- partial -->
                
            @include('admin.script')
    </body>
</html>
