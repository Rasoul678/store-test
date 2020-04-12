<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCity;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $cities = City::orderBy('id')->paginate(5);
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCity $request
     * @return View
     */
    public function store(StoreCity $request)
    {
        $city = City::create($request->validated());
        flash('City: ' . $city->city . ' has been successfully created.');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return View
     */
    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return View
     */
    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCity $request
     * @param City $city
     * @return View
     */
    public function update(StoreCity $request, City $city)
    {
        $city->update($request->validated());
        flash('City: ' . $city->city . ' has been successfully updated.');
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return View
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city_name = $city->city;
        $city->delete();
        flash('City: ' . $city_name . ' has been deleted successfully.');
        return $this->index();
    }
}
