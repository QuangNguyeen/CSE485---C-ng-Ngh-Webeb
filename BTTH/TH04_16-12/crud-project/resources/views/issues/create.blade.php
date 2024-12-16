<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Issues</title>
</head>
<body>


<h1 style="margin: 50px 50px">Add New Issue</h1>
<form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
    @csrf
    <div class="mb-3">
    </div>
    <div class="mb-3">
        <label for="student_id" class="form-label">Computer</label>
        <select class="form-control" id="computer_id" name="computer_id" required>
            @foreach($computers as $computer)
            <option value="{{ $computer->id }}">{{ $computer->model }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="program" class="form-label">Reported By</label>
        <input type="text" class="form-control" id="program" name="program" required>
    </div>
    <div class="mb-3">
        <label for="supervisor" class="form-label">Reported Date</label>
        <input type="date" class="form-control" id="supervisor" name="supervisor" required>
    </div>
    <div class="mb-3">
        <label for="abstract" class="form-label">Description</label>
        <textarea class="form-control" id="abstract" name="abstract" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="abstract" class="form-label">Urgency</label>
        <select class="form-control" id="urgency" name="urgency" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="abstract" class="form-label">Status</label>
        <select class="form-control" id="status" name="status" required>
            <option value="Open">Open</option>
            <option value="In Process">In Process</option>
            <option value="Resolved">Resolved</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>

</body>
