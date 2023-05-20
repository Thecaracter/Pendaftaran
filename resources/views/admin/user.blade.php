@extends('layout.app')

@section('title', 'User')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Pengingat</h4>

                            <div class="align-right text-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#createUserModal">
                                    Tambah Pengguna
                                </button>
                            </div>
                            <br>
                            <div class="search-element">
                                <input id="searchInput" class="form-control" type="search" placeholder="Search"
                                    aria-label="Search">
                            </div>

                            <br>

                            <div class="table-responsive">
                                <table id="example" class="table table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">No. HP</th>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($user as $no => $item)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $item->username }}</td>
                                                <td class="text-center">{{ $item->email }}</td>
                                                <th class="text-center">{{ $item->alamat }}</th>
                                                <th class="text-center">{{ $item->no_hp }}</th>
                                                <th class="text-center">
                                                    <img src="{{ $item->foto }}" alt=""
                                                        style="max-width: 100px; max-height: 100px;">
                                                </th>
                                                <td class="align-middle text-center">
                                                    @if ($item->status == 2)
                                                        <span class="badge badge-success px-2">Sudah</span>
                                                    @elseif ($item->status == 1)
                                                        <span class="badge badge-danger px-2">belum daftar</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editUserModal{{ $item->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $item->id }}" method="post"
                                                            action="{{ route('user.destroy', $item->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $item->id }}')">Delete</button>
                                                        </form>


                                                        <script>
                                                            function confirmDelete(userId) {
                                                                Swal.fire({
                                                                    title: 'Yakin Mo Ngapus Bro?',
                                                                    text: "Nggak bakal bisa balik lo",
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        // Submit form untuk menghapus data
                                                                        document.getElementById('deleteForm-' + userId).submit();
                                                                    }
                                                                });
                                                            }
                                                        </script>

                                                    </span>
                                                </td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tambah Pengguna Modal -->
        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('user.create') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <!-- Form input pengguna -->
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit Pengguna -->
        @foreach ($user as $item)
            <div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editUserModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel{{ $item->id }}">Edit Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editUserForm{{ $item->id }}" action="{{ route('user.update', $item->id) }}"
                            method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <!-- Form input pengguna -->
                                <div class="form-group">
                                    <label for="editUsername{{ $item->id }}">Username:</label>
                                    <input type="text" class="form-control" id="editUsername{{ $item->id }}"
                                        name="username" placeholder="Username" value="{{ $item->username }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="editEmail{{ $item->id }}">Email:</label>
                                    <input type="email" class="form-control" id="editEmail{{ $item->id }}"
                                        name="email" placeholder="Email" value="{{ $item->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRole{{ $item->id }}">Role:</label>
                                    <select class="form-control" id="editRole{{ $item->id }}" name="role"
                                        required>
                                        <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="user" {{ $item->role == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editPassword{{ $item->id }}">Password:</label>
                                    <input type="password" class="form-control" id="editPassword{{ $item->id }}"
                                        name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <script>
            $(document).ready(function() {
                $('#searchInput').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('table tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
        @if (session('notification'))
            <script>
                $(document).ready(function() {
                    const {
                        title,
                        text,
                        type
                    } = @json(session('notification'));
                    Swal.fire(title, text, type);
                });
            </script>
        @endif


    @endsection
