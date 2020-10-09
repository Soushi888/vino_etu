<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * A role may have many abilities.
     *
     * @return BelongsToMany
     */
    public function abilities()
    {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    /**
     * Grant the given ability to the role.
     *
     * @param  mixed  $ability
     */
    public function allowTo($ability)
    {
        if (is_string($ability)) {
            $ability = Ability::whereName($ability)->firstOrFail();
        }

        $this->abilities()->sync($ability, false);
    }
}
