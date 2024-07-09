<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REJMUSIC | User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            REJMUSIC | Users
        </a>
        <ul class="navbar-nav ml-auto">
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
        <h3>Users</h3>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Email </th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
        @foreach($users as $user)
            <tr>
              <th scope="row">{{ $user->id  }}</th>
              <td>{{ $user->name  }}</td>
              <td>{{ $user->phone_number  }}</td>
              <td>{{ $user->email  }}</td>
              <td>
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $user->id }}">
                     View
                </button>

                <form style="display: inline-block;" action="{{ route('deleteuser.destroy', $user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <button type="submit" onclick="ConfirmDeletion()" class="btn btn-danger">Delete</button>
                 
              </form>
              </td>
            </tr>

            <div class="modal fade" id="exampleModal-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">User Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                    <div class="col">
                        <img height="100%" width="100%" src="{{ asset('storage/' . $user->avatar) }}">
                    </div>
                    <div class="col">
                    <p><strong>Full Name: {{ $user->name }}</strong></p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Phone Number: {{ $user->phone_number }}</p>
                    <p>Bio: {{ $user->bio }}</p>
                  </div>
                    </div>
                    </div>
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </tbody>
        </table>
    
    </div>

            <!-- Add more rows and columns as needed -->
        </div>
    </div>
    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
