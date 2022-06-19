<?php

namespace App\Models\Dictionaries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dictionaries\AnimalKind
 *
 * @property int $id
 * @property string $name
 * @property float $max_size
 * @property int $max_age
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read float $growth_factor
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind whereMaxAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind whereMaxSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalKind whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AnimalKind extends Model
{
    use HasFactory;

    protected $table = 'animal_kinds';

    protected $fillable = [
        'id',
        'name',
        'max_size',
        'max_age',
    ];

    public function getGrowthFactorAttribute(): float
    {
        return $this->max_size / $this->max_age;
    }
}
