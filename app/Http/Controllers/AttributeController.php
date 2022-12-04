<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeCreateRequest;
use App\Http\Requests\AttributeUpdateRequest;
use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {
        $data['attributes'] = Attribute::orderBy('title', 'asc')->get();
        return view('attribute.index', $data);
    }

    public function create()
    {
        return view('attribute.create');
    }

    public function store(AttributeCreateRequest $request)
    {
        Attribute::create($request->validated());
        return redirect()->route('attribute.index'); 
    }

    public function show(Attribute $attribute)
    {
        //
    }

    public function edit(Attribute $attribute)
    {
        $data['attribute'] = $attribute;
        return view('attribute.edit', $data);
    }

    public function update(AttributeUpdateRequest $request, Attribute $attribute)
    {
        $attribute->update($request->validated());
        return redirect()->route('attribute.index'); 
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('attribute.index'); 
    }
}
