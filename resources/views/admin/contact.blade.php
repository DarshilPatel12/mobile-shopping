@extends('admin.layout')

@section('title', 'Admin - Contact')

@section('content')

    @include('sweetalert::alert');

    <div class="container mt-4">

        @if ($contact->isEmpty())
        <div class="jumbotron jumbotron-fluid mt-5 text-center">
            <div class="container">
              <h1 class="display-4">No Record Found!</h1>
            </div>
        </div>
        @else
            <div class="tables">
                <table cellspacing="1" class="table table-striped table-hover">
                    <tr class="table-info" width="100vh">
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>

                    @foreach ($contact as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->message }}</td>
                            <td><a onclick="return confirm('Are you sure want to delete?')"
                                    href="{{ url('admin/delete_contact', $contact->id) }}" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
            <div class="pagination text-center">{{ $products->links() }}</div>


        @endif

    </div>



@endsection
