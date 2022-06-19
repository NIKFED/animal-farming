<?php

namespace App\Models;

use App\Models\Dictionaries\AnimalKind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Animal
 *
 * @property int $id
 * @property string $name
 * @property int $animal_kind_id
 * @property int $age
 * @property float $size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read AnimalKind $kind
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereAnimalKindId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'animal_kind_id',
        'size',
        'age',
    ];

    public function kind(): BelongsTo
    {
        return $this->belongsTo(AnimalKind::class, 'animal_kind_id', 'id');
    }
}
