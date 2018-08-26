<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo e(asset('')); ?>todos/<?php echo e($todo->id); ?>" method="POST" role="form">
		<legend>Edit form</legend>
		<?php echo e(csrf_field()); ?>

		<?php echo e(method_field('put')); ?>

		<div class="form-group" >
			<label for="">ID</label>
			<input type="text" class="form-control" id="" name="id" placeholder="Input field" value="<?php echo e($todo->id); ?>">
		</div>
		<div class="form-group" >
			<label for="">Doing</label>
			<input type="text" class="form-control" id="" name="todo" placeholder="Input field" value="<?php echo e($todo->todo); ?>">
		</div>
		<div class="form-group" >
			<label for="">Created_at</label>
			<input type="timestamp" class="form-control" id="" name="created_at" placeholder="Input field" value="<?php echo e($todo->created_at); ?>">
		</div>
		<div class="form-group" >
			<label for="">Updated_at</label>
			<input type="timestamp" class="form-control" id="" name="updated_at" placeholder="Input field" value="<?php echo e($todo-> updated_at); ?>">
		</div>
		<button type="submit" class="btn btn-primary">Edit</button>
	</form>
</body>
</html>