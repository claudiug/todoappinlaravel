@extends('layouts.layout')
    @section('content')
        @include('partials.errors')
        <div class="col-lg-8">
        {{link_to_route('todos.index','List All Todos', null, ['class'=> 'btn btn-info'])}}
            <h1>Create here a new todo</h1>
            {{Form::open(['route'=> 'todos.store'])}}
                <div class="form-group">
                    {{Form::label('title')}}
                    {{Form::text('title', null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('status')}}
                    {{Form::select('status', ['0' => 'Progress', '1' => 'Done'], null, ['class'=> 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::submit('Create', ['class' => 'btn btn-primary'])}}
                </div>
            {{Form::close()}}
        </div>
    @stop