<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodoController extends Controller
{ 	
	/**	
		hiển thị tất cả các todo
		@return

	*/
    public function index(){
    	// $todo = new Todo();
    	$todos = Todo::getAll();
    	// dd($todos);
    	return view('todos.index', ['todos'=>$todos, 'name'=>'Vinh']);
    }
    public function show($id){
    	
    	$todo = Todo::find($id);
    	
    	return view('todos.show', ['todo'=>$todo]);
    }
    public function destroy($id){
    	
    	$todo = Todo::find($id)->delete();
    	
    	return redirect('todos');
    }
    public function create(){
    	return view('todos.create');
    }
    public function store(Request $request){
    	Todo::create(['todo'=> $request->todo]);
    	return redirect('todos');
    }
    public function edit($id){
    	
    	$todo = Todo::find($id);
    	// dd($todo);
    	return view('todos.edit', ['todo'=>$todo]);
    }
     public function update(Request $request,$id)
    {
        Todo::find($id)->update($request->all());
        return redirect('todos');
    }
}
