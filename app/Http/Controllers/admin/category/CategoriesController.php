<?php

namespace App\Http\Controllers\admin\category;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Publishers;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Categories::paginate(10);
        return view('admin.category.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request['self_link'] = mHelper::permalink($request['name']);

        $insert = Categories::create($request->all());

        return redirect()->back()->with($insert ? 'status' : 'error', $insert ? 'Kategori eklendi.' : 'Kategori eklenemedi.');
    }

    public function edit(int $id)
    {
        $data = Categories::where('id', $id)->get();
        return view('admin.category.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        $data['self_link'] = mHelper::permalink($data['name']);
        $update = Categories::where('id', $request->id)->update($data);
        return redirect()->back()->with($update ? 'status' : 'error', $update ? 'Kategori düzenlendi.' : 'Kategori düzenlenemedi.');
    }

    public function delete(int $id)
    {
        $data = Categories::where('id', $id)->count();
        if ($data != 0) {
            $delete = Categories::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'Kategori silinemedi');
        }

    }
}
