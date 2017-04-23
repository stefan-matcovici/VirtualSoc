<?php

namespace app;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function friends()
    {
        $friends = $this->belongsToMany('app\User', 'friend_user', 'user_id', 'friend_id');
        return $friends;
    }

    public function addFriend($friendId)
    {
        $this->friends()->attach($friendId);   // add friend
        $friend = User::find($friendId);       // find your friend, and...
        $friend->friends()->attach($this->id);  // add yourself, too
    }

    public function removeFriend($friendId)
    {
        $this->friends()->detach($friendId);   // remove friend
        $friend = User::find($friendId);       // find your friend, and...
        $friend->friends()->detach($this->id);  // remove yourself, too
    }

    public function requesting()
    {
        $requesting = $this->belongsToMany('app\User', 'requests', 'user_id', 'requested_id');
        return $requesting;
    }

    public function requested()
    {
        $requested = $this->belongsToMany('app\User', 'requests', 'requested_id', 'user_id');
        return $requested;
    }

    public function addRequest($friendId)
    {
        $this->requesting()->attach($friendId); 
    }

    public function deleteRequest($friendId)
    {
        $this->requesting()->detach($friendId);
    }

    public function acceptRequest($friendId)
    {
        $this->addFriend($friendId);
        $this->requested()->detach($friendId);
    }


}
