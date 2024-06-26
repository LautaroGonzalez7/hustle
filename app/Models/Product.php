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

    public function getCode(): string
    {
        return $this->code;
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

    public function getPosition(): int
    {
        return $this->position;
    }

    public function getImages(): array
    {
        return json_decode($this->images, true);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
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

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function setHighlight(string $highlight): void
    {
        $this->highlight = $highlight;
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->category_id = $categoryId;
    }

    public function setImages(array $images): void
    {
        $this->images = json_encode($images);
    }

//    public function getCategory(): ?Category
//    {
//        return $this->category;
//    }
//
//    public function setCategory(Category $category): void
//    {
//        $this->category()->associate($category);
//    }

    public static function create(
        string $name,
        string $code,
        float  $price,
        float  $oldPrice,
        string $content,
        bool   $highlight
    ): Product
    {
        $product = new Product();

        $product->name = $name;
        $product->code = $code;
        $product->price = $price;
        $product->old_price = $oldPrice;
        $product->content = $content;
        $product->highlight = $highlight;
        $product->position = 0;
        $product->setCreatedAt(new \DateTimeImmutable());
        $product->setUpdatedAt(new \DateTimeImmutable());

        return $product;
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Category', 'categories_products');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}
