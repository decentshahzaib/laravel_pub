@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 <div class="row">
                    <div class="col-12">
                        <div class="w-25 m-auto">
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
        <!-- New Task Form -->
<<<<<<< Updated upstream
        <form action="{{ route('store') }}" method="POST" class="form-horizontal">
=======
        <form action="/task" method="POST" class="form-horizontal">
>>>>>>> Stashed changes
            <!-- {{ csrf_field() }} -->
            @csrf
 
            <!-- Task Name -->
<<<<<<< Updated upstream
            <div class="form-group mb-1">
                <label for="task" class="control-label mb-3">Task</label> <span><a href="/view" class="btn btn-info">View Tasks</a></span>
=======
            <div class="form-group">
                <label for="task" class="control-label">Task</label> <span><a href="/view" class="btn btn-info">View Tasks</a></span>
>>>>>>> Stashed changes
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    

    </div>
</div>
</div>
 
    <!-- TODO: Current Tasks -->
@endsection