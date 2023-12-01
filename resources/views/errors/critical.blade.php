@extends('layouts.app')
@section('content')
    <main>
        <div class="d-flex justify-content-center align-items-center">
            <h1>Operation Failed</h1>
            <p>We apologize, but an unexpected error occurred during the operation. Please try again later.</p>

        </div>
        <div>
            {{ $message }}
        </div>
    </main>
@endsection
