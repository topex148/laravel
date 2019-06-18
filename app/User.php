<?php

namespace App;

use Laravel\Cashier\Billable;
use App\Notifications\MyResetPassword;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\BillableTrait;
use Laravel\Cashier\BillableInterface;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $events = [
       'created' => Events\NewUser::class
     ];


    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));

    }


    public function prestadore(){
      return $this->belongsTo(Prestadore::class, 'RIF_Prest');
    }

    public function fotos(){
      return $this->hasMany(Foto::class);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
