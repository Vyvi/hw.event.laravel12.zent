<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<a href="{{asset('')}}todos/create"><button type="button" class="btn btn-info btn-sm">add</button></a>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Todo</th>
				<th>Created_at</th>
				<th>Updated_at</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($todos as $todo)
	 <tr>
	 	<td>{{ $todo->id }}</td>
	 	<td>{{ $todo->todo }}</td>
	 	<td>{{ $todo->created_at }}</td>
	 	<td>{{ $todo->updated_at }}</td>
	 	<td>
	 		<a href="{{asset('')}}todos/{{$todo->id}}"><button type="button" class="btn btn-info btn-sm">Show</button></a>
	 		<a href="{{asset('')}}todos/{{$todo->id}}/edit"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
	 		<form action="{{asset('')}}todos/{{$todo->id}}" method="post" onsubmit="return confirm('Xoa?');">
	 			{{csrf_field()}}
				<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
				{{method_field('delete')}}
				<!-- <input type="hidden" name="_method" value="delete"> -->
	 			<button type="submit" class="btn btn-success btn-sm">Delete</button>
	 		</form>
	 	</td>
	 </tr>
	 @endforeach
		</tbody>
	</table>
</body>
</html>