<?php

namespace App\Listeners;

use App\Models\Seguridad\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogSuccessFullLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event)
    {

        $token = Login::where('user_id', Auth::user()->id)->get();
        $lastToken = $token->last();

        $login = $event->user->logins->where('session_token', $lastToken->session_token)->first();

         if ($login)
        {
            $login->logout_at = \Carbon\Carbon::now();
            $login->save();
        }


    }
}
