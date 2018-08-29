<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Todo</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css.map">
      
    <style type="text/css" media="screen">
        body{
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="#" data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-add">Add</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    
                    <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($todo->id); ?></td>
                        <td><?php echo e($todo->title); ?></td>
                        <td><?php echo e($todo->content); ?></td>
                        <td><?php echo e($todo->time); ?></td>
                        <td><?php echo e($todo->location); ?></td>
                        <td><?php echo e($todo->created_at); ?></td>
                        <td><?php echo e($todo->updated_at); ?></td>
                        <td>
                            <button data-url="<?php echo e(route('todos-ajax.show',$todo->id)); ?>"​ type="button" data-toggle="modal" data-target="#modal-show" class="btn btn-info btn-show">Details</button>
                            <button data-url="<?php echo e(route('todos-ajax.show',$todo->id)); ?>"​ type="button" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-edit">Edit</button>
                            <button data-url="<?php echo e(route('todos-ajax.destroy',$todo->id)); ?>" type="button" class="btn btn-danger btn-delete">Delete</button>
                            
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="" data-url="<?php echo e(route('todos-ajax.store')); ?>" id="form-add" method="POST" role="form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add todo</h4>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="todo-add-title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <input type="text" class="form-control" id="todo-add-content" placeholder="Content">
                    </div>
                    <div class="form-group">
                        <label for="">Time</label><br>

                        <input type="text" class="datepicker" id="todo-add-time"  placeholder="Time">
                        
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" class="form-control" id="todo-add-location" placeholder="Location">
                    </div>
                
                    
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-show">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Show todo</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <h2 id="title"></h2>
                    <h2 id="content"></h2>
                    <h2 id="time"></h2>
                    <h2 id="location"></h2>
                    <h3 id="created_at"></h3>
                    <h3 id="updated_at"></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="" id="form-edit" method="POST" role="form">
                
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit todo</h4>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="">Title</label>

                        <input type="text" class="form-control" id="todo-edit-title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>

                        <input type="text" class="form-control" id="todo-edit-content" placeholder="Content">
                    </div>
                    <div class="form-group">
                        <label for="">Time</label><br>

                        <input type="text" class="form-control datepicker" id="todo-edit-time" placeholder="Time">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>

                        <input type="text" class="form-control" id="todo-edit-location" placeholder="Location">
                    </div>
                
                    
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script type="text/javascript" charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function(){
           $('.datepicker').datepicker({
              
            });
        });

        $(document).ready(function () {

            $('.btn-show').click(function(){
                var url = $(this).data('url');
                // alert(url);
                $.ajax({
                    type: 'get',
                    url: url,
                    success: function(response) {
                        console.log(response)
                        $('h2#title').text(response.data.title)
                        $('h2#content').text(response.data.content)
                        $('h2#time').text(response.data.time)
                        $('h2#location').text(response.data.location)
                        $('h3#created_at').text(response.data.created_at)
                        $('h3#updated_at').text(response.data.updated_at)
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })

            })
            $('#form-add').submit(function (e) {
            e.preventDefault();
            //lấy attribute data-url của form lưu vào biến url
            var url=$(this).data('data-url');
            $.ajax({
                //sử dụng phương thức post
                type: 'post',
                url: url,
                data: {
                    //lấy dữ liệu từ ô input trong form thêm mới
                    title: $('#todo-add-title').val(),
                    content: $('#todo-add-content').val(),
                    time: $('#todo-add-time').val(),
                    location: $('#todo-add-location').val(),
                    name:'Vinh',
                },
                success: function (response) {
                    // hiện thông báo thêm mới thành công bằng toastr
                    toastr.success('Add new todo success!')
                    //ẩn modal add đi
                    $('#modal-add').modal('hide');
                    setTimeout(function () {
                        window.location.href="<?php echo e(route('todos-ajax.index')); ?>";
                    },800);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
            })
            $('.btn-delete').click(function () {
                //lấy attribute data-url của nút xoá lưu vào url
                var url=$(this).attr('data-url');
                // alert(url);
                //hiển thị dialogbox xác nhận xoá
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function(response) {
                        toastr.warning('delete todo success!')
                        window.location.href="<?php echo e(route('todos-ajax.index')); ?>";
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            })
            $('.btn-edit').click(function (e) {
                //mở modal edit lên
                
                //lấy data-url của nút edit
                var url=$(this).attr('data-url');
                // alert(url);
                $.ajax({
                    //phương thức get
                    type: 'get',
                    url: url,
                    success: function (response) {
                        //đưa dữ liệu controller gửi về điền vào input trong form edit.
                        $('#todo-edit-title').val(response.data.title);
                        $('#todo-edit-content').val(response.data.content);
                        $('#todo-edit-time').val(response.data.time);
                        $('#todo-edit-location').val(response.data.location);
                        
                        //thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
                        $('#form-edit').attr('data-url','<?php echo e(asset('todos-ajax/')); ?>/'+response.data.id)
                    },
                    error: function (error) {
                        
                    }
                })
            })
            $('#form-edit').submit(function (e) {
                //mở modal edit lên
                
                //lấy data-url của nút edit
                var url=$(this).attr('data-url');
                // alert(url);
                $.ajax({
                    //phương thức get
                    type: 'put',
                    url: url,
                    data:{
                        title: $('#todo-edit-title').val(),
                        content: $('#todo-edit-content').val(),
                        time: $('#todo-edit-time').val(),
                        location: $('#todo-edit-location').val(),
                    },
                    success: function (response) {
                        toastr.success('edit todo success!');
                        $('#modal-edit').modal('hide');
                        
                        window.location.reload();
                        
                    },
                    error: function (error) {
                        
                    }
                })
            })

        })
    </script>
</body>
    
</html>