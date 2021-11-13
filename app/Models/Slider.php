<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    use IdentityTrait;
    use HasFactory;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function getImages(): array
    {
        return json_decode($this->images, true);
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function setImages(array $images): void
    {
        $this->images = json_encode($images);
    }

    public static function create(
        string $title,
        string $subtitle,
        string $link,
        bool   $active
    ): Slider
    {
        $slider = new Slider();

        $slider->title = $title;
        $slider->subtitle = $subtitle;
        $slider->link = $link;
        $slider->active = $active;
        $slider->setCreatedAt(new \DateTimeImmutable());
        $slider->setUpdatedAt(new \DateTimeImmutable());

        return $slider;
    }
}
