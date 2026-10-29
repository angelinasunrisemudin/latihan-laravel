<x-App>

    <x-slot:title>{{ $title }}</x-slot>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <a button class="btn btn-primary mb-3" href="{{ route('department.create') }}" role="button">Create Department</a>

    <table class="table table-bordered border-dark table-hover mb-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Nim</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->nim }}</td>
                    <td>
                        <a button class="btn btn-warning" href="{{ route('department.edit', $department) }}"
                            role="button">Edit</a>


                        <form method="POST" action="{{ route('department.destroy', $department) }}" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>

                            </from>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-App>
