<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enquiry extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'enquiries';

    /*
    |--------------------------------------------------------------------------
    | STATUS CONSTANTS
    |--------------------------------------------------------------------------
    */

    const STATUS_NEW = 'new';

    const STATUS_READ = 'read';

    const STATUS_REPLIED = 'replied';

    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'property_id',

        'name',

        'mobile',

        'email',

        'message',

        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'created_at' => 'datetime',

        'updated_at' => 'datetime',

    ];

    /*
    |--------------------------------------------------------------------------
    | DEFAULT ATTRIBUTES
    |--------------------------------------------------------------------------
    */

    protected $attributes = [

        'status' => self::STATUS_NEW,

    ];

    /*
    |--------------------------------------------------------------------------
    | APPENDS
    |--------------------------------------------------------------------------
    */

    protected $appends = [

        'status_badge',

        'formatted_date',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function property()
    {
        return $this->belongsTo(

            Property::class,

            'property_id'

        );
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS BADGE ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {

            self::STATUS_NEW =>

                '<span class="status-badge status-new">
                    New
                </span>',

            self::STATUS_READ =>

                '<span class="status-badge status-read">
                    Read
                </span>',

            self::STATUS_REPLIED =>

                '<span class="status-badge status-replied">
                    Replied
                </span>',

            default =>

                '<span class="status-badge">
                    Unknown
                </span>',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | FORMATTED DATE ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getFormattedDateAttribute()
    {
        return $this->created_at
            ? $this->created_at->format('d M Y h:i A')
            : null;
    }

    /*
    |--------------------------------------------------------------------------
    | CHECK STATUS
    |--------------------------------------------------------------------------
    */

    public function isNew()
    {
        return $this->status === self::STATUS_NEW;
    }

    public function isRead()
    {
        return $this->status === self::STATUS_READ;
    }

    public function isReplied()
    {
        return $this->status === self::STATUS_REPLIED;
    }

    /*
    |--------------------------------------------------------------------------
    | MARK AS READ
    |--------------------------------------------------------------------------
    */

    public function markAsRead()
    {
        $this->update([

            'status' => self::STATUS_READ

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | MARK AS REPLIED
    |--------------------------------------------------------------------------
    */

    public function markAsReplied()
    {
        $this->update([

            'status' => self::STATUS_REPLIED

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeNew($query)
    {
        return $query->where(
            'status',
            self::STATUS_NEW
        );
    }

    public function scopeRead($query)
    {
        return $query->where(
            'status',
            self::STATUS_READ
        );
    }

    public function scopeReplied($query)
    {
        return $query->where(
            'status',
            self::STATUS_REPLIED
        );
    }
}