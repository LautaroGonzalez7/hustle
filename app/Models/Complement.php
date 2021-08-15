<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complement extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    use IdentityTrait;

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getImages(): array
    {
        return json_decode($this->images, true);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->category_id = $categoryId;
    }

    public function setImages(array $images): void
    {
        $this->images = json_encode($images);
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category()->associate($category);
    }

    public static function create(
        string $name,
        float $price,
        ?string $content,
        int $categoryId
    ): Complement {
        $complement = new Complement();

        $complement->name        = $name;
        $complement->price       = $price;
        $complement->content     = $content;
        $complement->category_id = $categoryId;
        $complement->setCreatedAt(new \DateTimeImmutable());
        $complement->setUpdatedAt(new \DateTimeImmutable());

        return $complement;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
