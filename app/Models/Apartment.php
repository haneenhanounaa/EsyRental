<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = ['title', 'description', 'location', 'price', 'rooms','number_of_nights', 'num_guests', 'image', 'user_id','client_id','latitude', 'longitude'];

    // Relationship with User (Owner)
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Relationship with Reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    

    // public function client()
    // {
    //     return $this->belongsTo(Client::class, 'client_id');
    // }
}
