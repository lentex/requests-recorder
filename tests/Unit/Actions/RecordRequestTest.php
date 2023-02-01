<?php

use Illuminate\Http\Request;
use Lentex\RequestsRecorder\Actions\RecordRequest;
use Lentex\RequestsRecorder\Models\IncomingRequest;

it('ignores excluded methods', function () {
    $request = Request::create('foo', 'OPTIONS');

    (new RecordRequest())($request);

    $this->assertDatabaseCount(IncomingRequest::class, 0);
});
