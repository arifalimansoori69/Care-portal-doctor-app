<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<style>
    /* Full-page center */
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #6dd5ed, #2193b0);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Form container */
    .container {
        width: 400px;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    label {
        font-weight: 500;
        margin-bottom: 5px;
        display: block;
        color: #555;
    }

    input.form-control {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        font-size: 14px;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    input.form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 5px rgba(40,167,69,0.3);
        outline: none;
    }

    button.btn-success {
        width: 100%;
        background-color: #28a745;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        transition: 0.3s;
    }

    button.btn-success:hover {
        background-color: #218838;
        cursor: pointer;
    }

    p {
        text-align: center;
        font-size: 14px;
        margin-top: 15px;
        color: #fff;
    }

    p a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
    }

    p a:hover {
        text-decoration: underline;
        color: #e0f7ea;
    }
</style>
</head>
<body>
<div class="container">
  <h2>Register</h2>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required class="form-control">

    <label>Email:</label>
    <input type="email" name="email" required class="form-control">

    <label>Password:</label>
    <input type="password" name="password" required class="form-control">

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required class="form-control">

    <button type="submit" class="btn btn-success">Register</button>
  </form>
  <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>
</body>
</html>
