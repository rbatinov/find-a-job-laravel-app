<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Listing extends Model
{
    use HasFactory;

    public static function getall(){
        return [
            [
                'id' => 1,
                'title' => 'Listing 1',
                'description' => 'text'
            ],
            [
                'id' => 2,
                'title' => 'Listing 2',
                'description' => 'text'

            ]
        ];
    }

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'. request('tag') .'%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%'. request('search') .'%')
                ->orWhere('description', 'like', '%'. request('search') .'%')
                ->orWhere('tags', 'like', '%'. request('search') .'%')
                ->orWhere('company', 'like', '%'. request('search') .'%');
        }
    }
}
