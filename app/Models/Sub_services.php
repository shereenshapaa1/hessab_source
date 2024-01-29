<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Sub_services extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'service_id',
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

   public function Service(){
    return $this->belongsTo(Content::class, 'service_id');


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
