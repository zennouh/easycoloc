<?php


use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('colocation.{id}', function ($user, $id) {
    return $user->colocations()->where('id', $id)->exists();
});
