@extends('layouts.main')

@section('content')
    <div class="app-main__inner">
        <!-- TITLE -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-note2 icon-gradient bg-plum-plate">
                        </i>
                    </div>
                    <div>Laporan Bulanan
                        <div class="page-title-subheading">
                            Laporan
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TITLE -->
        <!-- CARD DASHBOARD -->
        <div class="row">
            <!-- total pendapatan -->
            <div class="col-sm-6 col-md-4 col-xl-3 p-3">
                <div class="card mb-0 widget-content row">
                    <div class="content">
                        <div class="widget-content-left row mb-2">
                            <i class="pe-7s-cash col-2" style="font-size: 30px;"></i>
                            <div class="widget-heading col-10 widget__title">Total Pendapatan</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers mb-2"><span>Rp. {{ format_uang($report[0]->income) }}</span></div>
                            <div class="perubahan row">
                                {{-- <div class="widget-subheading col-10" id="total_pendapatan">
                                    -2000000
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- total keuntungan -->
            <div class="col-sm-6 col-md-4 col-xl-3 p-3">
                <div class="card mb-0 widget-content row">
                    <div class="content">
                        <div class="widget-content-left row mb-2">
                            <i class="pe-7s-graph1 col-2" style="font-size: 30px;"></i>
                            <div class="widget-heading col-10 widget__title">Total Keuntungan</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers mb-2"><span>Rp {{ format_uang($report[0]->profit) }}</span></div>
                            <div class="change row" id="change">
                                {{-- <div class="widget-subheading col-10" id="total_keuntungan">
                                    2000000
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- total order -->
            <div class="col-sm-6 col-md-4 col-xl-3 p-3">
                <div class="card mb-0 widget-content row">
                    <div class="content">
                        <div class="widget-content-left row mb-2">
                            <i class="pe-7s-news-paper col-2" style="font-size: 30px;"></i>
                            <div class="widget-heading col-10 widget__title">Total Order</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers mb-2"><span>{{ format_uang($report[0]->total_transaction) }}</span></div>
                            <div class="change row" id="change">
                                {{-- <div class="widget-subheading col-10" id="total_order">
                                    -20
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- total barang terjual -->
            <div class="col-sm-6 col-md-4 col-xl-3 p-3">
                <div class="card mb-0 widget-content row">
                    <div class="content">
                        <div class="widget-content-left row mb-2">
                            <i class="pe-7s-box2 col-2" style="font-size: 30px;"></i>
                            <div class="widget-heading col-10 widget__title">Total Barang Terjual</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers mb-2"><span>{{ format_uang($report[0]->total_item) }}</span></div>
                            <div class="change row" id="change">
                                {{-- <div class="widget-subheading col-10" id="total_barang">
                                    -8
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END CARD DASHBOARD -->
        <!-- Barang Terjual -->
        <div class="barang__terjual__section">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title text-center">Riwayat Penjualan</h5>
                    <input type="month" name="terjual_bulan" id="terjual_bulan" class="form-control col-3 mb-3">
                    <table class="mb-0 table" id="barang_terjual">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>No. Kasir</th>
                                <th>Total Item</th>
                                <th>Total Harga</th>
                                <th>Keuntungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td scope="row">{{ $sale->created_at }}</td>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->total_item }}</td>
                                    <td>{{ $sale->total_price }}</td>
                                    <td>{{ $sale->profit }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end barang terjual -->
        <!--Laporan -->
        {{-- <div class="row mb-3 justify-content-center">
            <!-- Barang terlaris -->
            <div class="col-sm-3 col-xl-3">
                <!-- barang terlaris -->
                <div class="card mb-2">
                    <div class="card-header">
                        Barang Terlaris
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                    </ul>
                </div>
            </div>
            <!-- kategori terlaris -->
            <div class="col-sm-3 col-xl-3">
                <div class="card mb-2">
                    <div class="card-header">
                        Kategori Terlaris
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                        <li class="list-group-item pb-0">
                            <div class="row">
                                <div class="col-10">
                                    Chitatos
                                    <br>
                                    <small class="text-muted">Makanan</small>
                                </div>
                                <div class="col-2 align-self-center">
                                    8
                                </div>
                            </div>
                            <hr class="m-1">
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Laporan Bulanan -->
            <div class="col-sm-3 col-xl-6">
                <div class="card mb-2">
                    <div class="card-header">
                        Laporan Bulanan
                    </div>
                    <table id="pendapatan_tertinggi" class="table laporan__bulanan">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Pendapatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Januari, 2022</td>
                                <td>Rp 5.000.000</td>
                                <td><button class="btn btn-link rounded-pill">Detail</button></td>
                            </tr>
                            <tr>
                                <td>Januari, 2022</td>
                                <td>Rp 5.000.000</td>
                                <td><button class="btn btn-link rounded-pill">Detail</button></td>
                            </tr>
                            <tr>
                                <td>Januari, 2022</td>
                                <td>Rp 5.000.000</td>
                                <td><button class="btn btn-link rounded-pill">Detail</button></td>
                            </tr>
                            <tr>
                                <td>Januari, 2022</td>
                                <td>Rp 5.000.000</td>
                                <td><button class="btn btn-link rounded-pill">Detail</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="m-1">
                </div>
            </div>
        </div> --}}
        <!-- end laporan -->

    </div>
@endsection
