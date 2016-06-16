<?php

namespace Sp\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Models\Category;
use Sp\Repositories\CategoryRepo;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryRepo $category_repo)
    {
        $categories = $category_repo->getAll();

        return view('admin.categories.index', compact('categories'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->dispatchFrom('Sp\Commands\Category\CreateCategoryCommand', $request);

        flash()->success('Categoria creata con successo.');
        
        return redirect()->to('/admin/categorie/' . $category->id .'/modifica');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, CategoryRepo $category_repo)
    {
        $category = $category_repo->getById($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CategoryRepo $category_repo)
    {
        $category = $category_repo->getById($id);

        // return $category;

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->dispatchFrom('Sp\Commands\Category\UpdateCategoryCommand', $request);

        flash()->success('Categoria aggiornata con successo.');


        return redirect()->to('/admin/categorie/' . $category->id .'/modifica');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        return 'true';
    }
}
