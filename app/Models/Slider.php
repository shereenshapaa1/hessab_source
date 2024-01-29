<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
    ];
    
    
     public function imagePath($column)
    {
        $value = '';
        if ($this->{$column} != '') {
            $value = asset($this->{$column});
        }

        return $value;
    }


    public function scopeService($query)
    {
        return $query->where('type', Constants::ServiceType);
    }

    public function scopeAbout($query)
    {
        return $query->where('type', Constants::AboutType);
    }

    public function scopeClient($query)
    {
        return $query->where('type', Constants::ClientType);
    }

    public function scopeObjective($query)
    {
        return $query->where('type', Constants::ObjectiveType);
    }

    public function scopeCounter($query)
    {
        return $query->where('type', Constants::CounterType);
    }

    public function scopeCompany($query)
    {
        return $query->where('type', Constants::CompanyType);
    }


    public function scopeCompanyService($query)
    {
        return $query->where('type', Constants::CompanyServiceType);
    }
    //service_ids

    public function getServiceIdsAttribute()
    {
        return ServiceCompany::where('company_id', $this->id)
            ->pluck('service_id')->toArray();
    }

    public function getCompaniesAttribute()
    {
        $ids = ServiceCompany::where('service_id', $this->id)
            ->pluck('company_id')->toArray();

        return Content::whereIn('id', $ids)
            ->publish()->ordered()
            ->get();
    }
}