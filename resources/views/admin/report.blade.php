<!DOCTYPE html>
<html lang="en">
    <head>

        @include('admin.css')

    </head>
    <body>

            @include('admin.sidebar')

            <!-- partial -->

            @include('admin.navbar')
            
                <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container"  align="center">
                <h2 class="fs-3 text-center my-3">Get Data Between Two Dates in Laravel 8</h2>
                <div class="my-2">
                    <form action="/registeredusers" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="btn btn-primary" type="submit">GET</button>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $data)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->price}}</td>
                            <td>{{ $data->status}}</td>
                            <td>{{ $data->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                    <!-- partial -->
                
            @include('admin.script')
    </body>
</html>