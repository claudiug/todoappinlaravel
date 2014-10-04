<?php

class TodosController extends \BaseController
{

    public function index()
    {
        $query = Input::get('q');
        if ($query){
            $todos = Todo::where('title', 'LIKE', "%$query%")->get();
            return View::make('todos.index', ['todos' => $todos]);
        } else {
            $todos = Todo::all();
            return View::make('todos.index', ['todos' => $todos]);
        }
    }

    public function create()
    {   //form to create a new todo
        return View::make('todos.create');
    }


    public function store()
    {
        //TODO add errors in the view
        $rules = [
            'title' => 'required|unique:todos',
            'status' => 'required|boolean:todos'
        ];
        $input = Input::only('title', 'status');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            Todo::create($input);
            return Redirect::to('todos');
        }

    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return View::make('todos.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        //edit the todo
        $todo = Todo::find($id);
        return View::make('todos.edit')->with('todo', $todo);
    }

    public function update($id)
    {
        $todo = Todo::find($id);
        $input = Input::only('title', 'status');
        if($todo->fill($input)->save()){
           return  Redirect::to('todos');
        } else {
            return Redirect::to('todo.edit');
        }
    }

    public function destroy($id)
    {
        //
    }

}
