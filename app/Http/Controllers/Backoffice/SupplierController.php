<?php

namespace App\Http\Controllers\Backoffice;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::search('name')
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('backoffice.supplier.index', compact('suppliers'));
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
    public function store(SupplierRequest $request)
    {
        Supplier::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address,
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
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address,
        ]);

        return back()->with('toast_success','Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return back()->with('toast_success', 'Data berhasil dihapus');
    }
}
