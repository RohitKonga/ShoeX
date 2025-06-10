@extends('Admin.layout.main')
@section('shoeX')
    <title>All Admins</title>
    <link rel="stylesheet" href="{{ asset('css/allCustomers.css') }}">

    <div class="home-section">

        <div class="abody">

            <div class="back">
                <section class="table-head" style="display: flex; align-items: center; justify-content: space-between;">
                    <h5>All Admins</h5>



                    <a href="{{ route('admin.admins.create') }}">
                        <button class="add-btn"><i class="fa-solid fa-add" style="margin-right: 10px;"></i>Add
                            Admin</button>
                    </a>
                </section>

                <div class="recent-orders">
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                    <td>
                                        <div style="display:flex; gap:15px">
                                            <a href="{{ route('admin.admins.edit', $admin->id) }}">
                                                <li class="fa fa-edit edit"></li>
                                            </a>
                                            <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <li class="fa fa-ban" class="edit delete-btn"
                                                    onclick="this.closest('form').submit();"></li>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection
