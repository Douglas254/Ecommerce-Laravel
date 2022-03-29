<x-app-layout>

</x-app-layout>


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
                <div class="container" class="title" align="center">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="background-color: white">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Active/Inactive</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr style="color: white">
                            <td style="color: white">{{$item->id}}</td>
                            <td style="color: white">{{$item->name}}</td>
                            <td style="color: white">{{$item->email}}</td>
                            <td style="color: white">
                            @if($item->isban=='0')
                                <label for="isban" class="btn badge btn-primary">Active</label>
                            @elseif($item->isban=="1")
                                <label for="isban" class="btn badge btn-danger">Inactive</label>
                            @endif
                          </td>
                            <td style="color: white">{{$item->role_as}}</td>
                            <td style="color: white">
                                <a href="{{url('role-edit/'.$item->id)}}" class="badge badge-pill btn-primary">Edit</a>
                                <a href="" class="badge badge-pill btn-danger px-3 py-2">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
            </div>
                    <!-- partial -->
                
            @include('admin.script')
    </body>
</html>
