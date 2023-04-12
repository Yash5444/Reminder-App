<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Edit Reminder</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Reminder</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('reminders.index') }}" enctype="multipart/form-data">
                            Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Form starts -->
            <form action="{{ route('reminders.update',$reminder->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <input type="text" name="title" value="{{ $reminder->title }}" class="form-control"
                                placeholder="Title">
                            @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea type="text" name="description" class="form-control" placeholder="Description">{{ $reminder->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DateTime:</strong>
                            <input type="datetime-local" name="date_time" placeholder="DateTime" value="{{ $reminder->date_time }}">
                            @error('date_time')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
            <!-- Form ends -->
        </div>
    </body>

</html>
