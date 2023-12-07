<?php

namespace App\Http\Controllers\admin\slider;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderIndexController extends Controller
{
    public function index()
    {
        $data = Slider::paginate(10);
        return view('admin.slider.index', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request['self_link'] = mHelper::permalink($request['name']);

        $insert = Slider::create($request->all());

        return redirect()->back()->with($insert ? 'status' : 'error', $insert ? 'Yayın evi eklendi.' : 'Yayın evi eklenemedi.');
    }

    public function edit(int $id)
    {
        $data = Slider::where('id', $id)->get();
        return view('admin.slider.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        $data['self_link'] = mHelper::permalink($data['name']);
        $update = Slider::where('id', $request->id)->update($data);
        return redirect()->back()->with($update ? 'status' : 'error', $update ? 'Yayın evi düzenlendi.' : 'Yayın evi düzenlenemedi.');
    }

    public function delete(int $id)
    {
        $data = Slider::where('id', $id)->count();
        if ($data != 0) {
            $delete = Slider::where('id', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'Yayın evi silinemedi');
        }

    }
}
