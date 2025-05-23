<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Componix Package Routes
|--------------------------------------------------------------------------
|
| Here are the routes for the Componix package. These routes provide
| demo pages and API endpoints for the package components.
|
*/

Route::prefix('componix')->name('componix.')->group(function () {
    // Welcome/Demo page
    Route::get('/', function () {
        return view('componix::welcome');
    })->name('welcome');

    // Component demo pages
    Route::get('/demo/navbar', function () {
        return view('componix::demo.navbar');
    })->name('demo.navbar');

    Route::get('/demo/modal', function () {
        return view('componix::demo.modal');
    })->name('demo.modal');

    Route::get('/demo/search', function () {
        return view('componix::demo.search');
    })->name('demo.search');

    Route::get('/demo/components', function () {
        return view('componix::demo.components');
    })->name('demo.components');

    // API endpoints for live search
    Route::get('/api/search', function () {
        $query = request('q', '');
        $type = request('type', 'all');
        
        // Mock data for demonstration
        $mockData = [
            ['id' => 1, 'title' => 'Laravel Documentation', 'type' => 'docs', 'url' => '#'],
            ['id' => 2, 'title' => 'Livewire Components', 'type' => 'component', 'url' => '#'],
            ['id' => 3, 'title' => 'Tailwind CSS Classes', 'type' => 'css', 'url' => '#'],
            ['id' => 4, 'title' => 'PHP Best Practices', 'type' => 'docs', 'url' => '#'],
            ['id' => 5, 'title' => 'Vue.js Integration', 'type' => 'component', 'url' => '#'],
        ];

        $results = collect($mockData)->filter(function ($item) use ($query, $type) {
            $matchesQuery = empty($query) || str_contains(strtolower($item['title']), strtolower($query));
            $matchesType = $type === 'all' || $item['type'] === $type;
            return $matchesQuery && $matchesType;
        })->take(config('componix.search.max_results', 10));

        return response()->json($results->values());
    })->name('api.search');
});
