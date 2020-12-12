<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        // Registrar en la bd
        $category = Category::create($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $filename = time() . ' - ' . $request->file('image')->getClientOriginalName();
        
            $file = Image::make($request->file('image'))
                ->resize(250, 250)
                ->save('images/categories/' . $filename);
            
            // Actualizar Categoría
            if ($file) {
                $category->image = $filename;
                $category->save(); //UPDATE
            }
        }


        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category')); //Formulario de registro
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $path = public_path().'/images/categories';
            $filename = time() . ' - ' . $request->file('image')->getClientOriginalName();
        
            $file = Image::make($request->file('image'))
                ->resize(250, 250)
                ->save('images/categories/' . $filename);
            
            // Actualizar Categoría
            if ($file) {
                $previousPath = $path . '/' . $category->image;

                $category->image = $filename;
                $saved = $category->save(); //UPDATE

                if ($saved) {
                    File::delete($previousPath);
                }
                
            }
        }

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete(); // DELETE
        return back();
    }
}
