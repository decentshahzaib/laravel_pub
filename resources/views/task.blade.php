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
        <form action="{{ route('store') }}" method="POST" class="form-horizontal">
            <!-- {{ csrf_field() }} -->
            @csrf
 
            <!-- Task Name -->
            <div class="form-group mb-1">
                <label for="task" class="control-label mb-3">Task</label> <span><a href="/view" class="btn btn-info">View Tasks</a></span>
 
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