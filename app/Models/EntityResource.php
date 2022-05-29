<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EntityResource extends Model
{
    use HasFactory;

    protected $fillable = [ 'imageable_id', 'imageable_type', 'file_name' ];

    public function imageable()
    {
        return $this->morphTo();
    }

}
