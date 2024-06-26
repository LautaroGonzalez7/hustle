<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    use IdentityTrait;
    use HasFactory;

    public function getName(): string
    {
        return $this->name;
    }

    public function getScope(): int
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

    public static function create(string $name, int $scope): Category
    {
        $category = new Category();

        $category->name     = $name;
        $category->scope     = $scope;
        $category->setCreatedAt(new \DateTimeImmutable());
        $category->setUpdatedAt(new \DateTimeImmutable());

        return $category;
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Product', 'categories_products');
    }

    public function complement()
    {
        return $this->hasMany('App\Models\Complement');
    }

}
