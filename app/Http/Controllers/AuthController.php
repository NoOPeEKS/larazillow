<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create() {
        return inertia('Auth/Login');
    }

    public function store(Request $request) {
        // Create the session if data valid
    }

    public function destroy(Request $request) {
        // Destroy the session logging out user
    }
}
