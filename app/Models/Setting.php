<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'type', 'api_key', 'password', 'shared_secret'
    ];
}
