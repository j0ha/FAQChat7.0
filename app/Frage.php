<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frage extends Model
{
    protected $table = 'frages';

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('autor', 'like', '%'.$search.'%')
                ->orWhere('frage', 'like', '%'.$search.'%');
    }

}
