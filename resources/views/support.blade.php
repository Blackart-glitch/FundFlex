@extends('layouts.sidebar')
@section('sidebar.content')
    <style>
        .chat-history-btn {
            background-color: rgb(245, 233, 12);
            transition: transform 0.2s;
            /* Add a smooth transition */
        }

        .chat-history-btn:hover {
            transform: scale(1.1);
            /* Increase the size on hover */
        }
    </style>
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-3">
                <h3>Chat history</h3>

                <div class="mt-3">
                    <span class="btn d-flex gap-2 align-content-center p-3 mb-2 chat-history-btn"
                        style="background-color: rgb(245, 233, 12)">
                        <span class="material-symbols-outlined">
                            forward_to_inbox
                        </span>
                        12/06/23
                    </span>
                    <span class="btn d-flex gap-2 align-content-center p-3 mb-2 chat-history-btn"
                        style="background-color: rgb(245, 233, 12)">
                        <span class="material-symbols-outlined">
                            forward_to_inbox
                        </span>
                        12/06/23
                    </span>
                    <span class="btn d-flex gap-2 align-content-center p-3 mb-2 chat-history-btn"
                        style="background-color: rgb(245, 233, 12)">
                        <span class="material-symbols-outlined">
                            forward_to_inbox
                        </span>
                        12/06/23
                    </span>
                    <span class="btn d-flex gap-2 align-content-center p-3 mb-2 chat-history-btn"
                        style="background-color: rgb(245, 233, 12)">
                        <span class="material-symbols-outlined">
                            forward_to_inbox
                        </span>
                        12/06/23
                    </span>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="bg-info chat-box p-2">
                    <h3>Chat Box<span class="badge bg-success">online</span></h3>
                </div>
                <div class="row bg-white p-3">
                    <div class="col-lg-6">
                        <div class="alert alert-info" role="alert">
                            Hello, how may i help you?
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-warning" role="alert">
                            hi, i have a problem with my wallet
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-info" role="alert">
                            ok, what's the problem?
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="alert alert-warning" role="alert">
                            i can't seem to add funds to my wallet
                        </div>
                    </div>
                </div>
                {{-- buttons and input --}}
                <div class="container gap-2 d-flex align-content-center justify-content-center">

                    <input type="text" class="w-100 border border-2 border-info p-3"
                        placeholder="Type your message here">

                    <button class="btn btn-warning">
                        <span class="material-symbols-outlined">
                            send
                        </span>
                    </button>

                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="mt-3">
        Chats older than 6 months will be deleted. you can check our <a href="">privacy notice</a> to see how we <a
            href="#">handle your data.</a>
    </div>
@endsection
