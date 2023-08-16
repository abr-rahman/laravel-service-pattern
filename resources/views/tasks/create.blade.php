<x-modal title="Create Tasks">
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-2">
            <label for="">Task</label>
            <input type="text" class="form-control" name="task" placeholder="Task" required>
        </div>
        <div class="form-group mb-2">
            <select name="priority">
                <option value="1">Heigh</option>
                <option value="2">Low</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="8" placeholder="Description"></textarea>
        </div>
        <div class="form-group mb-2">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</x-modal>
