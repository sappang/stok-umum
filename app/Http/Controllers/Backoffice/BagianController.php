<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Bagian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bagians = Bagian::when(request()->search, function($search){
            $search = $search->where('nama_bagian', 'like', '%'. request()->search. '%');
        })->paginate(10);

        return view('backoffice.bagian.index', compact('bagians'));
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
    public function store(Request $request)
    {
        $request->validate([
            'nama_bagian' => 'required|unique:bagians',
            'logo'=> 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        Bagian::create($request->all());

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
    public function update(Request $request, Bagian $bagian)
    {
        $request->validate([
            'nama_bagian' => 'required','unique:bagians,nama bagian'. $bagian,
            'logo'=> 'nullable|mimes:png,jpg,jpeg|max:2048'
        ]);

        $bagian->update($request->all());

        return back()->with('toast_success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bagian $bagian)
    {
        $bagian->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
