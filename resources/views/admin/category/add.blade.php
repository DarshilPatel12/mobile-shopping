<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{!! asset('img/icon.png') !!}"/>
    <title>Add Category</title>
    <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    @include('sweetalert::alert');

    <div class="container mt-5">
        <h1 class="text-center">Add Category</h1>

        <div class="cover">
            <form action="{{ url('admin/add_category') }}" method="post">
                @csrf

                <div class="form-group mt-5">
                    <label for="title">Category Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter Category Title"
                        class="form-control mt-2" required>
                </div>

                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('admin.category')}}" class="btn btn-primary">Back</a>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
