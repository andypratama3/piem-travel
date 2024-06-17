<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\ProductData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\dashboard\Product\ProductAction;

class ProductController extends Controller
{
    public function index()
    {
        return view('content.dashboard.data.product.index');
    }


    public function create()
    {
        $categorys = Category::orderBy('name','asc')->get();
        return view('content.dashboard.data.product.create', compact('categorys'));
    }

    public function dataTable(Request $request)
    {
        $products = Produk::with('category')->select('id', 'name', 'description', 'image', 'price', 'stock', 'status', 'slug');

        return DataTables::of($products)
            ->addColumn('image', function ($product) {
                return asset('storage/images/products/' . $product->image);
            })
            ->addColumn('category', function ($product) {
                $categorys = $product->category->pluck('name')->implode(',');
                return $categorys;
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('dashboard.product.show', $row->slug) . '" class="btn btn-sm btn-rounded btn-warning"><i class="mdi mdi-eye icon-sm"></i></a>
                    <a href="' . route('dashboard.product.edit', $row->slug) . '" class="btn btn-sm btn-rounded btn-primary"><i class="mdi mdi-pen icon-sm"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-rounded btn-danger" id="btn-delete"><i class="mdi mdi-delete icon-sm"></i></button>';
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function store(ProductData $productData, ProductAction $productAction)
    {
        $productAction->execute($productData);
        flash()->success('Success Add Product');
        return redirect()->route('dashboard.product.index');
    }

    public function show(Produk $product)
    {
        return view('content.dashboard.data.product.show', compact('product'));
    }

    public function edit(Produk $product)
    {
        $categorys = Category::orderBy('name','asc')->get();
        return view('content.dashboard.data.product.edit', compact('product','categorys'));
    }

    public function update(ProductData $productData, ProductAction $productAction,Produk $product)
    {
        $productAction->execute($productData, $product);
        flash()->success('Success Update Product');
        return redirect()->route('dashboard.product.index');
    }

    public function destroy(ProductActionDelete $productActionDelete,Produk $product)
    {
        $productActionDelete->execute($product);
        flash()->success('Success Delete Product');
        return redirect()->route('dashboard.product.index');
    }
}
