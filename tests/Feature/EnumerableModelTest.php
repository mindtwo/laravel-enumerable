<?php

namespace mindtwo\LaravelEnumerable\Tests\Feature;

use mindtwo\LaravelEnumerable\Exceptions\EnumException;
use mindtwo\LaravelEnumerable\Exceptions\InvalidEnumValueException;
use mindtwo\LaravelEnumerable\Models\EnumerableModel;
use mindtwo\LaravelEnumerable\Tests\Mocks\ExampleEnum;
use mindtwo\LaravelEnumerable\Tests\TestCase;

class EnumerableModelTest extends TestCase
{
    /**
     * Mock enumerable model.
     *
     * @return EnumerableModel
     */
    protected function mockModel()
    {
        return new class() extends EnumerableModel {
            protected $guarded = [];

            public $enums = [
                'example1' => ExampleEnum::class,
                'example2' => ExampleEnum::class,
                'example3' => 'invalid-class',
            ];
        };
    }

    /**
     * Set enumerable attribute test.
     *
     * @test
     */
    public function testSetEnumerableAttribute()
    {
        $model = $this->mockModel();

        $model->example1 = 'Example 1';

        $this->assertEquals('Example 1', $model->example1);
    }

    /**
     * Fill enumerable attributes test.
     *
     * @test
     */
    public function testFillEnumerableAttributes()
    {
        $model = $this->mockModel();

        $model->fill([
            'example1' => 'Example 1',
            'example2' => 'Example 2',
        ]);

        $this->assertEquals('Example 1', $model->example1);
        $this->assertEquals('Example 2', $model->example2);
    }

    /**
     * Throws an exception, if value is invalid test.
     *
     * @test
     */
    public function testThrowsAnExceptionIfValueIsInvalid()
    {
        $model = $this->mockModel();

        $this->expectException(InvalidEnumValueException::class);

        $model->example1 = 'invalid-value';
    }

    /**
     * Throws an exception, if enum class is invalid test.
     *
     * @test
     */
    public function testThrowsAnExceptionIfEnumClassIsInvalid()
    {
        $model = $this->mockModel();

        $this->expectException(EnumException::class);

        $model->example3 = 'Example';
    }
}
