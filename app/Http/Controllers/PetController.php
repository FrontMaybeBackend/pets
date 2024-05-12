<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Services\PetServices;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */


    public function index(): View
    {
        return view('pets.index');
    }


    public function status(Request $request): View
    {
        $status = $request->input('status');
        $response = Http::get('https://petstore.swagger.io/v2/pet/findByStatus?status=' . $status);
        $statusPet = $response->json();
        if ($response->successful()) {
            return view('pets.index', [
                'status' => $statusPet,
            ]);
        } else {
            return view('pets.index');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PetServices $imageService): RedirectResponse
    {
       $response = $imageService->imageStore($request);
       if($response == 200){
           return redirect()->route('pets.create')->with('success', 'Pet created');
       }else{
           return redirect()->route('pets.create')->with('error', 'Failed to created pet');
       }
    }





    /**
     * Display the specified resource.
     */
    //to na gotowo
    public function show($id): View
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/' . $id);
        $pet = $response->json();
        return view('pets.show', [
            'pet' => $pet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::get('https://petstore.swagger.io/v2/pet/' . $id);
        $pet = $response->json();
        return view('pets.edit', [
            'pet' => $pet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, PetRequest $request)
    {
        $response = Http::put('https://petstore.swagger.io/v2/pet/', [
            'id' => $id,
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
        ]);

        if ($response->successful()) {
            return redirect()->route('pets.show', $id)->with('success', 'pet updates');
        } else {
            return redirect()->route('pets.show', $id)->with('error', 'failed to update pet');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Http::delete('https://petstore.swagger.io/v2/pet/' . $id);
        if ($response->successful()) {
            return redirect()->route('pets.show', $id)->with('success', 'pet deletes');
        } else {
            return redirect()->route('pets.index')->with('error', 'failed to delete pet');
        }
    }


}
