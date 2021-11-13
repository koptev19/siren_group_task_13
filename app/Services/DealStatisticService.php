<?php

namespace App\Services;

use App\Models\Deal;

class DealStatisticService
{
    /**
     * @var string
     */
    private $table = 'stat_daily';

    /**
     * @param Deal $deal
     *
     * @return void
     */
    public function addDeal(Deal $deal)
    {
        \DB::statement(
            "INSERT INTO " . $this->table . " (hash, date_at, status_id, deals)
            VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE deals = deals + ?",
            ([
                $this->getHash($deal),
                $deal->created_at->format('Y-m-d'),
                $deal->status_id,
                1,
            ]));
    }

    /**
     * @param Deal $deal
     * @param int $statusId = null
     *
     * @return void
     */
    public function removeDeal(Deal $deal, int $statusId = null)
    {
        \DB::table($this->table)
            ->where('hash', $this->getHash($deal, $statusId))
            ->update([
                'deals' => DB::raw('deals - 1')
            ]);
    }

    /**
     * @param Deal $deal
     * @param int $statusId = null
     *
     * @return string
     */
    protected function getHash(Deal $deal, int $statusId = null): string
    {
        $statusId = $statusId ?: $deal->status_id;

        return $deal->created_at->format('Ymd') . $statusId;
    }
}
