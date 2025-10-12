<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        table {
            border: 1px solid skyblue;
            margin: auto;
            width: 1000px;
            margin-top: 100px;
        }

        th {
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            background-color: skyblue;
            padding: 20px;
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
                            <th>Phone Number</th>
                            <th>No. of Guests</th>
                            <th>Date</th>
                            <th>Time</th>

                        </tr>
                        @foreach($reservations as $reservation)
                        <tr>
                            <td>{{$reservation->phone}}</td>
                            <td>{{$reservation->guest}}</td>
                            <td>{{$reservation->date}}</td>
                            <td>{{$reservation->time}}</td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @include('admin.scripts')
</body>

</html>