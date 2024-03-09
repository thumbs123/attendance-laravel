<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;


    protected $fillable = ['name','nomor','email','sosial'];
    //protected $guarded = ['id','user_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
