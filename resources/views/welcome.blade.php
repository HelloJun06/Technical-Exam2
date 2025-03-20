<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="/author">Authors</a></li>
                <li><a href="/book">Books</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">
                <h3>Authors</h3>
            </div>
            <div class="info">
                <form action="/add-author" method="POST">
                  @csrf
                  <input type="text" name="name" id="" placeholder="Name">
                  <label for="Birthdate">Birthdate:</label>
                  <input type="date" name="birth_date" id="">
                  <button class="btn btn-success">Save</button>
                </form>
            </div>

           

            <div class="display-authors">
                <table>
                    <tr>
                        <td>Author Name</td>
                        <td>Birthdate</td>
                        <td>Actions</td>
                    </tr>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{$author['name']}}</td>
                            <td>{{$author['birth_date']}}</td>
                            <td>
                                <form class="form-action" action="/edit-author/{{$author->id}}" method="GET">
                                    @csrf
        
                                    <button class="btn btn-warning">Edit</button>
                                </form>
                                <form class="form-action" action="/delete-author/{{$author->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
               
                </table>
            </div>
           

        </div>


    
  

    </div>


   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
</body>
</html>