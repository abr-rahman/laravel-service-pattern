<x-modal title="Update task">
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group mb-2">
            <label for="">Task <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="task" placeholder="Task" value="{{ $task->task }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="">Priority </label>
            <input type="number" class="form-control" name="priority" placeholder="Priority" value="{{ $task->priority }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="8" placeholder="Description">{{ $task->description }}</textarea>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
</x-modal>
