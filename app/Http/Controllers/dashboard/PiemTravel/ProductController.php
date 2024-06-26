<?php

namespace App\Http\Controllers\dashboard\PiemTravel;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\ProductData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\dashboard\Product\ProductAction;
use App\Actions\dashboard\Product\ProductActionDelete;

class ProductController extends Controller
{
    public function index()
    {
        $categorys = Category::orderBy('name','asc')->get();
        return view('content.dashboard.data.piem-travel.product.index', compact('categorys'));
    }


    public function create()
    {
        $categorys = Category::orderBy('name','asc')->get();
        return view('content.dashboard.data.piem-travel.product.create', compact('categorys'));
    }

    public function dataTable(Request $request)
    {
        $products = Produk::with('category')->select('id', 'name', 'description', 'image', 'price', 'stock', 'status', 'slug');

        if($request->status){
            $products->where('status', $request->status);
        }

        if($request->category){
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->category);
            });
        }


        return DataTables::of($products)
            ->addColumn('image', function ($product) {
                return asset('storage/images/products/' . $product->image);
            })
            ->addColumn('price', function ($product) {
                return 'Rp. ' . number_format($product->price, 0, ',', '.');
            })
            ->addColumn('category', function ($product) {
                $categorys = $product->category->pluck('name')->implode(',');
                return $categorys;
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.list.product.show', $row->slug) . '" class="btn btn-sm btn-rounded btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.list.product.edit', $row->slug) . '" class="btn btn-sm btn-rounded btn-primary"><i class="mdi mdi-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-rounded btn-danger" id="btn-delete"><i class="mdi mdi-delete"></i></button>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function store(ProductData $productData, ProductAction $productAction)
    {
        $productAction->execute($productData);
        flash()->success('Success Add Product');
        return redirect()->route('dashboard.list.product.index');
    }

    public function show(Produk $product)
    {
        return view('content.dashboard.data.piem-travel.product.show', compact('product'));
    }

    public function edit(Produk $product)
    {
        $categorys = Category::orderBy('name','asc')->get();
        return view('content.dashboard.data.piem-travel.product.edit', compact('product','categorys'));
    }

    public function update(ProductData $productData, ProductAction $productAction,Produk $product)
    {
        $productAction->execute($productData, $product);
        flash()->success('Success Update Product');
        return redirect()->route('dashboard.list.product.index');
    }

    public function destroy(ProductActionDelete $productActionDelete,Produk $product)
    {
        $action = $productActionDelete->execute($product);
        if ($action) {
            return response()->json(['success' => true]);
        }else {
            return response()->json(['success' => false]);
        }
    }
}
