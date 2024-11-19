<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <div class="d-flex gap-2 align-items-center mb-4 pb-2">
        <h3 class="page-title">{{ __('crud::labels.permission') }}</h3>
    </div>
    <div class="col-md-12 divide-y-1 dashboard-card-main-col show-table">
        <div class="row">
            <div class="col-12">
                <a href="{{route('permission.index')}}" class="btn btn-primary mb-3">
                    {{ __('crud::labels.back') }}
                </a>
                <div class="card no-scale retailer-table-main">
                    <table class="table table-striped retailer-table">
                        <tbody>
                            <tr>
                                <th class="table-head">{{ __('crud::labels.id') }}</th>
                                <td>{{ $permission->id }}</td>
                            </tr>
                            <tr>
                                <th class="table-head">{{ __('crud::labels.name') }}</th>
                                <td>{{ $permission->name }}</td>
                            </tr>
                            <tr>
                                <th class="table-head">{{ __('crud::labels.created_at') }}</th>
                                <td>{{ $permission->created_at }}</td>
                            </tr>
                            <tr>
                                <th class="table-head">{{ __('crud::labels.updated_at') }}</th>
                                <td>{{ $permission->updated_at }}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
