<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
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


    protected $appends = [
        'name', 'profile_pic'
    ];

    public function getNameAttribute(){
        return $this->first_name .' '. $this->last_name;
    }


    public function getProfilePicAttribute(){
		if($this->image){
			return asset('storage/images/'.$this->image);
		}
		return asset('assets/images/sample-img.png');
    }

	//...................
	
	public function userStudio()
    {
        return $this->hasOne(UserStudio::class, 'users_id', 'id');
    }
	
	public function userStreamer()
    {
        return $this->hasOne(UserStreamer::class, 'users_id', 'id');
    }
	
	public function userReporter()
    {
        return $this->hasOne(UserReporter::class, 'users_id', 'id');
    }
	
	
	public function tags()
    {
        return $this->hasMany(UserTags::class, 'users_id', 'id');
    }
	
	public function publicationReporter()
    {
        return $this->hasMany(PublicationReporter::class, 'users_id', 'id');
    }
	
	
	public function news()
    {
        return $this->hasMany(News::class, 'users_id', 'id');
    }
	
	public function games()
    {
        return $this->hasMany(Game::class, 'users_id', 'id');
    }

    public function favourite()
    {
        return $this->hasMany(Favourite::class, 'user_id', 'id');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class, 'user_id', 'id');
    }

    public function favouriteGames()
    {
        return $this->hasMany(FavouriteGame::class, 'user_id', 'id');
    }


}
