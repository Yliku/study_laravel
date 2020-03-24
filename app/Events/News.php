<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class News implements ShouldBroadcast {     //继承 ShouldBroadcast 广播类
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($news_message) {
        $this->message = $news_message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new Channel('news');            //在公共频道进行广播，谁都可以收听的广播
        // return new PrivateChannel('news');  //在私有频道进行广播，只有指定用户可以收到的广播
        // return new PresenceChannel('news'); //不仅可以收听到跟你有关的广播，还可以跟别的用户互动，适合做聊天室
    }
}
