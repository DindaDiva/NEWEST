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

                        <form action="{{ route('admin-deleteUser', $user->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
