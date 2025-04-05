<form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST">
    @csrf
    @if(isset($employee))
        @method('PUT')
    @endif
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $employee?->name?? '' }}" required>
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="number" name="age" class="form-control" value="{{ $employee?->age?? '' }}" required>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="{{ $employee?->address?? '' }}" required>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $employee?->phone ?? '' }}" required>
    </div>
    <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Update' : 'Save'}}</button>
</form>