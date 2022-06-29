<?php

use App\Domain\Store\Models\Store;
use Illuminate\Support\Facades\DB;

uses(Tests\TestCase::class);

//GET
test('get store', function(){
    $store = new Store;
    $data = [
        'name' => 'UnitTest',
        'short_description' => 'UnitTest',
        'description' => 'UnitTest',
        'seller' => 'UnitTestSeller',
    ];
    $store->fill($data);
    $store->save();

    $response = $this->getJson("/api/v1/stores/{$store->id}");

    $expectedData = [
        'data' => [
            'id' => $store->id,
            'name' => $store->name,
            'short_description' => $store->short_description,
            'description' => $store->description,
            'seller' => $store->seller,
        ],
        'errors' => [],
        'meta' => []
    ];
    $response->assertStatus(200)->assertJson($expectedData);

    $id = ($response['data'])['id'];
    Store::destroy($id);
});

test('cant get store', function(){
    $id = Store::latest()->first()->id + 100;

    $response = $this->getJson("/api/v1/stores/{$id}");
    $response->assertStatus(400);
});

//CREATE
test('create store', function(){
    $body = [
        'name' => 'UnitTest',
        'short_description' => 'UnitTest',
        'seller' => 'UnitTestSeller',
    ];
    $response = $this->postJson('/api/v1/stores', $body);
    $response->assertStatus(200);
    $this->assertDatabaseHas('stores', $body);

    $id = ($response['data'])['id'];
    Store::destroy($id);
});

test('cant create store without required fiels', function(){
    $body = [
        'name' => 'UnitTest',
    ];
    $response = $this->postJson('/api/v1/stores', $body);
    $response->assertStatus(400);
});

//REPLACE
test('replace store', function(){
    $store = new Store;
    $data = [
        'name' => 'UnitTest',
        'short_description' => 'UnitTest',
        'seller' => 'Test',
    ];
    $store->fill($data);
    $store->save();

    $newData = [
        'name' => 'newUnitTest',
        'short_description' => 'newUnitTest',
        'seller' => 'newTestSeller',
    ];

    $response = $this->putJson("/api/v1/stores/{$store->id}", $newData);
    $newData['id'] = $store->id;
    $newData['description'] = null;

    $response->assertStatus(200);
    $this->assertEquals($response['data'], $newData);
    $this->assertDatabaseHas('stores', $newData);

    Store::destroy($store->id);
});

//PATCH
test('patch store', function(){
    $store = new Store;
    $data = [
        'name' => 'UnitTest',
        'short_description' => 'UnitTest',
        'seller' => 'Test',
    ];
    $store->fill($data);
    $store->save();

    $body = [
        'short_description' => 'newUnitTest',
    ];

    $newData = [
        'name' => 'UnitTest',
        'short_description' => 'newUnitTest',
        'seller' => 'Test',
    ];

    $response = $this->patchJson("/api/v1/stores/{$store->id}", $body);
    $newData['id'] = $store->id;
    $newData['description'] = null;

    $response->assertStatus(200);
    $this->assertEquals($response['data'], $newData);
    $this->assertDatabaseHas('stores', $newData);

    Store::destroy($store->id);
});

//DELETE
test('delete store', function(){
    $store = new Store;
    $data = [
        'name' => 'UnitTest',
        'short_description' => 'UnitTest',
        'seller' => 'Test',
    ];
    $store->fill($data);
    $store->save();

    $response = $this->deleteJson("/api/v1/stores/{$store->id}");
    $data['id'] = $store->id;

    $response->assertStatus(200);
    $this->assertEquals(null, Store::find($store->id));
});