<?php

namespace App\Http\Controllers\Main\Admin\User\Trash;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserTrashController extends Controller
{
    public function index()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.user.trash.index', compact('users'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('admin.user.trash.index');
    }

    public function force($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('admin.user.trash.index');
    }
}
