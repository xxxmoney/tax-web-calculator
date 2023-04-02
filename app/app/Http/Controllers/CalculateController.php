<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class CalculateController extends Controller
{
    /**
     * Shows items.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Tax::all();

        return view('calculate.index', [
            'items' => $items
        ]);
    }

    /**
     * Shows item create form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCreate()
    {
        return view('calculate.create');
    }

    /**
     * Inserts item.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function insert(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'type' => 'required',
            'coeficient' => 'required',
            'yearly_tax' => 'required',
            'result' => 'required'
        ]);

        $item = new Tax();
        $item->price = $request->price;
        $item->type = $request->type;
        $item->coeficient = $request->coeficient;
        $item->yearly_tax = $request->yearly_tax;

        // Calculate result.
        $item->result = $item->price * $item->coeficient * $item->yearly_tax;

        $item->save();

        return redirect()->route('calculate');
    }
}
