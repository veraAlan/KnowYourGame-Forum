<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API Test - UsersDbController</title>
</head>
<body>
    <h1>API Test - UsersDbController</h1>

    <!-- Create User Form -->
    <h2>Create User</h2>
    <form method="POST" action="{{ url('users_db') }}">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <button type="submit">Create User</button>
    </form>

    <!-- List Users Button -->
    <h2>List Users</h2>
    <form method="GET" action="{{ url('users_db') }}">
        <button type="submit">List Users</button>
    </form>

    <!-- Show User Form -->
    <h2>Show User</h2>
    <form method="GET" action="{{ url('users_db/1') }}">
        <button type="submit">Show User</button>
    </form>

    <!-- Edit User Form -->
    <h2>Edit User</h2>
    <form method="POST" action="{{ url('users_db/1') }}">
        @csrf
        @method('PUT')
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="CurrentUsername" required>
        <button type="submit">Update User</button>
    </form>

    <!-- Delete User Form -->
    <h2>Delete User</h2>
    <form method="POST" action="{{ url('users_db/1') }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete User</button>
    </form>

    @if(isset($user))
        <h2>User Details</h2>
        <p>Username: {{ $user->username }}</p>
    @endif

    @if(isset($editUser))
        <h2>Edit User</h2>
        <form method="POST" action="{{ url('users_db', $editUser->id) }}">
            @csrf
            @method('PUT')
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="{{ $editUser->username }}" required>
            <button type="submit">Update User</button>
        </form>
    @endif

</body>
</html>
