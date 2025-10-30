<?php
// Run this script to create products in the database
// Execute with: php create_products.php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\Category;

// First create categories
echo "Creating categories...\n";
$categories = [
    ['name' => 'Grains'],
    ['name' => 'Vegetables'], 
    ['name' => 'Fruits']
];

$categoryMap = [];
foreach ($categories as $categoryData) {
    $category = Category::firstOrCreate(['name' => $categoryData['name']], $categoryData);
    $categoryMap[strtolower($category->name)] = $category->id;
    echo "Created category: {$category->name}\n";
}

// Create products that match the ones on your products page
$products = [
    [
        'name' => 'Nadu Rice',
        'slug' => 'nadu-rice',
        'description' => 'High-quality Nadu rice from Kurunegala.',
        'price' => 120,
        'stock' => 100,
        'unit' => 'kg',
        'image' => 'Images/Nadu-Rice.jpg',
        'category' => 'grains'
    ],
    [
        'name' => 'Ambul Banana',
        'slug' => 'ambul-banana',
        'description' => 'Fresh bananas directly from Monaragala.',
        'price' => 60,
        'stock' => 50,
        'unit' => 'kg',
        'image' => 'Images/kesell.jpeg',
        'category' => 'fruits'
    ],
    [
        'name' => 'Upcountry Potato',
        'slug' => 'upcountry-potato',
        'description' => 'Clean and quality potatoes from Nuwara Eliya.',
        'price' => 90,
        'stock' => 75,
        'unit' => 'kg',
        'image' => 'images/alla.jpg',
        'category' => 'vegetables'
    ],
    [
        'name' => 'Carrot',
        'slug' => 'carrot',
        'description' => 'Crunchy and fresh carrots ideal for salads.',
        'price' => 100,
        'stock' => 60,
        'unit' => 'kg',
        'image' => 'images/carrot.jpg',
        'category' => 'vegetables'
    ],
    [
        'name' => 'Red Rice',
        'slug' => 'red-rice',
        'description' => 'Nutritious red rice from Badulla.',
        'price' => 130,
        'stock' => 40,
        'unit' => 'kg',
        'image' => 'Images/Organic_Red_Rice.jpg',
        'category' => 'grains'
    ],
    [
        'name' => 'King Mango',
        'slug' => 'king-mango',
        'description' => 'Sweet king mangoes from Polonnaruwa.',
        'price' => 150,
        'stock' => 30,
        'unit' => 'kg',
        'image' => 'Images/alponso-mango.jpg',
        'category' => 'fruits'
    ],
    [
        'name' => 'Green Beans',
        'slug' => 'green-beans',
        'description' => 'Fresh green beans from Matale.',
        'price' => 70,
        'stock' => 80,
        'unit' => 'kg',
        'image' => 'Images/Beansss.jpg',
        'category' => 'vegetables'
    ],
    [
        'name' => 'Pineapple',
        'slug' => 'pineapple',
        'description' => 'Juicy pineapples from Gampaha.',
        'price' => 85,
        'stock' => 25,
        'unit' => 'kg',
        'image' => 'Images/Pineapple-01-5562ee3.jpg',
        'category' => 'fruits'
    ],
    [
        'name' => 'Basmati Rice',
        'slug' => 'basmati-rice',
        'description' => 'Fragrant basmati rice from Anuradhapura.',
        'price' => 110,
        'stock' => 90,
        'unit' => 'kg',
        'image' => 'Images/1121-basmati-rice.jpeg',
        'category' => 'grains'
    ],
    [
        'name' => 'Tomato',
        'slug' => 'tomato',
        'description' => 'Fresh tomatoes from Kandy.',
        'price' => 65,
        'stock' => 120,
        'unit' => 'kg',
        'image' => 'Images/healthy-farm-fresh-natural-round-shape-red-tomato-857.jpg',
        'category' => 'vegetables'
    ]
];

echo "Creating products...\n";

foreach ($products as $productData) {
    $category = $productData['category'];
    unset($productData['category']);
    $productData['category_id'] = $categoryMap[$category];
    
    $product = Product::create($productData);
    echo "Created: {$product->name} (slug: {$product->slug})\n";
}

echo "All products created successfully!\n";
