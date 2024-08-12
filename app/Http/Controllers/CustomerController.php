<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $fields = [
            [
                "name" => "name",
                "searchable" => true,
            ],
            [
                "name" => "email",
                "searchable" => true,
            ],
            [
                "name" => "birthDate",
                "searchable" => true,
            ],
            [
                "name" => "document",
                "searchable" => true,
            ],

            [
                "name" => "actions",
                "searchable" => false,
            ],
        ];

        $searchParams = [];

        foreach (request()->get('search') as $key => $value) {
            if (!empty($value)) {
                $searchParams[$key] = $value;
            }
        }

        $customers = $this->customer->getPaginatedWithSearch(25, $searchParams);

        return view('customers.index', [
                'customers' => $customers,
                'fields' => $fields,
                'searchParams' => $searchParams
            ]
        );
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->customer->getRules());

        $created = $this->customer->updateOrCreate($request->all());

        return redirect()->route('customers.index')->with(
            $created
                ? 'success'
                : 'error',
            $created
                ? 'Customer created successfully.'
                : 'Couldnt create customer.'
        );
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $customer = $this->customer;
        $customer->setId($request->id);
        $data = $request->validate($customer->getRules());
        $customer = $this->customer->make($data);

        $created = $customer->updateOrCreate($request->all());

        return redirect()->route('customers.index')->with(
            $created
                ? 'success'
                : 'error',
            $created
                ? 'Customer updated successfully.'
                : 'Couldnt update customer.'
        );
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
