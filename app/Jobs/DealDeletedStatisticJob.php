<?php

namespace App\Jobs;

use App\Models\Deal;
use App\Services\DealStatisticService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DealDeletedStatisticJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Deal
     */
    protected $deal;

    /**
     * @param Deal $deal
     */
    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dealStatisticService = new DealStatisticService;
        $dealStatisticService->removeDeal($this->deal);
    }
}
