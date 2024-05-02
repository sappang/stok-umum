<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Category;
use App\Traits\HasImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use  HasImage;
    
    private $path = 'public/categories/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::search('name')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('backoffice.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $image = $this->uploadImage($request, $this->path);

        Category::create([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $image = $this->uploadImage($request, $this->path);

        $category->update([
            'name' => $request->name,
        ]);

        if($request->file('image')){
            $this->updateImage($this->path, $category, $name = $image->hashName());
        }

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::disk('local')->delete($this->path. basename($category->image));

        $category->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
