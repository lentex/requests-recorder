<?php

namespace Lentex\RequestsRecorder\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Lentex\RequestsRecorder\Models\IncomingRequest;

class RecordRequest
{
    public function __invoke(Request $request)
    {
        if (in_array(Str::upper($request->method()), config('requestsrecorder.included_methods'))) {
            $incomingRequest = new IncomingRequest();
            $incomingRequest->method = $request->method();
            $incomingRequest->uri = $request->getRequestUri();
            $incomingRequest->body = $request->json()->all();
            $incomingRequest->save();
        }
    }
}
