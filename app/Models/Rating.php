<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'commit',
        'Position',
        'image',
        'is_publish'
    ];


    public function imagePath($column)
    {
        $value = '';
        if ($this->{$column} != '') {
            $value = asset($this->{$column});
        }

        return $value;
    }

   public function User(){
    return $this->belongsTo(User::class, 'user_id');


   }

    
    public function getPublishSpanAttribute($value)
    {
        if($this->is_publish == 1){
            $value="<span class='badge bg-success'>Published </span>";
        }else{
            $value="<span class='badge bg-danger'>Not Published</span>";
        }
        return $value;
    }
    public function getFeaturedSpanAttribute($value)
    {
        if($this->is_featured == 1){
            $value="<span class='badge bg-success'>Featured </span>";
        }else{
            $value="";
        }
        return $value;
    }
}
