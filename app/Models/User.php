<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Traits\UserACLTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Company\Traits\CompanyTrait;
use App\Models\Admin\Company;
use App\Models\Admin\Profile;
use App\Models\Files\Files;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{

    use CompanyTrait;
    use UserACLTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cnpj',
        'status',
        'company_id',
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

    /**
     * company.
     *
     * @var array<string, string>
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }

    /**
     * Files.
     *
     * @var array<string, string>
     */
    public function files()
    {
        return $this->hasMany(Files::class);
    }

    /**
     * profiles.
     *
     * @var array<string, string>
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}

