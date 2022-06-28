<?php

namespace App\Jobs;

use App\Models\ShortLink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DeactivateLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private int $link_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $link_id)
    {
        $this->link_id = $link_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       ShortLink::where('id', $this->link_id)->update(['is_active' =>false]);
    }
}
