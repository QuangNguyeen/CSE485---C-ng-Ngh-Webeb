<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <title>Update Issue</title>
</head>
<body>

<h1 style="margin: 50px 50px">Update Issue Information</h1>

<form action="{{ route('issues.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="form-group">
            <label for="computer_id">Computer</label>
            <select name="computer_id" class="form-control" required>
                @foreach($computers as $computer)
                <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>{{ $computer->computer_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="reported_by">Reported By</label>
            <input type="text" name="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="reported_date">Reported Date</label>
            <input type="date" name="reported_date" class="form-control" value="{{ $issue->reported_date }}" required>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="urgency">Urgency</label>
            <select name="urgency" class="form-control" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $issue->description }}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>
