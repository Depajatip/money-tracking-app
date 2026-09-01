<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    $categories = [
        ['name' => 'Salary', 'type' => 'INCOME', 'icon' => 'salary', 'color' => '#22c55e'],
        ['name' => 'Bonus', 'type' => 'INCOME', 'icon' => 'bonus', 'color' => '#16a34a'],
        ['name' => 'Food', 'type' => 'EXPENSE', 'icon' => 'food', 'color' => '#f97316'],
        ['name' => 'Transportation', 'type' => 'EXPENSE', 'icon' => 'transportation', 'color' => '#3b82f6'],
        ['name' => 'Shopping', 'type' => 'EXPENSE', 'icon' => 'shopping', 'color' => '#a855f7'],
        ['name' => 'Bills', 'type' => 'EXPENSE', 'icon' => 'bills', 'color' => '#ef4444'],
        ['name' => 'Entertainment', 'type' => 'EXPENSE', 'icon' => 'entertainment', 'color' => '#eab308'],
        ['name' => 'Health', 'type' => 'EXPENSE', 'icon' => 'health', 'color' => '#ec4899'],
    ];

    foreach ($categories as $category) {
        Category::create($category);
    }
}
}
