<?php

namespace App\Http\Controllers\dashboard\PiemTravel;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

use App\Http\Controllers\Controller;
use App\DataTransferObjects\KategoriData;
use App\Actions\dashboard\Kategori\KategoriAction;
use App\Actions\dashboard\Kategori\KategoriActionDelete;

class CategoryController extends Controller
{
    public function index()
    {
        $limit = 10;
        $kategoris = Category::orderBy('name','asc')->paginate($limit);
        $count = $kategoris->count();
        $no = $limit * ($kategoris->currentPage() - 1);
        return view('content.dashboard.data.piem-travel.category.index', compact('kategoris', 'count', 'no', 'limit'));
    }

    public function create()
    {
        return view('content.dashboard.data.piem-travel.category.create');
    }

    public function store(KategoriData $KategoriData, KategoriAction $kategoriAction)
    {
        $kategoriAction->execute($KategoriData);
        flash()->success('Category created successfully');
        return redirect()->route('dashboard.kategori.index');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('content.dashboard.data.piem-travel.category.edit', compact('category'));
    }

    public function update(KategoriData $KategoriData, KategoriAction $kategoriAction, $slug)
    {
        $kategoriAction->execute($KategoriData, $slug);
        flash()->success('Category updated successfully');
        return redirect()->route('dashboard.kategori.index');
    }

    public function destroy(KategoriActionDelete $KategoriActionDelete, $slug)
    {
        $KategoriActionDelete->execute($slug);
        flash()->success('Category deleted successfully');
        return redirect()->route('dashboard.kategori.index');
    }
}
