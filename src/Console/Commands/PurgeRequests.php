<?php

namespace Lentex\RequestsRecorder\Console\Commands;

use Illuminate\Console\Command;
use Lentex\RequestsRecorder\Models\IncomingRequest;

class PurgeRequests extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'incoming-requests:purge';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Purge all recorded requests';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        IncomingRequest::query()->delete();

        return self::SUCCESS;
    }
}
