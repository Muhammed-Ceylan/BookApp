<?php

namespace App\Http\Controllers\admin\book;

use App\Helper\imageUpload;
use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Publishers;
use Illuminate\Http\Request;

class BookIndexController extends Controller
{
    public function index()
    {
        $data = Books::paginate(10);
        return view('admin.book.index', ['data' => $data]);
    }

    public function create()
    {
        $authors = Authors::all();
        $publishers = Publishers::all();
        return view('admin.book.create', compact('authors', 'publishers'));
    }

    public function edit($id)
    {
        $data = Books::where('id', $id)->get();
        $authors = Authors::all();
        $publishers = Publishers::all();
        return view('admin.book.edit', ['data' => $data], compact('authors', 'publishers'));
    }

    public function store(Request $request)
    {
        $request['self_link'] = mHelper::permalink($request['name']);
        $request['image'] = imageUpload::singleUpload(rand(1, 10000), 'author', $request->file('image'));
        $insert = Books::create($request->all());
        return redirect()->back()->with($insert ? 'status' : 'error', $insert ? 'Kitap eklendi.' : 'Kitap eklenemedi.');
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        $data['self_link'] = mHelper::permalink($data['name']);
        $data['image'] = imageUpload::singleUpload(rand(1, 10000), 'author', $request->file('image'));
        $update = Books::where('id', $request->id)->update($data);
        return redirect()->back()->with($update ? 'status' : 'error', $update ? 'Kitap eklendi.' : 'Kitap eklenemedi.');
    }

    public function delete($id)
    {
        $data = Books::where('id', $id)->count();
        if ($data != 0) {
            $delete = Books::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'Kitap silinemedi');
        }
    }
}
