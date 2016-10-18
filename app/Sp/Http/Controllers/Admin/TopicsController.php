<?php

namespace Sp\Http\Controllers\Admin;

use Event;
use App\Http\Requests;
use Illuminate\Http\Request;
use Sp\Repositories\TopicsRepo;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TopicsRepo $topics_repo)
    {
        $topics = $topics_repo->getAll();

        return view('admin.topics.index', compact('topics'));

    }

    public function create()
    {
        return view('admin.topics.create');
    }

    public function edit($id, TopicsRepo $topics_repo)
    {

        $topic = $topics_repo->getById($id);

        if(! $topic ) return abort(404);
        return view('admin.topics.edit', compact('topic'));
    }

    public function store(Request $request)
    {
       $topic = $this->dispatchFrom('Sp\Commands\Topic\CreateTopicCommand', $request);

        flash()->success('Argomento creato con successo.');

        return redirect()->to('/admin/argomenti/' . $topic->id .'/modifica');
    }

    public function update(Request $request, $id)
    {
        $topic = $this->dispatchFrom('Sp\Commands\Topic\UpdateTopicCommand', $request);
        flash()->success('Argomento aggiornato con successo.');

        return redirect()->to('/admin/argomenti/' . $topic->id .'/modifica');
    }

}
