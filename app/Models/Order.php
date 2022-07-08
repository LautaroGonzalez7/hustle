<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Enums\OrderStates;
use App\Traits\IdentityTrait;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasTimestamps;
    use IdentityTrait;
    use HasFactory;

    public function getImages(): array
    {
        if (is_null($this->images)) return [];
        return json_decode($this->images, true);
    }

    public function setImages(array $images): void
    {
        $newImages = $this->getImages();

        foreach ($images as $image) {
            $newImages[] = $image;
        }

        $this->images = json_encode($newImages);
    }

    public static function create(
        array  $productDetail,
        array  $payment,
        array  $shipment,
        array  $complements,
        string $state,
        int    $userId,
        int    $productId,
        float  $total
    ): Order
    {
        if (!OrderStates::isValid($state)) {
            throw new \Exception("The state is invalid");
        }

        $order = new Order();
        $order->productDetail = json_encode($productDetail);
        $order->payment = json_encode($payment);
        $order->shipment = json_encode($shipment);
        $order->complements = json_encode($complements);
        $order->state = $state;
        $order->user_id = $userId;
        $order->product_id = $productId;
        $order->total = $total;
        $order->setCreatedAt(new \DateTimeImmutable());
        $order->setUpdatedAt(new \DateTimeImmutable());

        return $order;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
