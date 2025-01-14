<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="grid">
     <div class="bg-white shadow-md rounded-lg p-6">
     <form action="{{ route('home') }}" method="GET">
    <div class="search">
        <input type="text" name="search" value="{{ request('search') }}" class="search-button" placeholder="Search by Name"/>
    </div>
</form>

    <div class="flex justify-between items-center mb-6">
    <h2 class="font-semibold text-2xl text-gray-800">Student List</h2>
    <a 
     href="{{ route('home.add') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-200 shadow">
        + Add Students
    </a>
   </div>
   <div class="overflow-x-auto">
    <table class="w-full text-left text-gray-600 border-collapse">
    <thead class="bg-gray-100 text-gray-700">
     <tr>
        <th class="py-3 px-4 border-b-2">Sl No</th>
        <th class="py-3 px-4 border-b-2">Image</th>
        <th class="py-3 px-4 border-b-2">Name</th>
        <th class="py-3 px-4 border-b-2">Email</th>
        <th class="py-3 px-4 border-b-2">Address</th>
        <th class="py-3 px-4 border-b-2">Phone_No</th>
        <th class="py-3 px-4 border-b-2">Action</th>
     </tr>
    </thead>
    <tbody>
      @if($students->count() > 0)
        @foreach($students as $std)
        <tr>
         <td class="text-center">{{ $loop->iteration }}</td>
         <td class="text-center">
            @if($std->img)
                <img src="{{ asset('images/' . $std->img) }}" alt="{{ $std->title }}" style="width: 50px; height: 50px; object-fit: cover;">
            @else
                <span>No Image</span>
            @endif
        </td>
        <td class="text-center">{{ $std->name }}</td>
        <td class="text-center">{{ $std->email }}</td>
        <td class="text-center">{{ $std->address }}</td>
        <td class="text-center">{{ $std->phone_no }}</td>
        <td class="text-center action-buttons">

    <a href="{{route('home.edit',$std->id)}}" class="edit-btn">
     Edit
    </a>
    <form action="{{ route('home.destroy', $std->id) }}" method="POST" onsubmit="return confirm('Delete?')" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="delete-btn">
          Delete
        </button>
    </form>
</td>
</tr>
 @endforeach
    @else
    <tr>
        <td colspan="9" class="text-center">No Products Available</td>
    </tr>
    @endif
    </tbody>
    </table>
 </div>
</div>
</div>
</body>
</html>
