<?php

namespace mindtwo\LaravelEnumerable\Models;

use Illuminate\Database\Eloquent\Model;
use Mindtwo\DynamicMutators\Traits\HasDynamicMutators;
use mindtwo\LaravelEnumerable\Models\Traits\Enumerable;

class EnumerableModel extends Model
{
    use HasDynamicMutators,
        Enumerable;
}
