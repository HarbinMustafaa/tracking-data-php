<!-- resources/views/trackers/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trackers List</title>
    
    <!-- Add Bootstrap CSS (either link from CDN or include locally) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Alternatively, you can download Bootstrap and include it locally -->

    <!-- Include any additional styles or scripts here -->
</head>
<body>
    <div class="container mt-5">
        <h2>Tracking Data List</h2>

        @if (count($trackers) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th class="col-2">Name</th> <!-- Set the width of the "Name" column to 2 columns -->
                        <th class="col-4">Description</th> <!-- Set the width of the "Description" column to 2 columns -->
                        <th>Is Completed</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trackers as $tracker)
                        <tr>
                        
                            <td>{{ $tracker->name }}</td>
                            <td>{{ $tracker->description }}</td>
                            <td>{{ $tracker->is_finished ? 'Yes' : 'No' }}</td>
                            <td>{{ $tracker->created_at }}</td>
                            <td>
                                <a href="{{ route('trackers.edit', ['tracker' => $tracker->id]) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('trackers.destroy', ['tracker' => $tracker->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No trackers found.</p>
        @endif
        <a href="{{ route('trackers.create') }}" class="btn btn-success">Add New Data</a>
    </div>
   
    <!-- Add Bootstrap JS (optional, depends on your requirements) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
