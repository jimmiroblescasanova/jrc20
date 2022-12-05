<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Controllers\Controller;

class AdminClientsController extends Controller
{
    public function index() {
        $clients = Client::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.clients', [
            'clients' => $clients,
        ]);
    }

    public function unsuscribe(Client $client)
    {
        $client->update([
            'unsuscribe_at' => NOW(),
        ]);

        flash()->addSuccess('Baja procesada con éxito');

        return back();
    }
}
