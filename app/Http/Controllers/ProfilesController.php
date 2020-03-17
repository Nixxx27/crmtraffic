<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



use App\Rules\MatchOldPassword;



use Illuminate\Routing\Redirector;
use App\Http\Controllers\Redirect;


use DataTables;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
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
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {

    //                 $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

    //                 return $btn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('users');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $profile = Profile::getProfileByUserID($user->id);

        return view(
            'profile.index',
            [
                'user' => $user,
                'profile' => $profile,
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Profile::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'user_id'   => $request->user_id,
        ], [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role_id'     => $request->role_id,
            'status' => $request->status,
            'address'     => $request->address,
            'mobile'     => $request->mobile,
        ]);

        // Session::flash('message', "Your profile has been updated");
        // return redirect()->back();
        return back()->with('status', 'Your profile has been updated');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {

        $v = Validator::make($request->all(), [

            'inputCurrentPassword' => ['required', new MatchOldPassword],
            'inputNewPassword' => ['required'],
            'inputConfirmPassword' => ['same:inputNewPassword'],

        ]);

        if ($v->fails()) {
            return back()->with('status', $v->errors());
        }

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->inputNewPassword)]);

        return back()->with('status', 'Your Password has been updated');
    }
}
