<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Nike Air Max 270',       'price' => 150.00],
            ['id' => 2, 'name' => 'Adidas Ultraboost',      'price' => 180.00],
            ['id' => 3, 'name' => 'Puma Running Shoes',     'price' => 120.00],
            ['id' => 4, 'name' => 'Under Armour T-Shirt',   'price' => 25.00],
            ['id' => 5, 'name' => 'Levi\'s Jeans',          'price' => 60.00],
            ['id' => 6, 'name' => 'H&M Hoodie',             'price' => 40.00],
            ['id' => 7, 'name' => 'Zara Jacket',            'price' => 90.00],
            ['id' => 8, 'name' => 'Uniqlo Sweater',         'price' => 50.00],
            ['id' => 9, 'name' => 'Gap Shorts',             'price' => 30.00],
            ['id' => 10, 'name' => 'Old Navy Dress',        'price' => 35.00],
            ['id' => 11, 'name' => 'Tommy Hilfiger Polo',   'price' => 45.00],
            ['id' => 12, 'name' => 'Ralph Lauren Shirt',    'price' => 70.00],
            ['id' => 13, 'name' => 'Calvin Klein Suit',     'price' => 300.00],
            ['id' => 14, 'name' => 'Hugo Boss Tie',         'price' => 55.00],
            ['id' => 15, 'name' => 'Gucci Belt',            'price' => 250.00],
            ['id' => 16, 'name' => 'Prada Sunglasses',      'price' => 350.00],
            ['id' => 17, 'name' => 'Versace Scarf',         'price' => 200.00],
            ['id' => 18, 'name' => 'Burberry Trench Coat',  'price' => 1500.00],
            ['id' => 19, 'name' => 'Armani Blazer',         'price' => 800.00],
            ['id' => 20, 'name' => 'Diesel Jeans',          'price' => 120.00],
            ['id' => 21, 'name' => 'Lacoste Sneakers',      'price' => 100.00],
        ];

        return view('products.index', compact('products'));
    }
}
