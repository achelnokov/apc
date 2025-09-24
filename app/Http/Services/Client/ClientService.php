<?php 

namespace App\Http\Services\Client;

use App\Http\Services\Log\LogService;
use App\Models\Client;

class ClientService {

    public const CREATE_ACTION = 'client_create';

    public function create(string $title) {
        $client = new Client();
        $client->title = $title;
        $client->save();

        if (!empty($client->id)) {
            LogService::create(self::CREATE_ACTION, $client->id, auth()->id(), new_value: $client->title);
        }
    }
}