<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Item;
use App\Models\Bid;

class NewBid implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bid;
    public $itemId;
    public $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($itemId, $action)
    {
        //$this->bid = $bid;
        $this->itemId = $itemId;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('item.'.$this->bid->item->id);
        return new Channel('item-events');
    }

    public function broadcastWith(){
        return ['bid_amount' => $this->bid->bid_amount];
    }
}
