<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'status',
        'file',
        'type',
        'filesize',
        'path',
        'typing_sender',
        'typing_receiver'
    ];

    /* public function scopeBySender($q, $sender)
    {
        $q->where('sender_id', $sender);
    }

    public function scopeByReceiver($q, $sender)
    {
        $q->where('receiver_id', $sender);
    } */

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id')->select(['id', 'name']);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class);
    }

    /* public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id')->select(['id', 'name']);
    } */

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /* public function user()
    {
        return $this->belongsTo(User::class);
    } */

    public function messageDate(){
        if($this->created_at->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
            return "Aujourd'hui";
        }else if($this->created_at->diff(Carbon::now())->days == 1){
            return "Hier";
        }
        return $this->created_at->format('d-m-Y');
    }
}
