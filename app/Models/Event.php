<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_date',
        'event_time',
        'event_type',
        'event_for_id',
        'event_guidelines',
        'creator_id', 
    ];

        public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function eventFor()
    {
        return $this->belongsTo(User::class, 'event_for_id');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function invitedUsers()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')
                ->withPivot('status')
                ->withTimestamps();
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')
                    ->wherePivot('status', 'accepted');
    }

    public function requisitionItems()
    {
        return $this->hasMany(RequisitionItem::class);
    }

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }

}
