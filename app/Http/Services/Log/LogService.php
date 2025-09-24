<?php 

namespace App\Http\Services\Log;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogService {

    public static function create(string $action, int $entity_id = 0, int $user_id = 0, string $old_value = '', string $new_value = '') {
        $log = new Log();
        $log->action = $action;
        $log->entity_id = $entity_id;
        $log->user_id = empty($user_id) ? Auth::id() : $user_id;
        $log->old_value = $old_value;
        $log->new_value = $new_value;
        
        try {
            $log->save();
        } catch (\Exception $e) {}
    }

}