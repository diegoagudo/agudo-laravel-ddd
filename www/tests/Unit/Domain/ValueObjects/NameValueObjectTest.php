<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\City\Domain\ValueObjects\NameValueObject;
use InvalidArgumentException;
use Tests\TestCase;
use Illuminate\Support\Str;

class NameValueObjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_name_too_short_length(): void
    {
        $this->expectExceptionMessage('Name invalid.');
        $this->expectException(InvalidArgumentException::class);
        $name = new NameValueObject(Str::random(1));
    }

    public function test_name_too_long_length(): void
    {
        $this->expectExceptionMessage('Name invalid.');
        $this->expectException(InvalidArgumentException::class);
        $name = new NameValueObject(Str::random(101));
    }
}
