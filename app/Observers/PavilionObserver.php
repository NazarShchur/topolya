<?php

namespace App\Observers;

use App\Model\Additional;
use App\Model\Pavilion;

class PavilionObserver
{
    /**
     * Handle the pavilion "created" event.
     *
     * @param \App\Model\Pavilion $pavilion
     * @return void
     */
    public function created(Pavilion $pavilion)
    {
        $add = new Additional();
        $add->name = $pavilion->name;
        $add->is_hourly = false;
        $add->price = $pavilion->price;
        $add->is_active = false;
        $add->save();
    }

    /**
     * Handle the pavilion "updated" event.
     *
     * @param \App\Model\Pavilion $pavilion
     * @return void
     */
    public function updated(Pavilion $pavilion)
    {
        if ($pavilion->isDirty('name')) {
            $add = Additional::all()->firstWhere('name', '=', $pavilion->getOriginal('name'));
        } else {
            $add = Additional::all()->firstWhere('name', '=', $pavilion->name);
        }
        $add->name = $pavilion->name;
        $add->price = $pavilion->price;
        $add->save();
    }

    /**
     * Handle the pavilion "deleted" event.
     *
     * @param \App\Model\Pavilion $pavilion
     * @return void
     */
    public function deleted(Pavilion $pavilion)
    {
        //
    }

    /**
     * Handle the pavilion "restored" event.
     *
     * @param \App\Model\Pavilion $pavilion
     * @return void
     */
    public function restored(Pavilion $pavilion)
    {
        //
    }

    /**
     * Handle the pavilion "force deleted" event.
     *
     * @param \App\Model\Pavilion $pavilion
     * @return void
     */
    public function forceDeleted(Pavilion $pavilion)
    {
        //
    }
}
