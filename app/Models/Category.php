<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    use IdentityTrait;

    public function getName(): string
    {
        return $this->name;
    }

    public function getScope(): string
    {
        return $this->scope;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    public static function create(string $name, string $scope): Category
    {
        $category = new Category();

        $category->name     = $name;
        $category->scope     = $scope;
        $category->setCreatedAt(new \DateTimeImmutable());
        $category->setUpdatedAt(new \DateTimeImmutable());

        return $category;
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

}
