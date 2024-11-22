<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enums\AnimalType;
use App\Enums\AnimalRace;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'name',
        'age',
        'type',
        'race',
        'description',
        'isSaled',
        'prixHt',
        'image1',
        'image2'
    ];

    protected $casts = [
        'isSaled' => 'boolean',
        'prixHt' => 'integer',
    ];

    public function getTypeAttribute($value)
    {
        return AnimalType::from($value);
    }

    public function getRaceAttribute($value)
    {
        return AnimalRace::from($value);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = $value instanceof AnimalType ? $value->value : $value;
    }

    public function setRaceAttribute($value)
    {
        $this->attributes['race'] = $value instanceof AnimalRace ? $value->value : $value;
    }
}
