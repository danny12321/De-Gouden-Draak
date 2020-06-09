<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MenuitemType;

class MenuItemTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.menuitemtype.index', [
            'menuitemtypes' => MenuitemType::all()
        ]);
    }

    public function create()
    {
        return view('admin.menuitemtype.create');
    }

    public function store()
    {
        MenuitemType::create($this->validateMenuitemType());
        return redirect(route('admin.menuitemtype'));
    }

    public function edit(MenuitemType $menuitemtype)
    {
        return view('admin.menuitemtype.edit', [
            'menuitemtype' => $menuitemtype
        ]);
    }

    public function update(MenuitemType $menuitemtype)
    {
        $menuitemtype->update($this->validateMenuitemType());
        return redirect(route('admin.menuitemtype'));
    }

    public function destroy(MenuitemType $menuitemtype)
    {
        $menuitemtype->delete();
        return redirect(route('admin.menuitemtype'));
    }

    protected function validateMenuitemType()
    {
        return request()->validate([
            'type' => ['required'],
        ]);
    }
}
