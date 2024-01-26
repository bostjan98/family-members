<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    protected $table = 'relationships';

    protected $fillable = ['name'];

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'relationship_id');
    }
}
