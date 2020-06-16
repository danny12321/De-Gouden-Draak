<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menuitem;
use App\MenuitemType;

class DishesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dishes.index', [
            'menuitems' => Menuitem::with('MenuitemType')->get()
        ]);
    }

    public function create()
    {
        return view('admin.dishes.create', [
            'item_types' => MenuitemType::all()
        ]);
    }

    public function store()
    {
        $values = $this->validateDish();
        $values['specialty'] = request('specialty') !== null;
        Menuitem::create($values);
        return redirect(route('admin.dishes'));
    }

    public function edit(Menuitem $menuitem)
    {
        return view('admin.dishes.edit', [
            'item' => $menuitem,
            'item_types' => MenuitemType::all()
        ]);
    }

    public function update(Menuitem $menuitem)
    {
        $values = $this->validateDish();
        $values['specialty'] = request('specialty') !== null;
        $menuitem->update($values);
        return redirect(route('admin.dishes'));
    }

    public function destroy(Menuitem $menuitem)
    {
        $menuitem->delete();
        return redirect(route('admin.dishes'));
    }

    protected function validateDish()
    {
        return request()->validate([
            'menunumber' => ['required'],
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'menuitem_type_id' => ['required', 'numeric'],
        ]);
    }
}
