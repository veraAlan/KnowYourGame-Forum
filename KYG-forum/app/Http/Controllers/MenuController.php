<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // public function index()
    // {
    //     return Menu::all();
    // }
    public function index()
    {
        $menus = Menu::get();
        return view('test.menus.index', ['menus' => $menus]);
    }


    // public function create()
    // {
    //     //
    // }
    public function create(Menu $menus)
    {
        return view('test.menus.create', ['menus' => $menus]);
    }

    // public function store(Request $request)
    // {
    //     $menu = Menu::create($request->all());
    //     return response()->json($menu, 201);
    // }
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required']]);
        Menu::create($validated);
        session()->flash('status', 'Menu creado!');
        return redirect()->route('test.menus.index');
    }

    // public function show($id)
    // {
    //     return Menu::find($id);
    // }
    public function show($id)
    {
        $menus = Menu::findOrFail($id);
        return view('test.menus.show', ['menus' => $menus]);
    }

    // public function edit($id)
    // {
    //     //
    // }
    public function edit(Menu $menus)
    {
        return view('test.menus.edit', ['menus' => $menus]);
    }

    // public function update(Request $request, $id)
    // {
    //     $menu = Menu::findOrFail($id);
    //     $menu->update($request->all());
    //     return response()->json($menu, 200);
    // }
    public function update(Request $request, Menu $menus)
    {
        $validated = $request->validate(['name' => ['required']]);
        $menus->update($validated);
        session()->flash('status', 'Menu actualizado!');
        return redirect()->route('test.menus.index');
    }

    // public function destroy($id)
    // {
    //     Menu::destroy($id);
    //     return response()->json(null, 204);
    // }
    public function destroy(Menu $menus)
    {
        $menus->delete();
        session()->flash('status', 'Menu eliminado!');
        return to_route('test.menus.index');
    }
}