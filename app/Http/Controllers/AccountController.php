<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if(!Account::where('user_id',$user->id)->exists()){
            Account::create(['user_id' => $user->id]);
        }

        $account = $user->account;

        return view('account.index',compact('account'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'firstname' => 'required|string',
            'img' => 'required|image|mimes:png,jpg,webp|max:1024'
        ]);

        $account->firstname = $request->firstname;
        $account->save();

        $account->saveFromRequest('avatar',$request->img);

        return redirect()->back()->with('message','บันทึกเสร็จสิ้น');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
