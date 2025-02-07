<style>
    .container-store {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-group input[type="file"] {
        padding: 3px;
    }

    .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }
</style>
<div class="app-content">
    <div class="container-store">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h2>Create New User</h2>
        <form method="POST" action="{{route('admin.account.createUser.post')}}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="fullname">Full name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your fullname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address">
            </div>
            <div class="form-group">
                <label for="phone-number">Phone Number</label>
                <input type="text" id="phone-number" name="phone" placeholder="Enter your phone number">
            </div>
            <div class="form-group">
                <button type="submit">Create User</button>
            </div>
        </form>

    </div>
</div>