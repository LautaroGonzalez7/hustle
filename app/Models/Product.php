<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    use IdentityTrait;
    use HasFactory;

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getOldPrice(): float
    {
        return $this->old_price;
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

    public function setOldPrice(float $old_price): void
    {
        $this->old_price = $old_price;
    }

    public function setContent(string $content): void
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
        float $oldPrice,
        string $content,
        int $categoryId
    ): Product {
        $product = new Product();

        $product->name        = $name;
        $product->price       = $price;
        $product->old_price   = $oldPrice;
        $product->content     = $content;
        $product->category_id = $categoryId;
        $product->setCreatedAt(new \DateTimeImmutable());
        $product->setUpdatedAt(new \DateTimeImmutable());

        return $product;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
