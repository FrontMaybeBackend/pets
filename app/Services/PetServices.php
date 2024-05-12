<?php

namespace App\Services;

use App\Models\Pet;


class PetServices
{
    public function handleUploadedImage($image)
    {
        if (!is_null($image)) {
            $image->store('pets', 'public');
        }
    }
}
