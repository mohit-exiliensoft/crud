@section('title', 'Permission List')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Permissions</h1>
    <a href="{{route('permission.create')}}" class="btn btn-primary mb-3">
        {{ __('crud::labels.create') }}
    </a>
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show mx-4 mb-0 mt-3" permission="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Create at</th>
                <th>Update at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->created_at }}</td>
                <td>{{ $permission->updated_at }}</td>
                <td>
                    <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
