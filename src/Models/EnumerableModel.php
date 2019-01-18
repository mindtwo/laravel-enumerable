<?php

namespace mindtwo\LaravelEnumerable\Models;

use Illuminate\Database\Eloquent\Model;

use mindtwo\LaravelEnumerable\Models\Traits\Enumerable;
use Mindtwo\DynamicMutators\Traits\HasDynamicMutators;

class EnumerableModel extends Model
{
    use HasDynamicMutators,
        Enumerable;
}
