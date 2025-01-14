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
    <h2 class="text-center text-2xl font-semibold text-gray-800 mb-8">Update Student</h2>
    
    <form action="{{ route('home.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 

    <div class="form-group mb-4">
        <label for="img" class="block-label">Image</label>
        <input type="file" name="img" class="input-label" />

        @if($student->img)
            <div style="margin-top: 10px; display: flex; align-items: center;">
                <p style="margin-right: 40px;">Current Image:</p>
                <img src="{{ asset('images/' . $student->img) }}" alt="{{ $student->name }}" style="max-width: 120px; height: 100px;">
            </div>
        @endif
    </div>

    <div class="form-group mb-4">
        <label for="name" class="block-label">Name</label>
        <input type="text" name="name" class="input-label" value="{{ old('name', $student->name) }}" required />
    </div>

    <div class="form-group mb-4">
        <label for="email" class="block-label">Email</label>
        <input type="email" name="email" class="input-label" value="{{ old('email', $student->email) }}" required />
    </div>

    <div class="form-group mb-4">
        <label for="address" class="block-label">Address</label>
        <input type="text" name="address" class="input-label" value="{{ old('address', $student->address) }}" required />
    </div>

    <div class="form-group mb-4">
        <label for="phone_no" class="block-label">Phone Number</label>
        <input type="text" name="phone_no" class="input-label" value="{{ old('phone_no', $student->phone_no) }}" required />
    </div>

    <div class="text-center">
        <button type="submit" class="submit-btn" style="margin-top: 10px;"> Update</button>
    </div>
</form>

</div>
</body>
</html>
