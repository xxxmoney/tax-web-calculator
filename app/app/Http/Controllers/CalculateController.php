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

        $types = ['fields', 'classic', 'duo', 'other'];

        // Calculate average result for each type.
        $averageResults = [
            ['type' => 'fields', 'result' => 0],
            ['type' => 'classic', 'result' => 0],
            ['type' => 'duo', 'result' => 0],
            ['type' => 'other', 'result' => 0]
        ];
        foreach ($items as $item) {
            foreach ($averageResults as $key => $averageResult) {
                if ($averageResult['type'] == $item->type) {
                    $averageResults[$key]['result'] += $item->result;
                }
            }
        }

        return view('calculate.index', [
            'items' => $items,
            'averageResults' => $averageResults
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
        ]);

        $item = new Tax();
        $item->price = $request->price;
        $item->type = $request->type;
        $item->coeficient = $request->coeficient;

        // Calculate result.
        $baseTaxCoeficient;
        switch ($item->type) {
            case 'fields':
                $baseTaxCoeficient = 6;
                break;
            case 'classic':
                $baseTaxCoeficient = 2.6;
                break;
            case 'duo':
                $baseTaxCoeficient = 3.1;
                break;
            case 'other':
                $baseTaxCoeficient = 3.5;
                break;
        }
        $baseTax = $item->price * ($baseTaxCoeficient / 1000);
        $item->result = $baseTax * ($item->coeficient / 100);

        $item->save();

        return redirect()->route('calculations');
    }
}
