<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // fields in validation must match these properties
    protected $fillable = [
        'name', 
        'logo'
    ];

    

    // relationship with listings
    public function users() {
        return $this->hasMany(User::class, 'company_id');
    }

    // relationship with listings
    public function listings() {
        return $this->hasMany(Listing::class, 'company_id');
    }
}
