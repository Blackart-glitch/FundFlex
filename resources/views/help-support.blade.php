<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Help Center</title>
</head>

<body>
    <div class="container main-page-container">
        <div class="row">
            <div class="col">
                <h1 class="hc_hero-module__exp-label text-center py-4">Help Center - Personal Account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="hc_hero-module__greeting--label text-center py-3">How can we help you?</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="hc_search-bar__container">
                    <form role="search">
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    width="1em" height="1em">
                                    <path fill-rule="evenodd"
                                        d="M15.052 16.46a7.5 7.5 0 1 1 1.413-1.415l3.243 3.243a1 1 0 1 1-1.414 1.414l-3.242-3.241zM16 10.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="searchInput"
                                placeholder="Search questions, keywords, or topics" autocomplete="off">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <ul class="list-group hc_topic-tree__list">
                    <li class="list-group-item hc_topic-tree-home--link active"><a href="/ng/cshelp/personal"
                            class="hc_topic-tree-item__link">Home</a></li>
                    <li class="list-group-item"><a href="/ng/cshelp/topic/help_payments_and_transfers_personal"
                            class="hc_topic-tree-item__link">Payments and Transfers</a></li>
                    <li class="list-group-item"><a href="/ng/cshelp/topic/help_disputes_and_limitations_personal"
                            class="hc_topic-tree-item__link">Disputes and Limitations</a></li>
                    <li class="list-group-item"><a href="/ng/cshelp/topic/help_account_personal"
                            class="hc_topic-tree-item__link">My Account</a></li>
                    <li class="list-group-item"><a href="/ng/cshelp/topic/help_wallet_personal"
                            class="hc_topic-tree-item__link">My Wallet</a></li>
                    <li class="list-group-item"><a href="/ng/cshelp/topic/help_login_and_security_personal"
                            class="hc_topic-tree-item__link">Login & Security</a></li>
                    <li class="list-group-item"><a href="/ng/cshelp/topic/help_seller_tools_personal"
                            class="hc_topic-tree-item__link">Seller Tools</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="list-group hc_recommended-solutions__list">
                    <a href="/ng/cshelp/article/how-do-i-issue-a-refund-help101"
                        class="list-group-item list-group-item-action">How do I issue a refund?</a>
                    <a href="/ng/cshelp/article/how-do-i-change-my-password-and-security-questions-help676"
                        class="list-group-item list-group-item-action">How do I change my password and security
                        questions?</a>
                    <a href="/ng/cshelp/article/how-do-i-escalate-a-paypal-dispute-to-a-claim-help367"
                        class="list-group-item list-group-item-action">How do I escalate a PayPal dispute to a
                        claim?</a>
                    <!-- Add more list items here -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="hc_login-prompt__container">
                    <div class="card hc_login-prompt__widget">
                        <div class="card-body text-center">
                            <p class="card-text">Get customized help with your account and access to the message center
                            </p>
                            <button class="btn btn-primary">Log in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Add more content here -->
            <div class="container px-4 py-5">
                <h2 class="pb-2 border-bottom">Features with title</h2>

                <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <h2 class="fw-bold text-body-emphasis">Left-aligned title explaining these awesome features</h2>
                        <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.
                            We'll add onto it with another sentence and probably just keep going until we run out of
                            words.</p>
                        <a href="#" class="btn btn-primary btn-lg">Primary button</a>
                    </div>

                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-2 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#collection"></use>
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#gear-fill"></use>
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#speedometer"></use>
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                                    <svg class="bi" width="1em" height="1em">
                                        <use xlink:href="#table"></use>
                                    </svg>
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
                                <p class="text-body-secondary">Paragraph of text beneath the heading to explain the
                                    heading.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Add more content here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
