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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        $penjualan->profit = 0;
        $penjualan->discount = $request->diskon;
        $penjualan->status = true;
        $penjualan->update();
        
        $detail = SaleDetail::where('sale_id', $penjualan->id_penjualan)->get();
        foreach ($detail as $item) {
            $item->diskon = $request->diskon;
            $item->update();

            $produk = Product::find($item->product_id);
            $produk->stock -= $item->qty;
            $produk->update();
        }

        return redirect()->route('transaksi.selesai');
    }

    public function selesai()
    {
        $setting = Setting::first();

        return view('sale.selesai', compact('setting'));
    }

    public function notaKecil()
    {
        $setting = Setting::first();
        // dd($setting);
        $penjualan = Sale::find(session('id_penjualan'));
        if (! $penjualan) {
            abort(404);
        }
        $detail = SaleDetail::with('product')
            ->where('sale_id', session('id_penjualan'))
            ->get();
        
        return view('sale.nota_kecil', compact('setting', 'penjualan', 'detail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}