<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Listing extends Model
{
    use HasFactory;

    // fields in validation must match these properties
    protected $fillable = [
        'title',
        'location',
        'website',
        'email',
        'tags',
        'description',
        'logo',
        'user_id', 
        'company_id'
    ];

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

    // filters tags and search
    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%'. request('tag') .'%');
        }

        if($filters['search'] ?? false){
            $query
                //->join('companies', 'companies.id', '=', 'listings.company_id')->where('title', 'like', '%'. request('search') .'%')
                ->orWhere('title', 'like', '%'. request('search') .'%')
                ->orWhere('description', 'like', '%'. request('search') .'%')
                ->orWhere('tags', 'like', '%'. request('search') .'%')
                //->orWhere('companies.name', 'like', '%'. request('search') .'%')
                ;
        }
    }

    // relationship to user 
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // relationship to company
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
