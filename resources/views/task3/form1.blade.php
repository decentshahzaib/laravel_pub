@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 <div class="row">
    <div class="col-12">
        <div class="w-25 m-auto">
            <div class="panel-body border mb-3 p-3">
                <!-- Display Validation Errors -->
                @include('common.errors')
        
                <!-- New Task Form -->
                <form action="{{ route('task3Store') }}" method="POST" class="form-horizontal" id="form1">
                    <!-- {{ csrf_field() }} -->
                    @csrf
        
                    <!-- Task Name -->
                    <div class="form-group mb-2">
                        <label for="task" class="control-label mb-3">Task</label> <span><a href="/task3" class="btn btn-info">View Tasks</a></span>
        
                        <div class="col-lg-12 col-sm-6 mb-2">
                            <input type="text" name="name" id="task-name" class="form-control">
                        </div>
                        <div class="col-lg-12 col-sm-6 mb-2 d-flex">
                            <input type="time" name="time" id="time" class="form-control" onchange="myfun(this);">
                            <select name="drt" id="drt" class="form-select" disabled>
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
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
                Current Tasks <a href="/task3/form" class="btn btn-info">Add Tasks</a>
            </div>
 
            <div class="panel-body">
                
                <table class="table table-striped table-bordered task-table">
 
                    <!-- Table Headings -->
                    <thead>
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
                                    <div>{{ $task->time }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->date }}</div>
                                </td>
 
                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ route('task3Delete', [$task->id]) }}" method="POST">
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