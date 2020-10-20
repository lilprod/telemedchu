<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Timeline;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Timeline extends Model implements Feedable
{
    use Sluggable;
    
    protected $fillable = ['title', 'slug', 'body', 'cover_image', 'status'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->body)
            ->updated($this->updated_at)
            ->link($this->link)
            ->author($this->username);
    }
    
    public static function getFeedItems()
    {
       return Timeline::all();
    }
    
    public function getLinkAttribute()
    {
        return route('timeline.show', $this);
    }
}
