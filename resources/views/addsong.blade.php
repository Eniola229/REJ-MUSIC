<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REJMUSIC | Add Song</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="sidebar">
       <!--  <div class="logo">
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Admin Avatar">
        </div> -->
        @include('components.sidenav');
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            REJMUSIC Songs
        </a>
        <ul class="navbar-nav ml-auto col-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="user-avatar" alt="User Avatar">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="content">
        <h3>Add Song</h3>
        
            <div class="container mt-5">
    <div class="row mb-3">
      <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
          Add Song
        </button>
      </div>
    </div>

    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
    @endif

    <div class="row">
      <div class="col">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Artist</th>
              <th>Category</th>
              <th>Release Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
             @forelse($songs as $song)
            <tr>
              <td>{{ $song->id }}</td>
              <td>{{ $song->title }}</td>
              <td>{{ $song->artist }}</td>
              <td>{{ $song->category }}</td>
              <td>{{ $song->release_date }}</td>
              <td>
              <form style="display: inline-block;" action="{{ route('deletesong.destroy', $song->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="song_id" value="{{ $song->id }}">
                  <button type="submit" class="btn btn-danger" onclick="return confirmDeletion()">Delete</button>
              </form>
               <a href="{{ url('viewspecificsong', $song->id) }}">
                <button class="btn btn-primary">View</button>
              </a>
              </td>
            </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center">No records yet</td>
            </tr>
           @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  

  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCategoryModalLabel">Add SOng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ route('addsongs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Song Title</label>
              <input type="text" class="form-control" id="title" name="songTitle" required>
              <x-input-error :messages="$errors->get('songTitle')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="artistName" class="form-label">Artist Name</label>
              <input type="text" class="form-control" id="artistName" name="artistName" required>
              <x-input-error :messages="$errors->get('artistName')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Song Category</label>
             <select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                 <option>
                     {{ $category->name}}
                 </option>
                @endforeach
             </select>
              <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="albumName" class="form-label">Album</label>
              <input type="text" class="form-control" value="nill" id="albumName" name="albumName" required>
              <x-input-error :messages="$errors->get('albumName')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="genre" class="form-label">Genre</label>
              <input type="text" class="form-control"  value="nill" id="genre" name="genre" required>
              <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="release_date" class="form-label">Release Date</label>
              <input type="date" class="form-control"  value="nill" id="release_date" name="releaseDate" required>
              <x-input-error :messages="$errors->get('release_date')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="songFile" class="form-label">Upload Song</label>
              <input type="file" class="form-control"  value="nill" id="songFile" name="songFile" required>
              <x-input-error :messages="$errors->get('songFile')" class="mt-2" />
            </div>
          <div class="mb-3">
              <label for="coverImage" class="form-label">Cover Image</label>
              <input type="file" class="form-control"  value="nill" id="coverImage" name="coverImage" required>
              <x-input-error :messages="$errors->get('coverImage')" class="mt-2" />
            </div>
            <div class="mb-3">
              <label for="categoryDescription" class="form-label">Song Description</label>
              <textarea class="form-control" id="categoryDescription" name="discription" rows="3" required></textarea>
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Song</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    </div>

    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this song?");
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
