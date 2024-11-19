<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Permission</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <form action="{{ route('permission.update', $permission->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-6">
            <label for="name" class="form-label">{{ __('crud::labels.permission_name') }}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('crud::labels.permission_name') }}" value="{{ $permission->name }}" />
            {{-- @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror --}}
        </div>
        <br>
        <div>
            <a href="{{ route('permission.index') }}" class="btn btn-warning">{{ __('crud::labels.cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('crud::labels.update') }}</button>
        </div>
    </form>
</body>
</html>
