<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sales = Sale::with('customer')->paginate(10); // Ambil data penjualan dengan relasi customer
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        //
        return view('sales.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        //
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'product' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);
        $validated['customer_id'] = $customer->id;

        // $customer->sales()->create($validated);
        Sale::create($validated);
        return redirect()->route('customers.show', $customer)
            ->with('success', 'Sale added successfully.');
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
    public function edit(Sale $sale)
    {
        //
        return view('sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'product' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);
        $sale->update($validated);
        return redirect()->route('customers.show', $sale->customer)
            ->with('success', 'Sale updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
        $customer = $sale->customer;
        $sale->delete();

        return redirect()->route('customers.show', $customer)
            ->with('success', 'Sale deleted successfully.');
    }

    public function report(Request $request)
{
    $query = Sale::query()->with('customer');

    // Filter berdasarkan tanggal mulai
    if ($request->filled('start_date')) {
        $query->where('sale_date', '>=', $request->input('start_date'));
    }

    // Filter berdasarkan tanggal akhir
    if ($request->filled('end_date')) {
        $query->where('sale_date', '<=', $request->input('end_date'));
    }

    // Filter berdasarkan customer
    if ($request->filled('customer_id')) {
        $query->where('customer_id', $request->input('customer_id'));
    }

    $sales = $query->orderBy('sale_date', 'desc')->paginate(10);
    $customers = Customer::all(); // Untuk dropdown filter customer

    return view('sales.report', compact('sales', 'customers'));
}

}