<?php

declare(strict_types=1);

use App\Models\User;

it('logs the user out and redirects to home', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect('/');
    $this->assertGuest();
});
