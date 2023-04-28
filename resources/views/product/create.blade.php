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
                    <form action="/barang" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="id" class="col-sm-2 col-form-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('id') }}" type="number"
                                    class="form-control rounded__10 @error('id')
                                is-invalid
                            @enderror"
                                    id="id" name="id" max="999999999999999">
                                @error('id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('name') }}" type="text"
                                    class="form-control rounded__10 @error('name')
                                is-invalid
                            @enderror"
                                    id="name" name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-10">
                                <select required
                                    class="form-select rounded__10 @error('unit')
                                is-invalid
                            @enderror"
                                    name="unit" aria-label="Default select example">
                                    <option value="PCS">Pieces</option>
                                    <option value="LSN">Lusin</option>
                                    <option value="PAK">Pak</option>
                                    <option value="BOX">Box</option>
                                    <option value="DUS">Dus</option>
                                    <option value="SCT">Sachet</option>
                                </select>
                                @error('unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contain" class="col-sm-2 col-form-label">Isi</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('contain') }}" type="number"
                                    class="form-control rounded__10 @error('contain')
                                is-invalid
                            @enderror"
                                    min="0" id="contain" name="contain">
                                @error('contain')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="purchase_price" class="col-sm-2 col-form-label">Harga Pokok</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('purchase_price') }}" type="number"
                                    class="form-control rounded__10 @error('purchase_price')
                                is-invalid
                            @enderror"
                                    min="0" id="purchase_price" name="purchase_price">
                                @error('purchase_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="selling_price" class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('selling_price') }}" type="number"
                                    class="form-control rounded__10 @error('selling_price')
                                is-invalid
                            @enderror"
                                    min="0" id="selling_price" name="selling_price">
                                @error('selling_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="wholesale_price" class="col-sm-2 col-form-label">Harga Grosir</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('wholesale_price') }}" type="number"
                                    class="form-control rounded__10 @error('wholesale_price')
                                is-invalid
                            @enderror"
                                    min="0" id="wholesale_price" name="wholesale_price">
                                @error('wholesale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('discount') }}" type="number"
                                    class="form-control rounded__10 @error('discount')
                                is-invalid
                            @enderror"
                                    min="0" id="discount" name="discount">
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('stock') }}" type="number"
                                    class="form-control rounded__10 @error('stock')
                                is-invalid
                            @enderror"
                                    min="0" id="stock" name="stock">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="expired_date" class="col-sm-2 col-form-label">Expired Date</label>
                            <div class="col-sm-10">
                                <input required value="{{ old('expired_date') }}" type="date"
                                    class="form-control rounded__10 @error('expired_date')
                                is-invalid
                            @enderror"
                                    id="expired_date" name="expired_date">
                                @error('expired_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select required
                                    class="form-select rounded__10 @error('category_id')
                                is-invalid
                            @enderror"
                                    name="category_id" aria-label="Default select example">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                            <div class="col-sm-10">
                                <select required
                                    class="form-select rounded__10 @error('merk_id')
                                is-invalid
                            @enderror"
                                    name="merk_id" aria-label="Default select example">
                                    @foreach ($merks as $merk)
                                        <option value="{{ $merk->id }}">{{ $merk->name }}</option>
                                    @endforeach
                                </select>
                                @error('merk_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
