<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
$table->string('name', 255);
$table->text('notes');

$table->string('name');
$table->foreignId('Grades_id')->constrained();