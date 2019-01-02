<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class CountSheep
 * @package App\Jobs
 */
class CountSheep implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels; // Only necessary if passing Models?

    /** @var int */
    private $sleepThreshold;

    /** @int */
    private $fenceHeight;

    /**
     * Returns ms value of length of time it will take to fall asleep
     * @return int
     */
    private function getDozingLength(): int
    {
        if ($this->fenceHeight < 1750) {
            return $this->sleepThreshold * $this->fenceHeight;
        }
        return -1;
    }

    /**
     * @param int   $sleepThreshold     min amount of sheep required to fall asleep
     * @param int   $fenceHeight        mm value of fence height sheep must clear
     * @return void
     */
    public function __construct(int $sleepThreshold, int $fenceHeight)
    {
        $this->sleepThreshold = $sleepThreshold;
        $this->fenceHeight = $fenceHeight;
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $delay = $this->getDozingLength();
        switch ($delay) {
            case -1:
                echo "Sheep can't jump that high, you will never fall asleep.";
                break;
            case 0:
                echo "You are already asleep...";
                break;
            default:
                echo "You will fall asleep in {$delay}ms";
                break;
        }
    }
}
