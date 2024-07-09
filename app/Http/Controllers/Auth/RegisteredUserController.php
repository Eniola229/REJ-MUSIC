<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'avatar' => ['required', 'image', 'max:2048'],
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:55'],
            'bio' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


         // Handle avatar upload and resizing
         if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarSize = $avatarFile->getSize();

            // Check if the avatar exceeds 2MB
            if ($avatarSize > 2048000) { // 2MB in bytes (1 MB = 1024 KB = 1024 * 1024 bytes)
                // Resize the image to reduce file size
                $image = Image::make($avatarFile)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                // Store the resized avatar
                 $avatarPath = $request->file('avatar')->store('public/avatars');
                 $avatarPath = str_replace('public/', '', $avatarPath);
            } else {
                // Avatar is within 2MB size limit, store it as usual
                $avatarPath = $request->file('avatar')->store('public/avatars');
                $avatarPath = str_replace('public/', '', $avatarPath);
            }
         }

        $user = User::create([
            'avatar' => $avatarPath,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

       return redirect('/');
    }
}
