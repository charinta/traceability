<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::paginate(10);
        return view('register-item')->with('item', $item);
    }

    public function show(Item $item, $id)
    {
        $item = Item::findOrFail($id);
        return view('register-item', compact('item'));
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
    public function update(Request $request, Item $item, $id)
    {

        // Retrieve the existing Standard record from the database
        $item = Item::findOrFail($id);

        $validatedData = $request->validate([
            'item_check' => 'required',
        ]);


        // Update the Standard record based on the user input
        $item->item_check = $request->input('item_check');
        // Save the updated Standard record to the database
        $item->save();
        $item->update($validatedData);

        return redirect()->route('register-item.index');
    }

    public function destroy(Item $item, $id): RedirectResponse
    {

        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('register-item.index')->with(['success']);
    }
}
