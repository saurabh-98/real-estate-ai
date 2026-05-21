<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'properties';

    /*
    |--------------------------------------------------------------------------
    | FILLABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'property_type_id',

        'title',

        'slug',

        'description',

        'price',

        'city',

        'state',

        'country',

        'address',

        'bedrooms',

        'bathrooms',

        'garage',

        'area',

        'featured_image',

        'seo_title',

        'seo_description',

        'seo_keywords',

        'is_featured',

        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}