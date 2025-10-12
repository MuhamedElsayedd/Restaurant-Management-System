<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        table {
            border: 1px solid skyblue;
            margin: auto;
            width: 1000px;
        }

        th {
            color: white;
            font-weight: bold;
            font-size: 22px;
            text-align: center;
            background-color: red;
            padding: 10px;
        }

        td {
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">

        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Food Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Change Status</th>


                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>${{$order->price}}</td>
                            <td>
                                <img width="100" src="food_img/{{$order->image}}" alt="">
                            </td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <a onclick="return confirm('Are you sure to change this?')" class="btn btn-info" href="{{url('on_the_way',$order->id)}}">On The Way</a>
                                <a onclick="return confirm('Are you sure to change this?')" class="btn btn-warning" href="{{url('deliver_order',$order->id)}}">Delivered</a>
                                <a onclick="return confirm('Are you sure to change this?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel</a>

                            </td>


                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
            @include('admin.scripts')
</body>

</html>