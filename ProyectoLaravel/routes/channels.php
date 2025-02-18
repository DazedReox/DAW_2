<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Aquí puedes registrar todos los canales de transmisión de eventos que
| tu aplicación soportará. Los callbacks especificados aquí se ejecutarán
| cuando el sistema compruebe si un usuario autenticado puede escuchar el canal.
|
*/

Broadcast::channel('user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
