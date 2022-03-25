s<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
    <head>

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
                <div class="container" class="title">
                    <h1 class="title">Add Product</h1>

                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span style="padding-right: 5px; font-size: 20px;">X</span></button>

                            {{session()->get('message')}}

                        </div>
                    @endif

                    <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="title_input">
                        <label for="product-title">Product title</label>
                        <input class="input_field" type="text" name="title" placeholder="Give a product title" required="">
                        </div>

                        <div class="title_input">
                        <label for="product-title">Price</label>
                        <input class="input_field" type="number" name="price" placeholder="Give a price" required="">
                        </div>

                        <div class="title_input">
                        <label for="product-title">Description</label>
                        <input class="input_field" type="text" name="des" placeholder="Give a description" required="">
                        </div>

                        <div class="title_input">
                        <label for="product-title">Quantity</label>
                        <input class="input_field" type="text" name="quantity" placeholder="Give a Product Quantity" required="">
                        </div>

                        <div class="title_input">
                        <input class="input_field" type="file" name="file" required="">
                        </div>

                        <div class="title_input">
                        <input class="btn btn-success input_field" type="submit" >
                    </form>
                </div>
            </div>


                <!-- partial -->
            </div>    
            @include('admin.script')
    </body>
</html>