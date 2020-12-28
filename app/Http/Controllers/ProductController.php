<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;

use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Product::with('productCategory')->orderBy('id', 'asc')->get();
        return view('product.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);

        return view('product.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if($data->delete()){
            return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
        }

        return redirect()->back()->with(['error' => 'Data gagal diubah!']);
    }
}
