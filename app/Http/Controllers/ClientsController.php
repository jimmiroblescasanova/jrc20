<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\NewClientRequest;

class ClientsController extends Controller
{
    public function index() {
        $clients = Client::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.clients', [
            'clients' => $clients,
        ]);
    }

    public function newSuscription(NewClientRequest $request) {
        $client = Client::create($request->validated());

        return back()->with('suscribed', $client->name);
    }
}