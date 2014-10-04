@extends('layouts.layout')
    @section('content')

    <div class="row">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-8">
                        {{Form::open(['method'=> 'GET','class'=> 'form-inline'])}}
                             <div class="form-group">
                               {{Form::label('title')}}
                               {{Form::input('Search', 'q', null, ['class' => 'form-control'])}}
                             </div>
                             <div class="form-group">
                               {{Form::submit('Search', ['class' => 'btn btn-primary'])}}
                             </div>
                             @if(Request::get('q'))
                               <div class="form-group">
                                  {{link_to_route('todos.index','Reset', null, ['class'=> 'btn btn-info'])}}
                                 </div>
                             @endif
                        {{Form::close()}}
                    </div>
            </div>
        </div>
    </div>


        <div class="col-lg-9">
           {{link_to_route('todos.create','Add a new Todo', null, ['class'=> 'btn btn-info'])}}
            <p>List of all todos</p>
            <p>Number of todos:<strong> {{$todos->count()}}</strong></p>

             <table class="table table-bordered table-hover">
                <tr>
                    <th>Id</th>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
                @foreach($todos as $t)
                    <tr>
                        <td>{{$t->id}}</td>
                        <td>
                         @if($t->status == 1)
                            <span class="label label-success">Done</span>
                         @elseif($t->status == 0)
                            <span class="label label-danger">Progress</span>
                          @endif
                        </td>
                        <td>{{$t->title}}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                                    {{link_to_route('todos.edit','Edit', ['id' => $t->id], ['class'=> 'btn btn-info'])}}
                                    {{link_to_route('todos.show','Show', ['id' => $t->id], ['class'=> 'btn btn-info'])}}
                                    {{link_to_route('todos.destroy', 'Delete', ['id' => $t->id], ['class'=> 'btn btn-danger'])}}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
             </table>

        </div>
    @stop