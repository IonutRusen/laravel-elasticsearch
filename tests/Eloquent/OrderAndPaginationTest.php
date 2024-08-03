<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use PDPhilip\Elasticsearch\Schema\Schema;
use Workbench\App\Models\Product;

beforeEach(function () {
    Schema::deleteIfExists('products');
    Schema::create('products', function ($index) {
        $index->text('name');
        $index->keyword('name');
        $index->keyword('color');
        $index->float('price');
        $index->integer('status');
        $index->geo('manufacturer.location');
        $index->date('created_at');
        $index->date('updated_at');
        $index->date('deleted_at');
    });
});

function isSorted(Collection $collection, $key, $descending = false): bool
{
    $values = $collection->pluck($key)->toArray();
    for ($i = 0; $i < count($values) - 1; $i++) {
        if ($descending) {
            if ($values[$i] < $values[$i + 1]) {
                return false;
            }
        } else {
            if ($values[$i] > $values[$i + 1]) {
                return false;
            }
        }
    }

    return true;
}

test('products are ordered by status', function () {
    Product::factory(50)->make()->each(function ($model) {
        $model->saveWithoutRefresh();
    });
    sleep(2);
    $products = Product::orderBy('status')->get();
    expect(isSorted($products, 'status'))->toBeTrue();
});

test('products are ordered by created_at descending', function () {
    Product::factory(50)->make()->each(function ($model) {
        $model->saveWithoutRefresh();
    });
    sleep(2);
    $products = Product::orderBy('created_at', 'desc')->get();
    expect(isSorted($products, 'created_at', true))->toBeTrue();
});

test('products are ordered by name using keyword subfield', function () {
    Product::factory(50)->make()->each(function ($model) {
        $model->saveWithoutRefresh();
    });
    sleep(2);
    $products = Product::orderBy('name.keyword')->get();
    expect(isSorted($products, 'name'))->toBeTrue();
});

test('products are paginated', function () {
    Product::factory()->count(50)->make()->each(function ($model) {
        $model->saveWithoutRefresh();
    });
    sleep(3);

    $products = Product::where('is_active', true)->paginate(10);
    expect($products)->toHaveCount(10);
});

test('sort products by color with missing values treated as first', function () {
    Product::factory()->state(['color' => null])->create();
    Product::factory()->state(['color' => 'blue'])->create();
    $products = Product::orderBy('color', 'desc', null, '_first')->get();
    expect($products->first()->color)->toBeNull();
});

test('sort products by geographic location closest to London', function () {
    Product::factory()->state(['manufacturer' => ['location' => ['lat' => 51.50853, 'lon' => -0.12574]]])->create(); // London
    $products = Product::orderByGeo('manufacturer.location', [-0.12574, 51.50853])->get();
    expect(! empty($products))->toBeTrue();
})->todo();

test('sort products by geographic location farthest from Paris using multiple points and plane type', function () {
    Product::factory()->state(['manufacturer' => ['location' => ['lat' => 48.85341, 'lon' => 2.3488]]])->create(); // Paris
    $products = Product::orderByGeo('manufacturer.location', [[2.3488, 48.85341], [-0.12574, 51.50853]], 'desc', 'km', 'avg', 'plane')->get();
    expect(! empty($products))->toBeTrue();
})->todo();
