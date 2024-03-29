<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Setting;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $penjualan = Sale::findOrFail($request->id_penjualan);
        $penjualan->total_item = $request->total_item;
        $penjualan->total_price = $request->total;
        $penjualan->pay = $request->dibayar;
        $penjualan->change = $request->dibayar - $request->total;
        $penjualan->discount = $request->diskon;
        $penjualan->status = true;

        $detail = SaleDetail::where('sale_id', $penjualan->id)->get();
        foreach ($detail as $item) {
            // $item->discount = $request->diskon;
            // $item->update();

            $produk = Product::find($item->product_id);
            $produk->stock -= $item->qty;
            $produk->update();

            $profit = ($item->selling_price - $item->purchase_price) * $item->qty;
            $penjualan->profit += $profit - ($item->discount * $item->qty);
            $penjualan->discount += $item->discount;
        }
        $penjualan->profit -= $request->diskon;
        $penjualan->update();

        return redirect()->route('transaksi.selesai');
    }

    public function selesai()
    {
        $title = 'POS TOKO | Nota';
        $setting = Setting::first();

        return view('sale.selesai', compact('setting', 'title'));
    }

    public function notaKecil()
    {
        $title = 'POS TOKO | Nota';
        $setting = Setting::first();
        // dd($setting);
        $penjualan = Sale::find(session('id_penjualan'));
        if (!$penjualan) {
            abort(404);
        }
        $detail = SaleDetail::with('product')
            ->where('sale_id', session('id_penjualan'))
            ->get();

        return view('sale.nota_kecil', compact('setting', 'penjualan', 'detail', 'title'));
    }

    public function laporanBulanan()
    {
        $title = 'POS TOKO | Laporan';
        $setting = Setting::first();
        $sales = Sale::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->where('status', true)
            ->orderBy('id', 'desc')
            ->get();
        $report = Sale::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->selectRaw('sum(total_price) as income, sum(profit) as profit, sum(id) as total_transaction, sum(total_item) as total_item')
            ->get();
        return view('report.monthly', compact('setting', 'sales', 'title', 'report'));
    }

    public function showReport($id)
    {
        $title = 'POS TOKO | Laporan';
        $setting = Setting::first();
        $sales = Sale::join('sale_details', 'sales.id', '=', 'sale_details.sale_id')
            ->join('products', 'sale_details.product_id', '=', 'products.id')
            ->select('sales.id', 'sales.created_at', 'sale_details.*', 'products.name as product_name', 'products.purchase_price as purchase_price', 'products.selling_price as selling_price')
            ->where("sales.id", $id)
            ->get();
        // dd($sales);
        return view('report.show', compact('setting', 'sales', 'title'));
    }
}
