<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Merk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'POS TOKO | Barang';
        $product = Product::orderBy('name')->get();
        $categories = DB::table('categories')->leftJoin('products', 'categories.id', '=', 'products.category_id')->selectRaw('count(products.id) as jumlah, categories.id as category_id, categories.name')->groupBy('categories.id')->get();
        return view('product.product', compact('product', 'categories', 'title'));
    }
    public function data()
    {
        $product = Product::get();
        $data = array();
        foreach ($product as $item) {
            $row = array();
            $row['id'] = $item->id;
            $row['name'] = $item->name;
            $row['unit'] = $item->unit;
            $row['purchase_price'] = $item->purchase_price;
            $row['selling_price'] = $item->selling_price;
            $row['wholesale_price'] = $item->wholesale_price;
            $row['stock'] = $item->stock;
            $row['expired_date'] = $item->expired_date;
            $row['action'] = '<a href="'.route('barang.edit', $item->id).'" class="btn btn-link btn-lg float-left px-0" id="' . $item->id . '"><i class="fa fa-edit"></i></a>
                        <a href="#" onclick="deleteData(`' . route('barang.destroy', $item->id) . '`)" class="btn btn-link btn-lg float-right px-0 color__red1" id="' . $item->id . '"><i class="fa fa-trash"></i></a>';

            $data[] = $row;
        }
        return DataTables::of($data)
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
        $title = 'POS TOKO | Barang';
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
     * Show the form for editing the specified resource.    
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // menyeleksi data product berdasarkan id yang dipilih
        $product = Product::findOrFail($id);
        $categories = DB::table('categories')->get();
        $merks = Merk::orderBy('name')->get();
        $title = 'POS TOKO | Barang';
        $units = [
            [
                'id' => 'PCS',
                'name' => 'Pieces'
            ],
            [
                'id' => 'PAK',
                'name' => 'Pack'
            ],
            [
                'id' => 'BOX',
                'name' => 'box'
            ],
            [
                'id' => 'LSN',
                'name' => 'Lusin'
            ],
            [
                'id' => 'DUS',
                'name' => 'Dus'
            ],
            [
                'id' => 'SCT',
                'name' => 'Sachet'
            ]

        ];
        return view('product.update', compact('product', 'categories', 'merks', 'title', 'units'));
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
        // menyeleksi data yang akan diinputkan
        if ($request->id == $id) {
            $validated = $request->validate([
                'id' => 'required',
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
        } else {
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
        }


        // mengupdate data di table products
        Product::whereId($id)->update($validated);

        // jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('barang.index')->with('success', 'Produk berhasil diupdate');
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
