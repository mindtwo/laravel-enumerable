<?php

namespace mindtwo\LaravelEnumerable\Models;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelDynamicModelMutators\DynamicModelMutator;
use mindtwo\LaravelEnumerable\Models\Traits\Enumerable;

class EnumerableModel extends Model
{
    use DynamicModelMutator,
        Enumerable;
}
