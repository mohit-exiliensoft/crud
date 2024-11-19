<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <h4>Create Role</h4>
</head>
<body>
    <form action="{{ route('role.store') }}" method="post">
        @csrf
        <div class="col-6">
            <label for="name" class="form-label">{{ __('crud::labels.role_name') }}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('crud::labels.role_name') }}" value="{{ old('name') }}" />
        </div>
        <br>
        {{-- <div class="col-6">
            <h5>{{ __('crud::labels.permissions') }}</h5>
            <div class="form-group">
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                        <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div> --}}
        <br>
        <div>
            <a href="{{ route('role.index') }}" class="btn btn-warning">{{ __('crud::labels.cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('crud::labels.create') }}</button>
        </div>

    </form>
</body>
</html>
