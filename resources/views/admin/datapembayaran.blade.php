@extends('layout.app')

@section('title', 'Data Pembayaran')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Halaman atau template yang relevan -->
                        @if (session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses!',
                                        text: '{{ session('success') }}',
                                        showConfirmButton: false,
                                        timer: 3000 // Durasi SweetAlert ditampilkan (dalam milidetik)
                                    });
                                });
                            </script>
                        @endif

                        <div class="card-body">
                            <h4 class="card-title">Data Pembayaran</h4>
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
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Tanggal Pembayaran</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($pembayaran as $no => $pem)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td class="text-center">{{ $pem->pendaftaran->nama_peserta }}</td>
                                                <td class="text-center">{{ $pem->jumlah }}</td>
                                                <td class="text-center">{{ $pem->tanggal_pembayaran }}</td>

                                                <td class="align-middle text-center">
                                                    <span>
                                                        <button data-toggle="modal"
                                                            data-target="#editPendaftaranModal{{ $pem->id }}"
                                                            type="button" class="btn btn-info">Edit</button>
                                                        <form id="deleteForm-{{ $pem->id }}" method="post"
                                                            action="{{ route('pembayaran.destroy', $pem->id) }}"
                                                            style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="confirmDelete('{{ $pem->id }}')">Delete</button>
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
    @endsection
