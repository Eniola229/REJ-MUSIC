<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REJMUSIC Create Categories</title>
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
            REJMUSIC Categories
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
        <h3>Add Categories</h3>
        
            <div class="container mt-5">
    <div class="row mb-3">
      <div class="col">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
          Add Category
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
              <th>Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
             @forelse($categores as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->discription }}</td>
              <td>
              <form style="display: inline-block;" action="{{ route('deletecate.destroy', $category->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="category_id" value="{{ $category->id }}">
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>

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
          <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('addcategories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="categoryName" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="categoryName" name="name" required>
            </div>
            <div class="mb-3">
              <label for="categoryDescription" class="form-label">Category Description</label>
              <textarea class="form-control" id="categoryDescription" name="discription" rows="3" required></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
