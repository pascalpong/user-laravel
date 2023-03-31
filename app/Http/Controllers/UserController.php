<?php

namespace App\Http\Controllers;

use App\Models\TableUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $table_user = new TableUser();
        $table_user->first_name = $request->first_name;
        $table_user->last_name = $request->last_name;
        $table_user->position = $request->position;
        $table_user->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        $table_user = TableUser::find($request->id);
        $table_user->first_name = $request->first_name;
        $table_user->last_name = $request->last_name;
        $table_user->position = $request->position;
        $table_user->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $table_user = TableUser::find($request->id);
        $table_user->deleted_at = now();
        $table_user->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $user = TableUser::find($id);
        return view('user.edit',["user"=>$user]);
    }
}
