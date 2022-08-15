<?php

namespace App\Http\Controllers;

use App\Models\Scientist;
use Illuminate\Http\Request;

class ScientistController extends Controller
{
    //показывает список ученых
    public function index()
    {
        $scientists = Scientist::latest()->paginate(5);

        return view('index', compact('scientists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //создание
    public function create()
    {
        return view('create');
    }

    //хранение созданного объекта
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'years' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Scientist::create($input);

        return redirect()->route('index')
            ->with('success', 'Product created successfully.');
    }

    //показывает созданный объект
    public function show(Scientist $scientist)
    {

        return view('show', compact('scientist'));
    }

    //показывает форму для редактирования инфы
    public function edit(Scientist $scientist)
    {
        return view('edit', compact('scientist'));
    }

    //обновление выбранного объекта
    public function update(Request $request, Scientist $scientist)
    {
        $request->validate([
            'name' => 'required',
            'years' => 'required',
            'detail' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $scientist->update($input);

        return redirect()->route('index')
            ->with('success', 'Информация об ученом успешно обновлена');
    }

    //удаление выбранного объекта
    public function destroy(Scientist $scientist)
    {
        $scientist->delete();

        return redirect()->route('index')
            ->with('success', 'Информация об ученом успешно удалена');
    }
}