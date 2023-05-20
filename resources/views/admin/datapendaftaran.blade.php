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
    @endsection
