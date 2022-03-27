
<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="#">view all products <i class="fa fa-angle-right"></i></a>

                    <form action="{{url('search')}}" method="get" class="form-inline" style="float: right; padding: 10px">
                        <input class="form-control" type="search" name="search" placeholder="Search">
                        <input type="submit" style="color: black; font-weight: bold;" value="Search" class="btn btn-success">
                    </form>
                </div>
            </div>
             <!-- displaying data to the home page -->
                @foreach($data as $product)

            <div class="col-md-4">
            <div class="product-item">
                <a href="#"><img width="300px" height="225px" src="/productimage/{{$product->image}}" alt=""></a>
                <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>${{$product->price}}</h6>
                <p>{{$product->description}}</p>
                <!-- <a href="#" class="btn btn-primary">Add Cart</a> -->
                <form action="{{url('addcart',$product->id)}}" method="post">

                    @csrf

                    <input type="number" min="1" value="1" class="form-control" style="width: 100px;" name="quantity"><br>
                    <input type="submit" style="color: black; font-weight: bold;" class="btn btn-primary" value="Add Cart">
                </form>
                </div>
            </div>
            </div>

            @endforeach

            @if(method_exists($data,'links'))

                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}  <!-- use for pagination -->
                </div>

            @endif
            
        </div>
    </div>
</div>