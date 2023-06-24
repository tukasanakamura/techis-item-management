<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Item::query();
        $search = $request->input('search');
        $type = $request->input('type');
    
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('detail', 'LIKE', "%{$search}%");
            });
        }
        // 追加：種別に基づく検索
        if ($type) {
            $query->where('type', $type);
        }
    
        $items = $query->get();
    
        return view('item.index', compact('items'));
    }
    
    
    /**
     * Display the form to create a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 管理者権限を持っているか確認
        if (Auth::user()->role !== 1) {
            return redirect('items')->withErrors(['access' => '管理者のみ商品登録が可能です']);
        }
        return view('item.add');
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        // 商品登録
        Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
        ]);

        return redirect('/items');
    }

    /**
     * 商品編集画面表示
     */
    public function edit($id)
    {
        // 管理者権限を持っているか確認
        if (Auth::user()->role !== 1) {
            return redirect('items')->withErrors(['access' => '管理者のみ商品情報の編集が可能です']);
        }

        $item = Item::find($id);
        return view('item.edit', compact('item'));
    }

    /**
     * 商品更新処理
     */
    public function update(Request $request, Item $item)
    {
        // バリデーション
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);

        // 商品情報更新
        $item->update([
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
        ]);

        return redirect('/items');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('/items')->with('success', '商品が削除されました');
    }
}
