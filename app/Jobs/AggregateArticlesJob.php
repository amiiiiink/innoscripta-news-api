<?php

namespace App\Jobs;

use App\Services\Aggregation\AggregationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

#[Schedule('everyTenSeconds')]
class AggregateArticlesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $keyword;

    /**
     * Create a new job instance.
     */
    public function __construct(string $keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * Execute the job.
     * @param AggregationService $aggregationService
     */
    public function handle(AggregationService $aggregationService): void
    {
        $aggregationService->aggregate($this->keyword);
    }
}
