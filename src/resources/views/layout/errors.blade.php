
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="container">
    @if (session('error'))
        <div class="alert alert-danger">
            <p>{{session('error')}}</p>
        </div>
    @endif
</div>

