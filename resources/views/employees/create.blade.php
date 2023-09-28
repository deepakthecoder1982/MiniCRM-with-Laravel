<!-- resources/views/employees/create.blade.php -->

<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <!-- Form fields go here -->
    <button type="submit">Create Employee</button>
</form>
