<?php

namespace App\Models;

use App\Events\NewRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BookingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time', 'end_time', 'comment', 'hall_id', 'user_id', 'status', 'reason', 'admin_id'
        // 'appointed_id','appointed_type',
    ];

    public static function booted()
    {
        static::updating(function (BookingRequest $bookingRequest) {
            $bookingRequest->status = 'submitted';
            $bookingRequest->save();
        });

    }
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
