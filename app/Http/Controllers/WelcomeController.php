<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

final class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function __invoke(): Response
    {
        return Inertia::render('Welcome');
    }
}
