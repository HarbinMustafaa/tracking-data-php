<!-- resources/views/trackers/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tracker</title>
    
    <!-- Add Bootstrap CSS (either link from CDN or include locally) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Alternatively, you can download Bootstrap and include it locally -->

    <!-- Include any additional styles or scripts here -->
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Tracker</h2>
        
        <form action="{{ route('trackers.update', ['tracker' => $tracker->id]) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $tracker->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" rows="4" required>{{ $tracker->description }}</textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="is_finished" {{ $tracker->is_finished ? 'checked' : '' }} value="1">
                <label class="form-check-label" for="is_finished">Is Completed</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <!-- Add Bootstrap JS (optional, depends on your requirements) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
