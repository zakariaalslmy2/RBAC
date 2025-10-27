<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\permessions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function roles(): BelongsToMany{

        return $this->BelongsToMany(related: Role::class);

    }
        public function permissions(): BelongsToMany{

        return $this->BelongsToMany(related: permessions::class);

    }
    public function getAllPermissions(){
        $directPermissions=$this->permissions->pluck('name')->toArray();
        $rolePermissions=$this->roles()->flatMap(fn($role)=>$role->permessions->pluck('name'))->toArray();
        return array_unique(array_merge($directPermissions, $rolePermissions));



    }

}
