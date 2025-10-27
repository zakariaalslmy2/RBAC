<?php

namespace App\Models;

use App\Models\User;
use App\Models\permessions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    public function permissions(): BelongsToMany{

        return $this->BelongsToMany(related: permessions::class);

    }



    public function user(): BelongsToMany{

        return $this->BelongsToMany(related: User::class);

    }


}
