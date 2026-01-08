<?php

namespace App\Http\Controllers;

use App\Models\Pokedex;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    // 1. แสดงรายการทั้งหมด (Read)
    public function index() {
        $pokemons = Pokedex::all();
        return view('pokedex.index', compact('pokemons'));
    }

    // 2. หน้าฟอร์มสำหรับเพิ่มข้อมูล
    public function create() {
        return view('pokedex.create');
    }

    // 3. บันทึกข้อมูลใหม่ (Insert)
    public function store(Request $request) {
        Pokedex::create($request->all());
        return redirect()->route('pokedex.index')->with('success', 'เพิ่มโปเกมอนเรียบร้อย!');
    }

    // 4. หน้าฟอร์มสำหรับแก้ไขข้อมูล
    public function edit($id) {
        $pokedex = Pokedex::findOrFail($id);
        return view('pokedex.edit', compact('pokedex'));
    }

    // 5. อัปเดตข้อมูล (Update)
    public function update(Request $request, $id)
{
    $pokedex = Pokedex::findOrFail($id);
    $pokedex->update($request->all());

    return redirect()->route('pokedex.index')->with('success', 'Updated successfully');
}

    // 6. ลบข้อมูล (Delete)
    public function destroy($id) {
        $pokemon = Pokedex::findOrFail($id);
        $pokemon->delete();
        return redirect()->route('pokedex.index')->with('success', 'ลบโปเกมอนแล้ว');
    }
}
