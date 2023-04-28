@extends('layouts.main')

@section('content')
    <!-- Section Layouts  -->
    <div class="app-main__inner">
        <!-- TITLE -->
        <div class="app-page-title row justify-content-lg-between">
            <div class="page-title-wrapper col-3">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-wallet icon-gradient bg-plum-plate">
                        </i>
                    </div>
                    <div>Kategori
                        <div class="page-title-subheading">
                            Dashboard
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center align-self-center">
                <a href="{{ url('/kategori/create') }}">
                    <button class="btn btn-primary rounded-pill px-3" id="tambah-kategori">Tambah</button>
                </a>
            </div>
        </div>
        <!-- END TITLE -->
        <!-- Kategori Section -->
        <div class="kategori__section">
            <!-- Barang -->
            <div class="container kategori__container">
                <div class="kategori__content">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title text-center font-size-xlg">Kategori</h5>
                            <table class="mb-0 table table__kategori" id="kategori">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Jumlah Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->jumlah }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('kategori.edit', $category->id) }}" class="btn btn-link btn-lg float-left px-0"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('kategori.destroy', $category->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus kategori')" class="btn btn-link btn-lg float-right px-0 color__red1"><i class="fa fa-trash"></i></button>
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
        </div>
        <!-- End kategori section -->
    </div>
    <!-- END Section layouts   -->
@endsection
