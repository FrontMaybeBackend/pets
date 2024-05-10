<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Models\Category;
use App\Models\Pet;
use App\Services\PetServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */


    public function index(Pet $pet): View
    {
        return view('pets.index', ['pets' => $pet->getPetsWithCategory()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $categories)
    {
        return view('pets.create', ['categories' => $categories ->getCategory()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PetRequest $request, PetServices $petServices): RedirectResponse
    {
        $pet = new Pet($request->validated());
        $petServices->handleUploadedImage($pet, $request->file('photo'));
        $pet->category_id = $request->input('category_id');
        $pet->save();
        return redirect()->route('pets.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet): View
    {
        return view('pets.show', [
            'pet' => $pet,
            'status' => $pet->getPetsWithStatus(),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit', [
            'pet' => $pet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PetRequest $request, Pet $pet, PetServices $petServices)
    {
        $petServices->handleUploadedImage($pet, $request->file('photo'));
        $pet->update($request->validated());
        return redirect()->route('pets.show', $pet)
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet): RedirectResponse
    {
        $pet->delete();
        return redirect()->route('pets.index');
    }


}
