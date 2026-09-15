<?php

namespace App\Models\Registrations\Property\Registration;

use App\Models\Registrations\Harvest\Culture;
use App\Models\Registrations\Property\Areas\Farm;
use App\Models\Registrations\Property\Producer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmStateRegistration extends Model
{
    use SoftDeletes;

    protected $fillable = ['producer_id', 'farm_id', 'culture_id', 'state_registration', 'description', 'status'];

    public function producer(): BelongsTo { return $this->belongsTo(Producer::class); }
    public function farm(): BelongsTo { return $this->belongsTo(Farm::class); }
    public function culture(): BelongsTo { return $this->belongsTo(Culture::class); }
}
