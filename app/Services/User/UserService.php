<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;

class UserService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $password = str()->random(10);
            $data['password'] = Hash::make($password);
            $user = User::firstOrCreate(['email' => $data['email']], $data);
            Mail::to( $data['email'])->send(new PasswordMail($password));
            event(new Registered($user));

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception->getMessage());
            return $exception->getMessage();
            // abort(500);
        }
    }
}