<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function list(Request $request) {
        return Inertia::render('clients/List', [
            'TEST_PARAM' => [1,3],
        ]);
    }
}
