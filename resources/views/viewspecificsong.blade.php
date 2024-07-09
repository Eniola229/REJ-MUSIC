<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Music Details</title>
    <style>
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-img {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            height: 100%;
            object-fit: cover;
        }
        .card-body {
            background: #f8f9fa;
            padding: 20px;
        }
        .audio-player {
            width: 100%;
            margin-top: 20px;
        }
        .song-details {
            padding: 20px;
        }
        .song-details h5 {
            font-size: 2rem;
        }
        .song-details p {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $song->coverPath) }}" class="card-img" alt="{{ $song->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="song-details">
                            <h5 class="card-title">{{ $song->title }}</h5>
                            <p class="card-text"><strong>Artist:</strong> {{ $song->artist }}</p>
                            <p class="card-text"><strong>Album:</strong> {{ $song->album }}</p>
                            <p class="card-text"><strong>Genre:</strong> {{ $song->genre }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $song->category }}</p>
                            <p class="card-text"><strong>Release Date:</strong> {{ $song->release_date }}</p>
                            <p class="card-text"><strong>Song ID:</strong> {{ $song->id }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $song->discription }}</p>
                        </div>
                        <audio controls class="audio-player">
                            <source src="{{ asset('storage/' . $song->file_path) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
