<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Merk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Toko Rian | Barang';
        $product = Product::orderBy('name')->get();
        $categories = DB::table('products')->join('categories', 'categories.id', '=', 'products.category_id')->selectRaw('count(products.id) as jumlah, category_id, categories.name')->groupBy('category_id')->get();
        return view('product.product', compact('product', 'categories', 'title'));
    }

    public function getProducts()
    {
        $product = Product::orderBy('name')->get();
        $data = array();
        foreach ($product as $item) {
            $data['id'] = $item->id;
            $data['name'] = $item->name;
            $data['unit'] = $item->unit;
            $data['purchase_price'] = $item->purchase_price;
            $data['selling_price'] = $item->selling_price;
            $data['wholesale_price'] = $item->wholesale_price;
            $data['stock'] = $item->stock;
            $data['expired_date'] = $item->expired_date;
            $data['action'] = '<a href="#" class="btn btn-sm btn-primary edit" id="' . $item->id . '"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-sm btn-danger delete" id="' . $item->id . '"><i class="fa fa-trash"></i></a>';
        }
        return DataTables::of($product)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Toko Rian | Barang';
        $categories = DB::table('categories')->get();
        $merks = Merk::orderBy('name')->get();
        return view('product.create', compact('categories',  'merks', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menyeleksi data yang akan diinputkan
        $validated = $request->validate([
            'id' => 'required|unique:products',
            'category_id' => 'required',
            'merk_id' => 'required',
            'name' => 'required',
            'unit' => 'required',
            'contain' => 'required',
            'discount' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'wholesale_price' => 'required',
            'expired_date' => 'required',
            'stock' => 'required',
        ]);
        
        // dd($request->all());
        
        // menginput data ke table products
        // dd($validated);
        Product::create($validated);

        // jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('barang.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data product berdasarkan id yang dipilih
        Product::destroy($id);

        // jika data berhasil dihapus, akan kembali ke halaman utama
        return response(null, 200);;
    }
}