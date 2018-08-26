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
	<a href="<?php echo e(asset('')); ?>todos/create"><button type="button" class="btn btn-info btn-sm">add</button></a>
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
			<?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	 <tr>
	 	<td><?php echo e($todo->id); ?></td>
	 	<td><?php echo e($todo->todo); ?></td>
	 	<td><?php echo e($todo->created_at); ?></td>
	 	<td><?php echo e($todo->updated_at); ?></td>
	 	<td>
	 		<a href="<?php echo e(asset('')); ?>todos/<?php echo e($todo->id); ?>"><button type="button" class="btn btn-info btn-sm">Show</button></a>
	 		<a href="<?php echo e(asset('')); ?>todos/<?php echo e($todo->id); ?>/edit"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
	 		<form action="<?php echo e(asset('')); ?>todos/<?php echo e($todo->id); ?>" method="post" onsubmit="return confirm('Xoa?');">
	 			<?php echo e(csrf_field()); ?>

				<!-- <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> -->
				<?php echo e(method_field('delete')); ?>

				<!-- <input type="hidden" name="_method" value="delete"> -->
	 			<button type="submit" class="btn btn-success btn-sm">Delete</button>
	 		</form>
	 	</td>
	 </tr>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>