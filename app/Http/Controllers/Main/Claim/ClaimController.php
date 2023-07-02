<?php

namespace App\Http\Controllers\Main\Claim;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Claim\Search\SearchRequest;
use App\Http\Requests\Claim\StoreRequest;
use App\Models\Claim;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ClaimController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', Role::ROLE_STUDENT)->get();
        return view('claim.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('claim.show', compact('user'));
    }

    public function store(StoreRequest $request, User $user)
    {
        $data = $request->validated();
        $data['claim_file'] = Storage::disk('public')->put('/claims', $data['claim_file']);

        Claim::create($data);

        return redirect()->route('claim.index');
    }

    public function search(SearchRequest $request)
    {
        $search = $request->search;

        $users = User::where(function ($query) use ($search) {
            $query->where('surname', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('middleName', 'like', "%$search%");
        })->where(function ($query) {
            $query->where('role_id', Role::ROLE_STUDENT);
        })->get();

        return view('claim.index', compact('users'));
    }

    public function report()
    {
        $user = auth()->user();
        $claims = $user->claims_teacher()->orderBy('created_at', 'desc')->get();
        return view('claim.report', compact('user', 'claims'));
    }
}
