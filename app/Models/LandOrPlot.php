<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LandOrPlot extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;
    use Sluggable;

    public $table = 'land_or_plots';

    public const APPROVED_RADIO = [
        '0' => 'Pending',
        '1' => 'Approved',
    ];

    protected $appends = [
        'property_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'price',
        'location_id',
        'area',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 250, 250);
        $this->addMediaConversion('preview')->fit('crop', 900, 900);
    }

    public function location() :BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function getPropertyImageAttribute(): MediaCollection
    {
        $files = $this->getMedia('property_image');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function team() :BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source'=>'title'
            ]

        ];
    }
}
