<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Customer::query();
    
        // Filter by search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        // Filter by location
        if ($request->filled('location')) {
            $query->where('location', $request->input('location'));
        }
    
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }
    
        $customers = $query->paginate(10);
    
        return view('customers.index', compact('customers'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20|unique:customers,phone',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ], [
            'email.unique' => 'The email has already been taken.',
            'phone.unique' => 'The phone number has already been taken.',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        return view ('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:20|unique:customers,phone,' . $customer->id,
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
        ], [
            'email.unique' => 'The email has already been taken.',
            'phone.unique' => 'The phone number has already been taken.',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}