@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 <div class="row w-100">
    <div class="col-12 d-flex justify-content-center align-items-center" style="height: 95vh;">
        <div class="w-25">

            <div class="alert alert-warning" id="error" style="display: none;"></div>
            <div class="alert alert-success" id="success" style="display: none;"></div>

            <div class="panel-body border mb-4 p-3">
                <!-- Display Validation Errors -->
                @include('common.errors')
        
                <!-- New Task Form -->
                <form class="form-horizontal" id="form1">
                    <!-- {{ csrf_field() }} -->
                    @csrf
        
                    <!-- Task Name -->
                    <div class="form-group mb-2">
                        <label for="task" class="control-label mb-3">Task</label>
        
                        <div class="col-lg-12 col-sm-6 mb-2">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                        <div class="col-lg-12 col-sm-6 mb-2 d-flex">
                            <input type="time" name="time" id="time" class="form-control" onchange="myFun(this);">
                            <input type="text" name="drt" id="drt" class="form-control" readonly>
                        </div>
                        <div class="col-lg-12 col-sm-6">
                            <input type="date" name="date" id="task-date" class="form-control">
                        </div>
                    </div>
        
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success" id="sub1">
                                <i class="fa fa-plus"></i> Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div> 
            
            <div class="panel panel-default border p-3">
            <div class="panel-heading mb-2">
                Current Tasks
            </div>
 
            <div class="panel-body">
                
                <table class="table table-striped table-bordered task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->time }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->date }}</div>
                                </td>
 
                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ route('taskDelete', [$task->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                            
                                        <button type="submit" class="btn btn-danger">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
 
    <!-- TODO: Current Tasks -->
@endsection