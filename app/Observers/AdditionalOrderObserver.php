<?php

namespace App\Observers;

use App\Model\AdditionalOrder;

class AdditionalOrderObserver
{
    /**
     * Handle the additional order "created" event.
     *
     * @param  \App\Model\AdditionalOrder  $additionalOrder
     * @return void
     */
    public function created(AdditionalOrder $additionalOrder)
    {
        $order = $additionalOrder->order()->first();
        $order->is_closed = false;
        $order->save();
    }

    /**
     * Handle the additional order "updated" event.
     *
     * @param  \App\Model\AdditionalOrder  $additionalOrder
     * @return void
     */
    public function updated(AdditionalOrder $additionalOrder)
    {
        $order = $additionalOrder->order()->first();
        $is_closed = true;
        foreach ($order->additional_orders()->get() as $add){
            if(!$add->is_closed){
                $is_closed = false;
                break;
            }
        }
        $order->is_closed = $is_closed;
        $order->save();
    }

    /**
     * Handle the additional order "deleted" event.
     *
     * @param  \App\Model\AdditionalOrder  $additionalOrder
     * @return void
     */
    public function deleted(AdditionalOrder $additionalOrder)
    {
        $order = $additionalOrder->order()->first();
        $is_closed = true;
        foreach ($order->additional_orders()->get() as $add){
            if(!$add->is_closed){
                $is_closed = false;
                break;
            }
        }
        $order->is_closed = $is_closed;
        $order->save();
    }

    /**
     * Handle the additional order "restored" event.
     *
     * @param  \App\Model\AdditionalOrder  $additionalOrder
     * @return void
     */
    public function restored(AdditionalOrder $additionalOrder)
    {
        //
    }

    /**
     * Handle the additional order "force deleted" event.
     *
     * @param  \App\Model\AdditionalOrder  $additionalOrder
     * @return void
     */
    public function forceDeleted(AdditionalOrder $additionalOrder)
    {
        //
    }
}
