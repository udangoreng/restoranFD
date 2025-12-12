<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //Admin
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'string',
            'price' => 'required|numeric',
            'calories' => 'numeric',
            'description' => 'nullable|string',
            'img_path' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        if ($request->hasFile('img_path')) {
            $data['img_path'] = $request->file('img_path')->storeAs('img', $request->file('img_path')->getClientOriginalName(), 'public');
        }

        Menu::create($data);
        return redirect()->route('admin.menu')->with('success', 'Menu created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.detailmenu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'string',
            'price' => 'required|numeric',
            'calories' => 'numeric',
            'description' => 'nullable|string',
            'img_path' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->all();
        if ($request->hasFile('img_path')) {
            $data['img_path'] = $request->file('img_path')->storeAs('img', $request->file('img_path')->getClientOriginalName(), 'public');
        }

        $menu->update($data);

        return redirect()->route('admin.menu')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Menu deleted successfully.');
    }

    //Customer

    public function show()
    {
        $appetizers = Menu::where('category', 'Appetizer')->get();
        $mainDishes = Menu::where('category', 'Main Dish')->get();
        $desserts = Menu::where('category', 'Dessert')->get();
        $beverages = Menu::where('category', 'Beverages')->get();
        $additionals = Menu::where('category', 'Additional')->get();

        return view('menu', compact('appetizers', 'mainDishes', 'desserts', 'beverages', 'additionals'));
    }

    public function detail(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('detail_menu', compact('menu'));
    }
}
