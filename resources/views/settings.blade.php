@extends('layouts.app')
<!-- Your content for settings here -->
@section('content')
    <main>
        <!-- Nav tabs -->
        <ul class="nav nav-pills container justify-content-center container-fluid gap-3 p-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary" id="account-tab" data-bs-toggle="tab" data-bs-target="#account"
                    type="button" role="tab" aria-controls="account" aria-selected="true">Account</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary active" id="security-tab" data-bs-toggle="tab"
                    data-bs-target="#security" type="button" role="tab" aria-controls="security"
                    aria-selected="false">Security</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary" id="data-privacy-tab" data-bs-toggle="tab"
                    data-bs-target="#data-privacy" type="button" role="tab" aria-controls="data-privacy"
                    aria-selected="false">Data & Privacy</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments"
                    type="button" role="tab" aria-controls="payments" aria-selected="false">Payments</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary" id="notifications-tab" data-bs-toggle="tab"
                    data-bs-target="#notifications" type="button" role="tab" aria-controls="notifications"
                    aria-selected="false">Notifications</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary" id="seller-tools-tab" data-bs-toggle="tab"
                    data-bs-target="#seller-tools" type="button" role="tab" aria-controls="seller-tools"
                    aria-selected="false">Seller Tools</button>
            </li>
        </ul>




        <!-- Tab panes -->
        <div class="tab-content justify-content-center">
            <!-- Account Tab Content -->
            <div class="tab-pane" id="account" role="tabpanel" aria-labelledby="account-tab">
                <div class="container">
                    <div class="row m-3 text-center">
                        {{-- right nav --}}
                        <div class="col-6 themed-grid-col">
                            {{-- profile card bootstrap --}}
                            <div class="card bg-dark">
                                <img class="card-img-top opacity-50" src="{{ asset('user_image.jpg') }}" alt="Title">
                                <span class="material-symbols-outlined btn btn-outline-warning w-25 container">
                                    add_a_photo
                                </span>
                                <div class="card-body bg-warning">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                            {{-- account options card --}}
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h4 class="card-title">Account Settings</h4>
                                    <p class="card-text">Text</p>
                                    <div class="accordion" id="languageandtimezone">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="languageTimezoneHeading">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#languageTimezoneCollapse" aria-expanded="true"
                                                    aria-controls="languageTimezoneCollapse">
                                                    Language and Timezone Settings
                                                </button>
                                            </h2>
                                            <div id="languageTimezoneCollapse" class="accordion-collapse collapse show"
                                                aria-labelledby="languageTimezoneHeading"
                                                data-bs-parent="#languageandtimezone">
                                                <div class="accordion-body">
                                                    <!-- Language Dropdown -->
                                                    <div class="mb-3">
                                                        <label for="languageDropdown" class="form-label">Select
                                                            Language:</label>
                                                        <select class="form-select" id="languageDropdown">
                                                            <option value="en_US">English</option>
                                                            <option value="es_ES">Spanish</option>
                                                            <!-- Add more language options here -->
                                                        </select>
                                                    </div>

                                                    <!-- Timezone Dropdown -->
                                                    <div class="mb-3">
                                                        <label for="timezoneDropdown" class="form-label">Select
                                                            Timezone:</label>
                                                        <select class="form-select" id="timezoneDropdown">
                                                            <option value="America/New_York">(GMT-05:00) Eastern Time
                                                            </option>
                                                            <option value="America/Los_Angeles">(GMT-08:00) Pacific Time
                                                            </option>
                                                            <!-- Add more timezone options here -->
                                                        </select>
                                                    </div>

                                                    <!-- Additional content within the accordion body -->
                                                    <p>This is the language and timezone settings.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="profileInfoHeading">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#profileInfoCollapse" aria-expanded="true"
                                                    aria-controls="profileInfoCollapse">
                                                    Profile Information
                                                </button>
                                            </h2>
                                            <div id="profileInfoCollapse" class="accordion-collapse collapse"
                                                aria-labelledby="profileInfoHeading"
                                                data-bs-parent="#languageandtimezone">
                                                <div class="accordion-body">
                                                    <!-- Nationality -->
                                                    <div class="mb-3">
                                                        <label for="nationality" class="form-label">Nationality:</label>
                                                        <p id="nationality" class="bg-info p-2 rounded">Nigerian</p>
                                                    </div>

                                                    <!-- Merchant ID -->
                                                    <div class="mb-3">
                                                        <label for="merchantId" class="form-label">Merchant ID:</label>
                                                        <p id="merchantId" class="bg-info p-2 rounded">
                                                            5444444476cvcbjsieufci c</p>
                                                    </div>

                                                    <!-- Additional content within the accordion body -->
                                                    <p><button class="btn btn-warning">Add passport</button></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>

                        </div>
                        {{-- left nav --}}
                        <div class="col-6 themed-grid-col">
                            <div class="card pt-3">
                                <div class="row">
                                    <span class="col-6 align-self-start">
                                        <h3>Email</h3>
                                    </span>
                                    <span class="col-6 align-self-end">

                                        <button class="btn btn-outline-warning">
                                            <span class="material-symbols-outlined">
                                                add_circle
                                            </span>
                                            Add
                                        </button>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <h5>danielajiboye1@gmail.com <span class="badge bg-success">primary</span></h5>
                                </div>
                                <div class="card-footer">
                                    <h6>To update an email address, you must have at least two email addresses on file.</h6>
                                </div>
                            </div>
                            <div class="card mt-3  pt-3">
                                <div class="row">
                                    <span class="col-6 align-self-start">
                                        <h3>Phone number</h3>
                                    </span>
                                    <span class="col-6 align-self-end">

                                        <button class="btn btn-outline-warning">
                                            <span class="material-symbols-outlined">
                                                add_circle
                                            </span>
                                            update
                                        </button>
                                    </span>
                                </div>
                                <div class="card-body justify-items-start">
                                    <div class="row">
                                        <h5 class="col align-self-start">mobile <span
                                                class="badge bg-success">primary</span></h5>
                                        <div class="col align-self-end">
                                            090****43
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <h5 class="col align-self-start">mobile <span
                                                class="badge bg-secondary">secondary</span></h5>
                                        <div class="col align-self-end">
                                            090****43
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card mt-3  pt-3">
                                <div class="row">
                                    <span class="col-6 align-self-start">
                                        <h3>Address</h3>
                                    </span>
                                    <span class="col-6 align-self-end">

                                        <button class="btn btn-outline-warning">
                                            <span class="material-symbols-outlined">
                                                add_circle
                                            </span>
                                            update
                                        </button>
                                    </span>
                                </div>
                                <div class="card-body justify-items-start">
                                    <div class="row">
                                        <h5 class="col align-self-start">home <span
                                                class="badge bg-success">primary</span></h5>
                                        <div class="col align-self-end">
                                            {{-- random address --}}
                                            16 Jacob Salonga St
                                            Lagos
                                            LAGOS STATE 103101
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="align-items-center p-4 rounded m-3 btn btn-outline-danger">
                                <span class="material-symbols-outlined d-inline-block">
                                    lock
                                </span>
                                <span>Close your account</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Security Tab Content -->
            <div class="tab-pane active" id="security" role="tabpanel" aria-labelledby="security-tab">
                <div class="container mt-3 text-center">
                    <img src="{{ asset('user_image.jpg') }}" class="img-fluid rounded-4" height="100" width="100">
                    <div class="fw-bold">
                        <h3>Security</h3>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row justify-content-center align-items-center w-75">
                        <!-- Two-factor authentication -->
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                security
                            </span>
                        </div>
                        <div class="col-8">
                            <h4>
                                Two-factor authentication
                            </h4>
                            <p>Two-factor authentication adds an extra layer of security to your account by requiring more
                                than just a password to log in.</p>
                        </div>
                        <div class="col-3 align-content-center">
                            <button class="btn btn-outline-warning">
                                <span class="material-symbols-outlined">
                                    add_circle
                                </span>
                                Add
                            </button>
                        </div>
                        <!-- Security Questions -->
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                question_answer
                            </span>
                        </div>
                        <div class="col-8">
                            <h4>
                                Security Questions
                            </h4>
                            <p>Add security questions to enhance your account's security.</p>
                        </div>
                        <div class="col-3 align-content-center">
                            <button class="btn btn-outline-warning">
                                <span class="material-symbols-outlined">
                                    add_circle
                                </span>
                                Add
                            </button>
                        </div>
                        <!-- Auto Login -->
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                autorenew
                            </span>
                        </div>
                        <div class="col-8">
                            <h4>
                                Auto Login
                            </h4>
                            <p>Enable or disable auto-login for your account.</p>
                        </div>
                        <div class="col-3 align-content-center">
                            <button class="btn btn-outline-warning">
                                <span class="material-symbols-outlined">
                                    add_circle
                                </span>
                                Enable
                            </button>
                        </div>
                        <!-- Passkeys -->
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                vpn_key
                            </span>
                        </div>
                        <div class="col-8">
                            <h4>
                                Passkeys
                            </h4>
                            <p>Add passkeys for additional account security.</p>
                        </div>
                        <div class="col-3 align-content-center">
                            <button class="btn btn-outline-warning">
                                <span class="material-symbols-outlined">
                                    add_circle
                                </span>
                                Add
                            </button>
                        </div>
                        <!-- Password -->
                        <div class="col-1">
                            <span class="material-symbols-outlined">
                                lock
                            </span>
                        </div>
                        <div class="col-8">
                            <h4>
                                Password
                            </h4>
                            <p>Change your account password for added security.</p>
                        </div>
                        <div class="col-3 align-content-center">
                            <button class="btn btn-outline-warning">
                                <span class="material-symbols-outlined">
                                    edit
                                </span>
                                Change
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data & Privacy Tab Content -->
            <div class="tab-pane" id="data-privacy" role="tabpanel" aria-labelledby="data-privacy-tab">
                <div class="accordion container" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Permissions
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="material-symbols-outlined">
                                            lock
                                        </span>
                                    </div>
                                    <div class="col-10">
                                        <h4>
                                            Permissions
                                        </h4>
                                        <p>Manage the permissions you've granted to third-party applications and services
                                            that you've used your account to log into.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseTwo">
                                Cookies Data
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="material-symbols-outlined">
                                            lock
                                        </span>
                                    </div>
                                    <div class="col-10">
                                        <h4>
                                            Cookies
                                        </h4>
                                        <p>Control how we use cookies and manage your browsing experience.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseThree">
                                Data Download
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="material-symbols-outlined">
                                            lock
                                        </span>
                                    </div>
                                    <div class="col-10">
                                        <h4>
                                            Data Download
                                        </h4>
                                        <p>Download a copy of your account data.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseFour">
                                Blocked Content
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingFour">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="material-symbols-outlined">
                                            lock
                                        </span>
                                    </div>
                                    <div class="col-10">
                                        <h4>
                                            Blocked contact
                                        </h4>
                                        <p>Review and edit the people you previously blocked.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                aria-controls="panelsStayOpen-collapseFive">
                                Privacy
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingFive">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-2">
                                        <span class="material-symbols-outlined">
                                            lock
                                        </span>
                                    </div>
                                    <div class="col-10">
                                        <h4>
                                            Privacy
                                        </h4>
                                        <p>Control how we use your personal information.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payments Tab Content -->
                <div class="tab-pane" id="payments" role="tabpanel" aria-labelledby="payments-tab">

                    <div class="text-center"> <!-- Center the "Payments" header -->
                        <img src="https://www.paypalobjects.com/paypal-ui/pictograms/blue/svg/accept-cards-blue.svg"
                            alt="accept-cards">
                    </div>
                    <div class="text-center">Payments</div>
                    <div>Manage your automatic payments, choose a preferred way to pay, earn rewards, and do more.
                    </div>
                    <section>
                        <div>Online purchases</div>
                        <button id="banks">
                            <div>
                                <div>
                                    <span></span>
                                    <div>
                                        <div>Choose a funding source at checkout</div>
                                        <a id="banks" href="/">Select</a>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </section>
                    <section>
                        <div>Automatic payments</div>
                        <button id="autopay">
                            <div>
                                <div>
                                    <span></span>
                                    <div>
                                        <div>Automatic payments</div>
                                        <div>View and update all your subscriptions and automatic payments.</div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </section>


                </div>

                <!-- Notifications Tab Content -->
                <div class="tab-pane" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                    <!-- Content for the Notifications Tab -->
                </div>

                <!-- Seller Tools Tab Content -->
                <div class="tab-pane" id="seller-tools" role="tabpanel" aria-labelledby="seller-tools-tab">
                    <!-- Content for the Seller Tools Tab -->
                </div>
            </div>

    </main>
@endsection
