<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleInfo extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TRANSMISSION_SELECT = [
        '1' => 'Automatic',
        '2' => 'Manual',
    ];

    public const FUEL_SELECT = [
        '1' => 'Diesel',
        '2' => 'Essence',
        '3' => 'Electric',
    ];

    public $table = 'vehicle_infos';

   protected $guarded=[];



    public function car() :BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }


    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
