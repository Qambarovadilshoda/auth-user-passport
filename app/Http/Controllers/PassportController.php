<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCheckPassportRequest;
use App\Http\Requests\StoreCheckUpdatedPassportRequest;

class PassportController extends Controller
{
    public function show($id)
{
    $user = Auth::user();
    $passport = Passport::findOrFail($id); 

    if ($user->id == $passport->user_id) {
        return view('passport.show', compact('passport'));
    }

    return redirect()->route('home');
}

    public function create()
    {
        $user = Auth::user();
        if ($user->passport) {
            return redirect()->route('home');
        }
        return view('passport.create');
    }
    public function store(StoreCheckPassportRequest $request)
    {
        $user = Auth::user();

        $passport = new Passport();
        $passport->user_id = $user->id;
        $passport->passport_number = $request->passport_number;
        $passport->issue_date = $request->issue_date;
        $passport->expiry_date = $request->expiry_date;
        $passport->save();

        return redirect()->route('home');
    }
    public function edit($id)
    {
        $user = Auth::user();
        $passport = Passport::findOrFail($id);
        if ($passport->user_id != $user->id) {
            return redirect()->route('home');
        }
        return view('passport.edit', compact('passport'));
    }
    public function update(StoreCheckUpdatedPassportRequest $request, $id)
    {
        $user = Auth::user();
        $passport = Passport::findOrFail($id);

        if ($passport->user_id != $user->id) {
            return redirect()->route('home');
        }
        if ($request->passport_number !== $passport->passport_number) {
            $passport->passport_number = $request->passport_number;
        }
        $passport->issue_date = $request->issue_date;
        $passport->expiry_date = $request->expiry_date;
        $passport->save();
        return redirect()->route('home');
    }
    public function destroy($id)
    {
        $passport = Passport::findOrFail($id);
        $user = Auth::user();

        if ($passport->user_id != $user->id) {
            return redirect()->route('home');
        }
        $passport->delete();
        return redirect()->route('home');
    }
}
