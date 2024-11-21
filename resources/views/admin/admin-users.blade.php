@extends('admin.admin-layouts.admin-header')
@section('home-content')

<div class="container mt-5">
    <h1 class="mb-4">Users Management</h1>

    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $user->updated_at->format('Y-m-d H:i:s') }}</td> 
                    <td>
                        <form action="{{ route('admin-updateRole', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="role" class="form-control mb-2">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="cust" {{ $user->role == 'cust' ? 'selected' : '' }}>Customer</option>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Update Role</button>
                        </form>

                            <button type="submit" class="btn btn-sm btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">Delete</button>
                    </td>
                </tr>

                        <div class="modal fade" id="deleteModal{{ $user->id }}"  tabindex="-1" aria-labelledby="deleteProductModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductModalLabel{{ $user->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus user <strong>{{ $user->name }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin-deleteUser', $user->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>  
                        </div>


            @endforeach
        </tbody>
    </table>

    <nav>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
         </div>
    </nav>

</div>

<script>
    // Script untuk menghilangkan alert setelah 5 detik
    setTimeout(function() {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease"; // Smooth transition
            alert.style.opacity = 0; // Fade out effect
            setTimeout(() => alert.remove(), 500); // Hapus elemen setelah efek fade out selesai
        }
    }, 5000); // 5000 ms = 5 detik
</script>

@include('admin.admin-layouts.admin-footer')
@endsection
