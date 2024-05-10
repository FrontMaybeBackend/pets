<?php

namespace App\Services;

use App\Models\Pet;


class PetServices
{
    public function handleUploadedImage(Pet $pet, $image)
    {
        if (!is_null($image)) {
            $path = $image->store('pets', 'public');
            $pet->photoUrls = $path;
        }
    }
}
