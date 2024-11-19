<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Role</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <form action="{{ route('role.update', $role->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-6">
            <label for="name" class="form-label">{{ __('crud::labels.role_name') }}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('crud::labels.role_name') }}" value="{{ $role->name }}" />
        </div>
         <!-- Permissions Section -->
         {{-- <div class="col-6">
            <h5>{{ __('crud::labels.permissions') }}</h5> --}}
            {{-- @foreach($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission{{ $permission->id }}"
                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="permission{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach --}}
        </div>
        <br>
        <div>
            <a href="{{ route('role.index') }}" class="btn btn-warning">{{ __('crud::labels.cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('crud::labels.update') }}</button>
        </div>
    </form>
</body>
</html>
