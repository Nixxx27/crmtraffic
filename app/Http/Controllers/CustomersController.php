<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;

use App\Gateway\Interfaces\NMIApiGatewayInterface;

use App\Gateway\NMIApiGateway;


class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     * Authenticated users only
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Customer::latest()->get();

        if ($request->ajax()) {
            // $data = Customer::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('customers.index', [
            'customers' => $data
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'email' => 'required|email|max:255|unique:customers',
            'mobile' => 'required',
        ]);

        if ($v->fails()) {
            return back()->with('status', $v->errors());
        }

        Customer::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'email'   => $request->email,
        ], [
            'name' => $request->firstname,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address'     => $request->address,
            'mobile'     => $request->mobile,
            'membership_type'     => 'corporation'
        ]);

        $this->saveCustomerToVault($request);

        // return back()->with('status', 'New Customer has been created');
        return redirect('customers')->with('status', ' New Customer has been created');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCustomerVault()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveCustomerToVault($data)
    {
    }
}
