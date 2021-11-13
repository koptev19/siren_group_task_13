<?php

namespace App\Observers;

use App\Models\Deal;

class DealObserver
{
    /**
     * @param Deal $deal
     *
     * @return void
     */
    public function created(Deal $deal)
    {
        \App\Jobs\DealCreatedStatisticJob::dispatch($deal);
    }

    /**
     * @param Deal $deal
     *
     * @return void
     */
    public function updated(Deal $deal)
    {
        \App\Jobs\DealUpdatedStatisticJob::dispatch($deal);
    }

    /**
     * @param Deal $deal
     *
     * @return void
     */
    public function deleted(Deal $deal)
    {
        \App\Jobs\DealDeletedStatisticJob::dispatch($deal);
    }

}
