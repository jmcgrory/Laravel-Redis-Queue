<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class WakeUp
 * @package App\Jobs
 */
class WakeUp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var bool */
    private $willWakeUp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->willWakeUp = (bool) rand(0, 1);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo ($this->willWakeUp) ? "You have awoken!" : "Nothing can stir you from your slumber.";
    }
}
