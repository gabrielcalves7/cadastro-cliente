<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        $fields = $this->customer->getFormFields();

        $searchParams = [];

        if (request()->get('search') != null) {
            foreach (request()->get('search') as $key => $value) {
                if (!empty($value)) {
                    $searchParams[$key] = $value;
                }
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

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $customer = $this->customer;
        if ($request->id != null) {
            $customer->setId($request->id);
        }
        $data = $request->validate($customer->getRules());
        $customer = $this->customer->make($data);

        $saved = $customer->updateOrCreate();

        if($saved){
            return redirect()->route('customers.index')->with(
                'success',
                'Customer created successfully.'
            );
        }

        $emailInUse = $this->customer::where('email',$request->email);
        $documentInUse = $this->customer::where('document',$request->document);

        $errorMessage = "";

        if($emailInUse){
            $errorMessage = 'Email is already taken.';
        }

        else if($documentInUse){
            $errorMessage = 'Document is already taken.';
        }

        return redirect()->back()->withInput()->with(
            'error',
            'Couldnt create customer. '.$errorMessage
        );
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
