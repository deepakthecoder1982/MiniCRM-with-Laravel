<!-- resources/views/companies/create.blade.php -->

<form action="{{ route('companies.store') }}" method="POST">
    @csrf
    <!-- Form fields go here -->
    <button type="submit">Create Company</button>
</form>
