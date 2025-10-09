<!DOCTYPE html>
<html>

<head>
    <base href="/public">

    @include('admin.css')

    <style>
        .div_deg {
            padding: 10px;
        }

        label {
            display: inline-block;
            width: 200px;
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
                    <h1>Update Food</h1>

                    <form action="{{url('edit_food',$food->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="div_deg">
                            <label for="">Food Title</label>
                            <input type="text" name="title" value="{{$food->title}}">
                        </div>

                        <div class="div_deg">
                            <label for="">Details</label>
                            <textarea name="details" id="">{{$food->details}}</textarea>
                        </div>

                        <div class="div_deg">
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{$food->price}}">
                        </div>

                        <div class="div_deg">
                            <label for="">Cuurent Image</label>
                            <img width="150" src="food_img/{{$food->image}}" alt="">
                        </div>

                        <div class="div_deg">
                            <label for="">Change Image</label>
                            <input type="file" name="image">
                        </div>


                        <div class="div_deg">
                            <input type="submit" class="btn btn-warning" value="Update Food">
                        </div>

                    </form>
                </div>
            </div>
            @include('admin.scripts')
</body>

</html>