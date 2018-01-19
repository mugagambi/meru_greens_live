<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderRequestClient extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * order instance
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.client-request')
            ->subject('Order received');
    }
}
