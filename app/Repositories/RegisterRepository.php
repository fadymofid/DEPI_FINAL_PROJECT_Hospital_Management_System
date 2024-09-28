<?php

namespace App\Repositories;
use App\Models\User;
use App\Services\Messages;

class RegisterRepository
{
    public function create_user($data)
    {
        if(!isset($data['password'])){
            $data['password'] = rand(0,99999);
        }

        // Create the user
        User::query()->create($data);

        // Fetch the localized success message from lang/ar/keywords.php
        $successMessage = __('keywords.success_msg');

        // Return success message as JSON
        return response()->json(['success' => $successMessage]);
    }
}
