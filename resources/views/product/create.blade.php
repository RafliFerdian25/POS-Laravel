@extends('layouts.main')

@section('content')
    <!-- Section Layouts  -->
    <div class="app-main__inner">
        <!-- tambah section -->
        <div class="tambah__section">
            <div class="tambah__body">
                <div class="tambah__content card">
                    <div class="title__card text-center">
                        Tambah Barang
                    </div>
                    <form action="">
                        <div class="row mb-3">
                            <label for="kodebarang" class="col-sm-2 col-form-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control rounded__10" id="kodebarang" name="kodebarang">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="namabarang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control rounded__10" id="namabarang" name="namabarang">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <select class="form-select rounded__10" aria-label="Default select example">
                                    <option value="pcs">Pieces</option>
                                    <option value="lsn">Lusin</option>
                                    <option value="pak">Pak</option>
                                    <option value="box">Box</option>
                                    <option value="dus">Dus</option>
                                    <option value="sct">Sachet</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hargapokok" class="col-sm-2 col-form-label">Harga Pokok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control rounded__10" min="0" id="hargapokok"
                                    name="hargapokok">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hargajual" class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control rounded__10" min="0" id="hargajual"
                                    name="hargajual">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="hargagrosir" class="col-sm-2 col-form-label">Harga Grosir</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control rounded__10" min="0" id="hargagrosir"
                                    name="hargagrosir">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control rounded__10" min="0" id="stok"
                                    name="stok">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-select rounded__10" aria-label="Default select example">
                                    <option value="pcs">Makanan</option>
                                    <option value="lsn">Minuman</option>
                                    <option value="sct">Bumbu Masak</option>
                                    <option value="pak">Alat Tulis</option>
                                    <option value="box">Alat Mandi</option>
                                    <option value="dus">Perlengkapan Bayi</option>
                                </select>
                            </div>
                        </div>
                        <div class="submit text-end">
                            <button type="submit" class=" btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end tambah section -->

    </div>
    <!-- END Section layouts   -->

@endsection
