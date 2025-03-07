@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
    <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
    </a>
</div>

{{-- Table --}}
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped table-responsive table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Agama</th>
                            <th>Status Perkawinan</th>
                            <th>Pekerjaan</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($residents->isEmpty())
                        <tr>
                            <td colspan="14" class="text-center">Data Kosong</td>
                        </tr>
                        @else
                        @foreach ($residents as $item)
                        <tr>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->birthplace }}</td>
                            <td>{{ $item->birthdate }}</td>
                            <td>{{ $item->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->rt }}</td>
                            <td>{{ $item->rw }}</td>
                            <td>{{ $item->religion }}</td>
                            <td>{{ $item->marital_status }}</td>
                            <td>{{ $item->work }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'Aktif' ? 'badge-success' : 'badge-danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <a href="/resident/{{ $item->id }}/edit" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="/resident/{{ $item->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="pagination-container">
                    {{ $residents->links('pagination::bootstrap-5') }}
                </div>
            </div> <!-- End Card Body -->
        </div> <!-- End Card -->
    </div> <!-- End Col -->
</div> <!-- End Row -->

@endsection
