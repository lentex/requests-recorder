<?php

namespace Lentex\RequestsRecorder\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Lentex\RequestsRecorder\Actions\RecordRequest;

class RecordMiddleware
{
    public function __construct(private RecordRequest $recordRequest)
    {
    }

    public function handle(Request $request, Closure $next): mixed
    {
        ($this->recordRequest)($request);

        return $next($request);
    }
}
