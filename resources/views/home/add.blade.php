<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
<div class="add-container">
    <h2 class="text-center text-2xl font-semibold text-gray-800 mb-8">Add New Student</h2>
    
    <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="fields">
            <label for="img" class="block-label">Image</label>
            <input type="file" name="img" class="input-label" />
        </div>

        <div class="fields">
            <label for="name" class="block-label">Name</label>
            <input type="text" name="name" class="input-label" placeholder="Enter Name" required/>
        </div>

        <div class="fields">
            <label for="email" class="block-label">Email</label>
            <input type="email" name="email" class="input-label" placeholder="Enter Email" required />
        </div>

        <div class="fields">
            <label for="address" class="block-label">Address</label>
            <input type="text" name="address" class="input-label" placeholder="Enter Address" required/>
        </div>

        <div class="fields">
            <label for="phone_no" class="block-label">Phone Number</label>
            <input  type="number" name="phone_no" class="input-label" placeholder="Enter Phone Number" required/>
        </div>

        <div class="text-center">
            <button type="submit" class="submit-btn">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
