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
                    <div>Produk
                        <div class="page-title-subheading">
                            Dashboard
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center align-self-center">
                <a href="{{ url('/barang/create') }}">
                    <button class="btn btn-primary rounded-pill px-3" id="tambah-produk">Tambah</button>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->category_id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->jumlah }}</td>
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
        <!-- Barang section -->
        <div class="barang__section">
            <!-- Barang -->
            <div class="container barang__container">
                <div class="barang__content">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title text-center font-size-xlg">Produk</h5>
                            <table class="mb-0 table table__barang" id="barang">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Satuan</th>
                                        <th>Harga Pokok</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Grosir</th>
                                        <th>Stok</th>
                                        <th>Kadaluarsa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->purchase_price }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->wholesale_price }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>{{ $item->expired_date }}</td>
                                            <td>
                                                <button class="btn btn-link btn-lg float-left px-0">
                                                    <i class="pe-7s-note"></i>
                                                </button>
                                                <form action="{{ url('/barang/' . $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-link btn-lg float-right px-0 color__red1">
                                                    <i class="pe-7s-trash"></i>
                                                </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Barang section -->
    </div>
    <!-- END Section layouts   -->
@endsection

<script>
    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $("meta[name='csrf-token']").attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    // table.ajax.reload(() => loadForm($('#diskon').val()));
                    alert('success');
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
    let table_barang;
    $(function() {

        table_barang = $('#barang').DataTable({
            responsive: true,
            select: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('barang.getProducts') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'unit',
                    name: 'unit'
                },
                {
                    data: 'purchase_price',
                    name: 'purchase_price'
                },
                {
                    data: 'selling_price',
                    name: 'selling_price'
                },
                {
                    data: 'wholesale_price',
                    name: 'wholesale_price'
                },
                {
                    data: 'stock',
                    name: 'stock'
                },
                {
                    data: 'expired_date',
                    name: 'expired_date'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });

    $(document).ready(function() {

    });
</script>
