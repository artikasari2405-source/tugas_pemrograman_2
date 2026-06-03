<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customers.index', [
            'title' => 'Data Customer',
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create', [
            'title' => 'Tambah Customer'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_customer' => 'required|max:255',
                'alamat' => 'required',
                'nomor_telepon' => 'required',
                'umur' => 'required|numeric',
                'status' => 'required',
            ],
            [
                'nama_customer.required' => 'Nama customer tidak boleh kosong',
                'nama_customer.max' => 'Nama customer maksimal 255 karakter',

                'alamat.required' => 'Alamat tidak boleh kosong',

                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',

                'umur.required' => 'Umur tidak boleh kosong',
                'umur.numeric' => 'Umur harus berupa angka',

                'status.required' => 'Status harus dipilih',
            ]
        );

        Customer::create($validated);

        return to_route('customers.index')
            ->withSuccess('Data customer berhasil ditambahkan');
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
    public function edit(Customer $customers)
    {
        return view('customers.edit', [
            'title' => 'Edit Customer',
            'customer' => $customers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customers)
    {
        $validated = $request->validate([
            'nama_customer' => 'required|max:255',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'umur' => 'required|numeric',
            'status' => 'required',
        ], [
            'nama_customer.required' => 'Nama customer tidak boleh kosong',
            'nama_customer.max' => 'Nama customer maksimal 255 karakter',

            'alamat.required' => 'Alamat tidak boleh kosong',

            'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',

            'umur.required' => 'Umur tidak boleh kosong',
            'umur.numeric' => 'Umur harus berupa angka',

            'status.required' => 'Status harus dipilih',
        ]);

        $customers->update($validated);

        return to_route('customers.index')
            ->withSuccess('Data customer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
