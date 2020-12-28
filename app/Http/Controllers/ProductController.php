<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Product::with('productCategory')->orderBy('id', 'asc')->get();
        return view('product.index', compact('datas'));
    }

    public function create()
    {
        $prods = ProductCategory::get();
        return view('product.create', compact('prods'));
    }

    public function store(StoreProduct $request)
    {
        DB::beginTransaction();
        try{
            $input = $request->only([
                'name',
                'product_category_id',
                'price',
                'quantity',
                'qty',
            ]);
            
            $data = Product::create($input);
            if($data){
                DB::commit();
                return redirect()->route('products.index')->with(['success' => 'Data berhasil ditambahkan!']);
            }

            return redirect()->back()->with(['error' => 'Data gagal ditambahkan!']);
        } catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $prods = ProductCategory::get();

        return view('product.edit', compact('data', 'id', 'prods'));
    }

    public function update(UpdateProduct $request, $id)
    {
        DB::beginTransaction();
        try{
            $input = $request->only([
                'name',
                'product_category_id',
                'price',
                'quantity',
                'qty',
            ]);
            
            $data = Product::findOrFail($id);
            if($data->update($input)){
                DB::commit();
                return redirect()->route('products.index')->with(['success' => 'Data berhasil diubah!']);
            }

            return redirect()->back()->with(['error' => 'Data gagal diubah!']);
        } catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if($data->delete()){
            return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
        }

        return redirect()->back()->with(['error' => 'Data gagal diubah!']);
    }
}
