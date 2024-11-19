<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<h4>Edit</h4>
</head>
<body>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-6">
            <label for="name" class="form-label">{{ __('crud::labels.name') }}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('crud::labels.name') }}" value="{{ $user->name }}" />
        </div>

        <div class="col-6">
            <label for="email" class="form-label">{{ __('crud::labels.email') }}</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('crud::labels.email') }}" value="{{ $user->email }}" />
        </div>
        <br>
        <div class="col-6">
            <label for="status" class="form-label">{{ __('crud::labels.status') }}</label>
            <select id="status" name="status" class="form-select
               ">
                <option value="" selected="true" disabled="disabled"> {{ __('crud::labels.select_status') }}
                <option value="{{ 1 }}" {{ $user->status == 1 ? 'selected' : '' }}>
                    {{ __('crud::labels.active') }}
                </option>
                <option value="{{ 0 }}" {{ $user->status == 0 ? 'selected' : '' }}>
                    {{ __('crud::labels.inactive') }}
                </option>
            </select>
        </div>
        <div class="col-6">
            <label for="address" class="form-label">{{ __('crud::labels.address') }}</label>
            <input type="text" class="form-control " name="address" id="address" placeholder="{{ __('crud::labels.address') }}" value="{{ $user->address }}" />
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">{{ __('crud::labels.phone') }}</label>
            <input type="number" class="form-control" name="phone" id="phone" placeholder="{{ __('crud::labels.phone') }}" value="{{ $user->phone }}" />
        </div>

        <div>
            <a href="{{ route('users.index') }}" class="btn btn-warning">{{ __('crud::labels.cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('crud::labels.update') }}</button>
        </div>
    </form>
</body>
</html>