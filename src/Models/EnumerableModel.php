<?php

namespace mindtwo\LaravelEnumerable\Models;

use Illuminate\Database\Eloquent\Model;
use mindtwo\LaravelEnumerable\Models\Traits\Enumerable;
use mindtwo\LaravelDynamicModelMutators\DynamicModelMutator;

class EnumerableModel extends Model
{
    use DynamicModelMutator,
        Enumerable;
}
