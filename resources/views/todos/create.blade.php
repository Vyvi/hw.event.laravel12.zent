<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form action="{{asset('')}}todos" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Todo</label>
						<input type="text" class="form-control" name="todo" id="todo" placeholder="Todo">
					</div>
					<button type="submit" class="btn btn-primary" >Add</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>