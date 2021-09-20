@if ($errors->any())
    <div class="alert alert-danger">
        <b>Login failed. Reason:</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
