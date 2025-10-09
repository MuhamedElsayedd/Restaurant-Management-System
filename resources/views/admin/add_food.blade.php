<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
            color: while;
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
                    <form action="{{url('upload_food')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label for="">Food Title</label>
                            <input type="text" name="title" required>
                        </div>

                        <div class="div_deg">
                            <label for="">Food details </label>
                            <textarea name="details" cols="50" rows="10" required></textarea>
                        </div>

                        <div class="div_deg">
                            <label for="">Price</label>
                            <input type="text" name="price" required>
                        </div>


                        <div class="div_deg">
                            <label for="">Image</label>
                            <input type="file" name="img">
                        </div>

                        <div class="div_deg">

                            <input type="submit" value="Add Food" class="btn btn-warning">
                        </div>

                        <br>
                        @if(session('status-message'))
                        <div class="alert alert-success">
                            {{ session('status-message') }}
                        </div>
                        @endif

                    </form>

                </div>
            </div>
            @include('admin.scripts')
</body>

</html>