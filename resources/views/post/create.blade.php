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
        <a href="{{ route('posts.index') }}" class="btn btn-primary">View</a>
    </div>

    <div class="container">
        <div class="row">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-12">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                </div>

                <div class="col-md-12" style="margin-top: 10px;">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="10" placeholder="Type here..." required></textarea>
                </div>

                <div class="col-md-12" style="margin-top: 10px;">
                    <label for="description">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <div class="col-md-12" style="margin-top: 10px;">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                    <label for="status">Status</label>
                </div>

                <div class="col-md-12" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
