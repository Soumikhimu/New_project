<!DOCTYPE html>
<html>
<head>
    <style>
        /* Add some basic styling for the table */
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }
        
        /* Style table headers */
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /* Add background color to header row */
        th {
            background-color: #915151;
        }
    </style>
</head>
<body>
    <h2 class="text-gray-600 text-3xl ">Category List</h2>
    <table>
        <div>
            <tr>
                <th>Category</th>
                <th>t1</th>
                <th>t2 </th>
                <th>action</th>
            </tr>
        </div>
        <div>
            @forelse ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td class="emoji">&#128512;</td>
                <td class="emoji">😲</td>
                <td class="px-6 py-4">
                    
                    <a href="{{route('categoryedit', $category->id)}}" class="font-medium text-white hover:underline">Edit</a>
                    <form class="inline" action="{{route('category.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="font-medium text-red-600 hover:underline dark:text-red-600" type="submit" value="Delete">
                    </form>
                </td> 
            </tr>
            @empty
                
            @endforelse

        </div>
        
    </table>
</body>
</html>