<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityRelations extends Model
{
    use HasFactory;

    protected $fillable = [ 'relation_id', 'relation_type', 'entity_name' ];

    public function relational()
    {
        return $this->morphTo();
    }
}
