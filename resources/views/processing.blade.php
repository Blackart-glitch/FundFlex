@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h2>Creating Your Wallet</h2>
            <div class="spinner-border text-warning" role="status">
                <span class="sr-only"></span>
            </div>
            <p class="mt-3">Hang tight! We are processing your wallet creation request.</p>

            <div class="text-left mt-4 mb-4" id="taskList">
                <ul class="list-group" id="tasks">
                    <!-- Add tasks dynamically here -->
                </ul>
            </div>

            <p class="text-muted">"Success is not final, failure is not fatal: It is the courage to continue that counts." -
                Winston Churchill</p>
        </div>
    </div>

    <!-- Optional: Add jQuery and Popper.js -->
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Define tasks with their names
            const tasks = [
                'Validating User Information',
                'Generating unique Wallet ID',
                'Activating Wallet',
                // Add more tasks as needed
            ];

            // Add tasks to the list with initial opacity 0
            tasks.forEach(function(task, index) {
                $('#tasks').append('<li class="list-group-item mb-1" id="task' + index +
                    '" style="opacity: 0;">' + task + '</li>');
            });

            // Slide in tasks with delay
            tasks.forEach(function(task, index) {
                setTimeout(function() {
                    $('#task' + index).animate({
                        opacity: 1
                    }, 500).addClass('list-group-item-success');

                    // If it's the last task, add a final task and redirect to the dashboard
                    if (index === tasks.length - 1) {
                        $('#tasks').append(
                            '<li class="list-group-item mb-1 list-group-item-warning" id="finalTask" style="opacity: 0;">Cleaning up</li>'
                        );

                        // Slide in the final task and redirect after a delay
                        setTimeout(function() {
                            $('#finalTask').animate({
                                opacity: 1
                            }, 500);
                            setTimeout(function() {
                                window.location.href =
                                    "{{ route('dashboard') }}";
                            }, 3000);
                        }, 500);
                    }
                }, (index + 1) * 7000);
            });
        });
    </script>
@endsection
