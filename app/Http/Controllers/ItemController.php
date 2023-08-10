<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::paginate(10);
        return view('register-item')->with('item', $item);
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        // dd($item);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Item',
            'data'    => $item  
        ]); 
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search');
        $item = Item::where('item_check', 'like', "%" . $keyword . "%")
            ->paginate(10);
        return view('register-item', compact('item'))->with('i', ($item->currentPage() - 1) * $item->perPage());
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'item_check' => 'required',
        ]);

        $data = $request->all();
        $data['date_created'] = Carbon::now('Asia/Jakarta');
        $data['date_modify'] = Carbon::now('Asia/Jakarta');
        $item = Item::create($data);

        return redirect()->route('register-item.index');
    }

    // view ke halaman update
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('edit-register-item', compact('item'));
    }

    // update data
    public function update(Request $request, $id)
    {
    // Find Item
    $item = Item::findOrFail($id);

    // Validate
    $validate = $request->validate([
      'item_check' => ['required'],
    ]);

    // Updating
    $item->update([
      'item_check' => $request->item_check,
    ]);

    // Response
    return response()->json([
      'success' => true,
      'message' => 'Data Berhasil Diudapte!',
      'data'    => $item
    ]);
    }

    public function destroy(Item $item, $id): RedirectResponse
    {

        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('register-item.index')->with(['success']);
    }
}