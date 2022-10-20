@extends('layouts.app')
 
@section('content')
    <!-- Create Task Form... -->
 
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
    
    <div class="row">
                    <div class="col-12">
                        <div class="w-25 m-auto">
        <div class="panel panel-default">
            <div class="panel-heading mb-2">
                Current Tasks <a href="/" class="btn btn-info">Add Tasks</a>
            </div>
 
            <div class="panel-body">
                
                <table class="table table-striped table-bordered task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
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
 
                                <!-- Delete Button -->
                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
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
    @endif
@endsection