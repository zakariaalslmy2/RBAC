<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class permessions extends Model
{
     public function user(): BelongsToMany{

        return $this->BelongsToMany( User::class);

    }

    public function roles(): BelongsToMany{

        return $this->BelongsToMany( Role::class);

    }
}
