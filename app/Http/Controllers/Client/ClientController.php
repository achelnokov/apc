<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Services\Client\ClientService;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    protected $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function list(Request $request) {
        return Inertia::render('clients/List', [
            'clients_list' => (new Client())->paginate(15),
        ]);
    }

    public function create(CreateClientRequest $request) {
        $title = $request->get('title');
        $this->service->create($title);
    }
}
