<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('lecturer.update', $lecturer) }}">
        @csrf
        @method('put')


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $lecturer->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">department</label>
            <select class="form-select @error('department_id') is-invalid @enderror" name="department_id"
                id="department_id">
                <option value=""> -- choose departemen -- </option>
                @foreach ($departments as $department)
                    <!-- Perbaikan penulisan $departmen menjadi $department sesuai variabel di foreach -->
                    <option value="{{ $department->id }}" @selected(old('department_id', $lecturer->department_id) == $department->id)>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>

            <!-- Perbaikan penulisan error key dari 'departemen_id' menjadi 'department_id' agar sesuai dengan 'name' di atas -->
            @error('department_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('lecturer.index') }}" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>
