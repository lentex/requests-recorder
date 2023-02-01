<?php

use Lentex\RequestsRecorder\Models\IncomingRequest;

beforeEach(function () {
    $incomingRequest = new IncomingRequest();
    $incomingRequest->method = 'GET';
    $incomingRequest->uri = '/foo';
    $incomingRequest->body = ['foo' => 'bar'];
    $incomingRequest->save();

    $incomingRequest2 = $incomingRequest->replicate();
    $incomingRequest2->save();
});

it('purges all requests', function () {
    $this->assertDatabaseCount(IncomingRequest::class, 2);

    $this->artisan('incoming-requests:purge');

    $this->assertDatabaseCount(IncomingRequest::class, 0);
});
