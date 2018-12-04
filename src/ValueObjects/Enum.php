<?php

namespace mindtwo\LaravelEnumerable\ValueObjects;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum as BaseEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use mindtwo\LaravelEnumerable\Exceptions\InvalidEnumValueException;
use mindtwo\LaravelEnumerable\Interfaces\EnumInterface;

abstract class Enum extends BaseEnum implements EnumInterface, LocalizedEnum
{
    /**
     * Get the enum as an collection formatted for a select.
     *
     * @return Collection
     */
    public static function toSelectCollection(): Collection
    {
        return collect(self::toArray())->mapWithKeys(function ($value, $text) {
            return [
                $value => [
                    'text'  => self::getDescription($value),
                    'value' => $value,
                ],
            ];
        });
    }

    /**
     * Get the description for an enum value.
     *
     * @param int|string $value
     *
     * @return string
     */
    public static function getDescription($value): string
    {
        return
            static::getLocalizedDescription($value) ??
            static::getKey($value);
    }

    /**
     * Get the localized description if localization is enabled
     * for the enum and if they key exists in the lang file.
     *
     * @param int|string $value
     *
     * @return string
     */
    private static function getLocalizedDescription($value): ?string
    {
        $localizedStringKeys = [
            static::getLocalizationKey().Str::snake(static::getKey($value)),
            static::getLocalizationKey().$value,
        ];

        foreach ($localizedStringKeys as $key) {
            if (Lang::has($key)) {
                return __($key);
            }
        }

        return null;
    }

    /**
     * Get the default localization key.
     *
     * @return string
     */
    public static function getLocalizationKey()
    {
        return 'base.';
    }

    /**
     * @param $value
     * @param string $message
     *
     * @throws InvalidEnumValueException
     *
     * @return bool
     */
    public static function hasValueOrFail($value, string $message = '')
    {
        if (! static::hasValue($value)) {
            throw new InvalidEnumValueException($message);
        }

        return true;
    }

    /**
     * Check that the enum contains all values of the array.
     *
     * @param array $values
     *
     * @return bool
     */
    public static function containsValues(array $values)
    {
        foreach ($values as $value) {
            if (! static::hasValue($value)) {
                return false;
            }
        }

        return true;
    }

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
    public static function containsValuesOrFail(array $values, string $message = '')
    {
        if (! static::containsValues($values)) {
            throw new InvalidEnumValueException($message);
        }

        return true;
    }
}
