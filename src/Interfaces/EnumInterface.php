<?php

namespace mindtwo\LaravelEnumerable\Interfaces;

use Illuminate\Support\Collection;
use mindtwo\LaravelEnumerable\Exceptions\InvalidEnumValueException;

interface EnumInterface
{
    /**
     * Get all of the enum keys.
     *
     * @return array
     */
    public static function getKeys();

    /**
     * Get all of the enum values.
     *
     * @return array
     */
    public static function getValues();

    /**
     * Get the key for a single enum value.
     *
     * @param int|string $value
     *
     * @return int|string
     */
    public static function getKey($value);

    /**
     * Get the value for a single enum key.
     *
     * @param string $key
     *
     * @return int|string
     */
    public static function getValue(string $key);

    /**
     * Get the description for an enum value.
     *
     * @param int|string $value
     *
     * @return string
     */
    public static function getDescription($value);

    /**
     * Get a random key from the enum.
     *
     * @return string
     */
    public static function getRandomKey();

    /**
     * Get a random value from the enum.
     *
     * @return int|string
     */
    public static function getRandomValue();

    /**
     * Return the enum as an array.
     *
     * @return array
     */
    public static function toArray();

    /**
     * Get the enum as an array formatted for a select.
     * value => description.
     *
     * @return array
     */
    public static function toSelectArray();

    /**
     * Check that the enum contains a specific key.
     *
     * @param string $key
     *
     * @return bool
     */
    public static function hasKey(string $key);

    /**
     * Check that the enum contains a specific value.
     *
     * @param int|string $value
     * @param bool       $strict (Optional, defaults to True)
     *
     * @return bool
     */
    public static function hasValue($value, bool $strict = true);

    /**
     * Get the default localization key.
     *
     * @return string
     */
    public static function getLocalizationKey();

    /**
     * Get the enum as an collection formatted for a select.
     *
     * @return Collection
     */
    public static function toSelectCollection(): Collection;

    /**
     * @param $value
     * @param string $message
     *
     * @throws InvalidEnumValueException
     *
     * @return bool
     */
    public static function hasValueOrFail($value, string $message = '');

    /**
     * Check that the enum contains all values of the array and throws an exception, if not.
     *
     * @param array  $values
     * @param string $message
     *
     * @throws InvalidEnumValueException
     *
     * @return bool
     */
    public static function containsValuesOrFail(array $values, string $message = '');

    /**
     * Check that the enum contains all values of the array.
     *
     * @param array $values
     *
     * @return bool
     */
    public static function containsValues(array $values);
}
