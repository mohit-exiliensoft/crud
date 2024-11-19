<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <div>
        <h3 class="page-title">{{ __('crud::labels.user') }}</h3>
    </div>
    <div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('users.index')}}" class="btn btn-primary">
                    {{ __('crud::labels.back') }}
                </a>
                <div>
                    <table class="table table-striped retailer-table">
                        <tbody>
                            <tr>
                                <th>{{ __('crud::labels.id') }}</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('crud::labels.name') }}</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('crud::labels.email') }}</th>
                                <td>{{ $user->email}}</td>
                            </tr>
                            <tr>
                                <th>{{ __('crud::labels.phone') }}</th>
                                <td>{{ $user->phone ? $user->phone : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('crud::labels.role') }}</th>
                                <td>{{ $user->roles ? $user->roles[0]->name : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('crud::labels.address') }}</th>
                                <td>{{ $user->address ? $user->address: 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('crud::labels.status') }}</th>
                                <td>{{ ($user->status ? $user->status: 'N/A' )}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>