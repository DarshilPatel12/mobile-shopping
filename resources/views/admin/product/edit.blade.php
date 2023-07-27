<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{!! asset('img/icon.png') !!}"/>
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    @include('sweetalert::alert');

    <div class="container mt-5 mb-5">
        <h1 class="text-center">Edit Product</h1>

        <div class="cover">
            <form action="{{ url('admin/edit_product', $product->id) }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="form-group mt-5">
                    <label for="name">Select Category</label>
                    <select name="category" id="category" class="form-control mt-2" required>
                        @foreach ($category as $category)
                        @if ($category->id == $product->category_id)
                            <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-5">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control mt-2">
                    <img src="/images/{{ $product->image }}" width="60px" height="60px">
                </div>

                <div class="row">
                    <div class="form-group mt-5 col-6">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Product Name"
                            value="{{ $product->name }}" class="form-control mt-2" required>
                    </div>

                    <div class="form-group mt-5 col-6">
                        <label for="storage">Product Storage</label>
                        <input type="text" name="storage" id="storage" placeholder="Enter Product Storage"
                            value="{{ $product->storage }}" class="form-control mt-2" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-5 col-6">
                        <label for="ram">Product Ram</label>
                        <input type="text" name="ram" id="ram" placeholder="Enter Product Ram"
                            value="{{ $product->ram }}" class="form-control mt-2" required>
                    </div>

                    <div class="form-group mt-5 col-6">
                        <label for="processor">Product Processor</label>
                        <input type="text" name="processor" id="processor" placeholder="Enter Product Processor"
                            value="{{ $product->processor }}" class="form-control mt-2" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-5 col-6">
                        <label for="launch_date">Product Launch Date</label>
                        <input type="date" name="launch_date" id="launch_date" value="{{ $product->launch_date }}"
                            placeholder="Enter Product Launch Date" class="form-control mt-2" required>
                    </div>

                    <div class="form-group mt-5 col-6">
                        <label for="price">Product Price</label>
                        <input type="text" name="price" id="price" placeholder="Enter Product Price"
                            value="{{ $product->price }}" class="form-control mt-2" required>
                    </div>
                </div>

                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="{{ route('admin.product') }}" class="btn btn-primary">Back</a>
                </div>

            </form>
        </div>

    </div>

</body>

</html>
