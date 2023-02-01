<?php

use Illuminate\Support\Facades\Route;
use Lentex\RequestsRecorder\Models\IncomingRequest;

it('records request', function () {
    Route::post('/example-route', function () {
        return response()->json(['foo' => 'bar']);
    });

    $this->postJson('example-route', ['foo' => 'bar'], ['Accept' => 'application/json'])->assertOk();

    $this->assertDatabaseCount(IncomingRequest::class, 1);

    $incomingRequest = IncomingRequest::firstOrFail();

    expect($incomingRequest)
        ->method->toEqual('POST')
        ->uri->toEqual('/example-route')
        ->body->toEqual(['foo' => 'bar']);
});
