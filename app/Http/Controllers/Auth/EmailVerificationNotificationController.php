<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

final readonly class EmailVerificationNotificationController
{
    public function __invoke(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = $request->user();

        $user->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
