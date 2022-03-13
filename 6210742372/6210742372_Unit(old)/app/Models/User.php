<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Phone;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phone() {
        return $this->hasOne(Phone::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles() { 
        return $this->belongsToMany(Comment::class); 
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function history()
    {
        return $this->hasOne(History::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function image() { 
        return $this->morphOne(Image::class, 'imageable'); 
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
