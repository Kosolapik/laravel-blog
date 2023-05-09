<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use App\Jobs\StoreUserJob;

class UserController extends BaseController
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $password = str()->random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to( $data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
        // StoreUserJob::dispatch($data);
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.show', compact('user', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect()->route('admin.user.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
