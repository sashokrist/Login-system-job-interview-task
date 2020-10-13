@extends('layouts.app')
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manage Users') }}</div>
                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                            </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->isAdmin === 0)
                                        User
                                    @else
                                        Admin
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user/edit', $user->id) }}" class="btn btn-info">Edit</a>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

                                    <a href="{{ route('users.destroy',$user->id) }}" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="{{ $user->id }}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function () {

        $("body").on("click","#deleteCompany",function(e){

            if(!confirm("Do you really want to do this?")) {
                return false;
            }

            e.preventDefault();
            var id = $(this).data("id");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;

            $.ajax(
                {
                    url: url.href, //or you can use url: "company/"+id,
                    type: 'DELETE',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){

                        $("#success").html(response.message)

                        Swal.fire(
                            'Remind!',
                            'User deleted successfully!',
                            'success'
                        )
                        location.reload();
                    }
                });
            return false;
        });
    });
</script>
@endsection
