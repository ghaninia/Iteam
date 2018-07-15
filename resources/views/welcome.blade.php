<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="row">
            <div class="col-md-4 col-md-push-4" style='margin-top:100px'>
                <form action="{{ route('file.store') }}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class='form-group'>
                        <input class='form-control' type="file" name='attachment'>
                    </div>
                    <div class='form-group'>
                        <button class='btn btn-danger'>ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
