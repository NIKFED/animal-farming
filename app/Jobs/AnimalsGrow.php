<?php

namespace App\Jobs;

use App\Models\Animal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AnimalsGrow implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $animals = Animal::query()->get();

        // Берём не выросших животных
        $filtered = $animals->filter(function ($value, $key) {
            return $value->size !== $value->kind->max_size;
        });

        foreach ($filtered as $animal) {
            $animal->age++;
            $animal->size += $animal->kind->growth_factor;
            $animal->save();
        }
    }
}
