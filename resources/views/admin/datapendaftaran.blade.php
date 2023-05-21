@extends('layout.app')

@section('title', 'datapendaftaran')

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Pengingat</h4>

                            <div class="align-right text-right">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
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
                                            <th class="text-center">Nama Peserta</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">No HP</th>
                                            <th class="text-center">Alamat</th>
                                            <th class="text-center">Asal Sekolah</th>
                                            <th class="text-center">Nama Lomba</th>
                                            <th class="text-center">NISN</th>
                                            <th class="text-center">Status Pembayaran</th>
                                            <th class="text-center">Tanggal Pendaftaran</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($pendaftaran as $no => $pen)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $pen->nama_peserta }}</td>
                                                <td class="text-center">{{ $pen->email }}</td>
                                                <td class="text-center">{{ $pen->no_hp }}</td>
                                                {{-- <td class="align-middle text-center"> <button data-toggle="modal"
                                                        data-target="#detailModal{{ $lmb->id }}" type="button"
                                                        class="btn btn-primary">Detail</button></td> --}}
                                                {{-- <td class="text-center">
                                                    {{ 'Rp ' . number_format($lmb->harga, 0, ',', '.') }}</td> --}}
                                                <td class="text-center">{{ $pen->alamat }}</td>
                                                <td class="text-center">{{ $pen->asal_sekolah }}</td>
                                                <td class="text-center">{{ $pen->nama }}</td>
                                                <td class="text-center">{{ $pen->nisn }}</td>
                                                <td class="text-center">
                                                    @if ($pen->status_pembayaran == '1')
                                                        <span class="badge badge-danger">Belum Bayar</span>
                                                    @else
                                                        <span class="badge badge-success">Sudah Bayar</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $pen->tanggal_pendaftaran }}</td>
                                                {{-- <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editUserModal{{ $lmb->id }}" type="button"
                                                            class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $lmb->id }}" method="post"
                                                            action="{{ route('lomba.destroy', $lmb->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $lmb->id }}')">Delete</button>
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
                                                </td> --}}
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

        <!-- modal add -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (auth()->check())
                            @if (session('notification'))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach (session('notification')['validation'] as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('pendaftaran.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input id="alamat" type="text" class="form-control" name="alamat">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nisn">NISN</label>
                                        <input id="nisn" type="text" class="form-control" name="nisn" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="id_lomba">Lomba</label>
                                        <select id="id_lomba" class="form-control" name="id_lomba" autofocus>
                                            <option value="">Pilih Lomba</option>
                                            @foreach ($lombas as $lomba)
                                                <option value="{{ $lomba->id }}">{{ $lomba->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="no_hp">Nomor Telepon</label>
                                        <input id="no_hp" type="text" class="form-control" name="no_hp"
                                            autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input id="asal_sekolah" type="text" class="form-control" name="asal_sekolah"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Update data diri
                                    </button>
                                </div>
                            </form>
                        @else
                            <p>Silakan login untuk mengakses halaman ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @endsection
