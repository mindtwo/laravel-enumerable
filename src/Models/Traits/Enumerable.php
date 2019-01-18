<?php

namespace mindtwo\LaravelEnumerable\Models\Traits;

use Mindtwo\DynamicMutators\Facades\Handler;
use mindtwo\LaravelEnumerable\Exceptions\EnumException;
use mindtwo\LaravelEnumerable\Exceptions\InvalidEnumValueException;

trait Enumerable
{
    /**
     * The "booting" method of the trait.
     */
    public static function bootEnumerable()
    {
        static::registerMutationHandler(Handler::make([
            'name'        => 'enums',
            'set_mutator' => ['setAttributeEnum'],
        ]));
    }

    /**
     * Set an enumerable attribute value.
     *
     * @param string $key
     * @param $value
     * @param string $class
     *
     * @throws EnumException
     * @throws InvalidEnumValueException
     *
     * @return $this
     */
    public function setAttributeEnum(string $key, $value, string $class)
    {
        if (! class_exists($class)) {
            throw new EnumException(sprintf('Enumerable class "%s" doesn\'t exist', $class));
        }

        if (! $class::hasValue($value)) {
            throw new InvalidEnumValueException(sprintf(
                'Value "%s" is not allowed for attribute "%s"',
                $value, $key
            ));
        }

        $this->attributes[$key] = $value;

        return $this;
    }
}
