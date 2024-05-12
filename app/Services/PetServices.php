<?php

namespace App\Services;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class PetServices
{

    public function imageStore($request)
    {
        $photo = $request->file('photoUrls');

        if ($photo) {
            $path = $photo->store('pets', 'public');
            $response = Http::post('https://petstore.swagger.io/v2/pet', [
                'name' => $request->input('name'),
                'status' => $request->input('status'),
                'category' => [
                    'id' => 0,
                    'name' => $request->input('category_name'),
                ],
                'tags' => [
                    [
                        'id' => 0,
                        'name' => $request->input('tag_name'),
                    ],
                ],
                'photoUrls' => [
                    asset('storage/' . $path),
                ],
            ]);
            return $response->successful();
        }else{
            return false;
        }
    }


}
