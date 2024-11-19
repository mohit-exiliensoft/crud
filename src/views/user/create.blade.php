<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <h4>Create</h4>

    
</head>
<body>
    
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="col-6">
            <label for="name" class="form-label">{{ __('crud::labels.name') }}</label>
            <input type="text" class="form-control"  name="name" id="name" placeholder="{{ __('crud::labels.name') }}" value="{{ old('name') }}" />
        </div>

        <div class="col-6">
            <label for="email" class="form-label">{{ __('crud::labels.email') }}</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('crud::labels.email') }}" value="{{ old('email') }}" />
        </div>

        <div class="col-6">
            <label for="password" class="form-label">{{ __('crud::labels.password') }}</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('crud::labels.password') }}" value="{{ old('password') }}" />
        </div>
        <br>
        <div class="col-6">
            <label for="status" class="form-label">{{ __('crud::labels.status') }}</label>
            <select id="status" name="status"
                class="form-select
          ">
                <option value="" selected="true" disabled="disabled"> {{ __('crud::labels.select_status') }}
                <option value="{{ 1 }}">{{ __('crud::labels.active') }}</option>
                <option value="{{ 0 }}">{{ __('crud::labels.inactive') }}</option>
            </select>
        </div>
        <div class="col-6">
            <label for="address" class="form-label">{{ __('crud::labels.address') }}</label>
            <input type="address" class="form-control" name="address" id="address" placeholder="{{ __('crud::labels.address') }}" value="{{ old('address') }}" />
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">{{ __('crud::labels.phone') }}</label>
            <input type="phone" class="form-control" name="phone" id="phone" placeholder="{{ __('crud::labels.phone') }}" value="{{ old('phone') }}" />
        </div>
        <br>
        <div>
            <a href="{{ route('users.index') }}" class="btn btn-warning">{{ __('crud::labels.cancel') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('crud::labels.create') }}</button>
        </div>

    </form>
</body>
</html>