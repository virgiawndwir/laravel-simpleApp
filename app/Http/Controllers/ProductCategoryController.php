<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategory;
use App\Http\Requests\UpdateProductCategory;

use DB;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = ProductCategory::orderBy('id', 'asc')->get();
        return view('product-category.index', compact('datas'));
    }

    public function create()
    {
        return view('product-category.create');
    }

    public function store(StoreProductCategory $request)
    {
        DB::beginTransaction();
        try{
            $input = $request->only([
                'name',
            ]);
            
            $data = ProductCategory::create($input);
            if($data){
                DB::commit();
                return redirect()->route('product-categories.index')->with(['success' => 'Data berhasil ditambahkan!']);
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
        $data = ProductCategory::findOrFail($id);

        return view('product-category.edit', compact('data', 'id'));
    }

    public function update(UpdateProductCategory $request, $id)
    {
        DB::beginTransaction();
        try{
            $input = $request->only([
                'name',
            ]);
            
            $data = ProductCategory::findOrFail($id);
            if($data->update($input)){
                DB::commit();
                return redirect()->route('product-categories.index')->with(['success' => 'Data berhasil diubah!']);
            }

            return redirect()->back()->with(['error' => 'Data gagal diubah!']);
        } catch (\Exception $e){
            DB::rollback();

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $data = ProductCategory::findOrFail($id);
        if($data->delete()){
            return redirect()->back()->with(['success' => 'Data berhasil dihapus!']);
        }

        return redirect()->back()->with(['error' => 'Data gagal diubah!']);
    }
}
