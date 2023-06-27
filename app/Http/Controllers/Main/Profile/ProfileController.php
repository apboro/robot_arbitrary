<?php

namespace App\Http\Controllers\Main\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateRequest;
use App\Interfaces\profile\ProfileInterface;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller implements ProfileInterface
{
    public function index()
    {
        $curators = auth()->user()->teams;
        $groups = auth()->user()->groups;
        $dateCreated = Carbon::parse(auth()->user()->created_at);
        return view('profile.index', compact('dateCreated', 'curators', 'groups'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('profile.index');
    }

    public function password(UpdatePasswordRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        return redirect()->route('profile.index');
    }
}
