<?php

use Illuminate\Support\Facades\Route;
use Lentex\RequestsRecorder\Models\IncomingRequest;

Route::get('/incoming-requests', function () {
    return view('requestsrecorder::index', ['requests' => IncomingRequest::all()]);
});
