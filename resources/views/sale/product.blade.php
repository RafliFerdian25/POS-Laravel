<div class="modal fade" data-bs-backdrop="false" id="modal-produk" tabindex="-1" role="dialog"
    aria-labelledby="modal-produk" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Produk</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-produk">
                    <thead>
                        {{-- <th width="5%">No</th> --}}
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Isi</th>
                        <th>Harga Jual</th>
                        <th>Expired Date</th>
                        <th>Stok</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)
                        <tr>
                            {{-- <td width="5%">{{ $key+1 }}</td> --}}
                            <td><span class="label label-success">{{ $item->id }}</span></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->contain }}</td>
                            <td>{{ $item->purchase_price }}</td>
                            <td>{{ $item->expired_date }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-xs btn-flat"
                                    onclick="pilihProduk('{{ $item->id }}')">
                                    <i class="fa fa-check-circle"></i>
                                    {{-- Pilih --}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>