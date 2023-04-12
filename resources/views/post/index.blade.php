<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="jumbotron text-center">
        <h1>Posts Management</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dtable">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td width="13%">
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('posts.destroy',$post->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dtable').DataTable();
        });
    </script>
</body>

</html>
