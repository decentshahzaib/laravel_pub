@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 <div class="row">
    <div class="col-12">
        <div class="w-25 m-auto">
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                @if(session('msg') != '')
                    <div class="alert alert-warning w-50">{{ session('msg') }}</div>
                @endif
        
                <!-- New Task Form -->
                <form action="{{ route('task3Store') }}" method="POST" class="form-horizontal">
                    <!-- {{ csrf_field() }} -->
                    @csrf
        
                    <!-- Task Name -->
                    <div class="form-group mb-2">
                        <label for="task" class="control-label mb-3">Task</label> <span><a href="/task3" class="btn btn-info">View Tasks</a></span>
        
                        <div class="col-sm-6 mb-2">
                            <input type="time" name="time" id="task-time" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <input type="date" name="date" id="task-date" class="form-control">
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