<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Link;

class MyLinksController extends Controller
{
	public function index()
	{
		$links = Link::where('user_id', Auth::id())
			->orderBy('order', 'asc')
			->orderBy('id', 'asc')
			->get();
		return view('mylinks', compact('links'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:255',
			'url' => 'required|url|max:255',
		]);
		$maxOrder = Link::where('user_id', Auth::id())->max('order');
		Link::create([
			'user_id' => Auth::id(),
			'title' => $request->title,
			'url' => $request->url,
			'order' => is_numeric($maxOrder) ? $maxOrder + 1 : 0,
		]);
		return redirect()->route('mylinks')->with('success', 'Link hinzugefügt!');
	}

	public function update(Request $request, Link $link)
	{
	// $this->authorize('update', $link); // Policy not implemented yet
		$request->validate([
			'title' => 'required|string|max:255',
			'url' => 'required|url|max:255',
		]);
		$link->update($request->only(['title', 'url']));
		return redirect()->route('mylinks')->with('success', 'Link aktualisiert!');
	}

	public function destroy(Link $link)
	{
	// $this->authorize('delete', $link); // Policy not implemented yet
		$link->delete();
		return redirect()->route('mylinks')->with('success', 'Link gelöscht!');
	}

    public function reorder(Request $request)
	{
		try {
			$data = $request->isJson() ? $request->json()->all() : $request->all();
			$order = $data['order'] ?? [];
			if (!is_array($order) || empty($order)) {
				return response()->json(['success' => false, 'message' => 'Keine Links zum Sortieren erhalten.'], 400);
			}
			foreach ($order as $index => $id) {
				Link::where('id', $id)->where('user_id', Auth::id())->update(['order' => $index]);
			}
			return response()->json(['success' => true]);
		} catch (\Exception $e) {
			return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
		}
	}
}
