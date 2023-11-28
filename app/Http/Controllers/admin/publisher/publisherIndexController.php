<?php

namespace App\Http\Controllers\admin\publisher;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Publishers;
use Illuminate\Http\Request;

class publisherIndexController extends Controller
{
    public function index()
    {
        $data = Publishers::paginate(10);
        return view('admin.publisher.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.publisher.create');
    }

    public function store(Request $request)
    {
        $request['self_link'] = mHelper::permalink($request['name']);

        $insert = Publishers::create($request->all());

        return redirect()->back()->with($insert ? 'status' : 'error', $insert ? 'Yayın evi eklendi.' : 'Yayın evi eklenemedi.');
    }

    public function edit(int $id)
    {
        $data = Publishers::where('id', $id)->get();
        return view('admin.publisher.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $data = $request->except('_token');
        $data['self_link'] = mHelper::permalink($data['name']);
        $update = Publishers::where('id', $id)->update($data);
        return redirect()->back()->with($update ? 'status' : 'error', $update ? 'Yayın evi düzenlendi.' : 'Yayın evi düzenlenemedi.');
    }

    public function delete(int $id)
    {
        $data = Publishers::where('id', $id)->count();
        if ($data != 0) {
            $delete = Publishers::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'Yayın evi silinemedi');
        }

    }
}
