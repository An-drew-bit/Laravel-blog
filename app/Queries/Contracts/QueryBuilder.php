<?php

declare(strict_types = 1);

namespace App\Queries\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface QueryBuilder
{
    public function getBuilder(): Builder;
}
