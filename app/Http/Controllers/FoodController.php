<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;

class FoodController extends Controller
{
   
    public function index()
    {
        $foods = Food::all(); // Mengambil semua data makanan dari database

        // Menggabungkan informasi gambar, deskripsi, dan harga menjadi satu string
        $foodData = $foods->map(function ($food) {
            return $food->image . '|' . $food->description . '|' . $food->price;
        });

        return view('rotate', compact('foodData'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(StoreFoodRequest $request)
    {
        //
    }

  
    public function show(Food $food)
    {
        //
    }

 
    public function edit(Food $food)
    {
        //
    }


    public function update(UpdateFoodRequest $request, Food $food)
    {
        //
    }

  
    public function destroy(Food $food)
    {
        //
    }
}
