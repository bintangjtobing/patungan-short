<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="https://patunganyuk.com/favicon.ico" type="image/x-ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Questrial", sans-serif;
        }

        .form-control {
            border-radius: 1rem;
            padding: 1rem;
        }

        .submitUrl {
            background-color: #0052FF;
            color: white;
            border: none;
            border-radius: 1.2rem;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>


    <title>PatunganYuk IDN Internal URL Shortener Tool</title>
    <meta name="description"
        content="An internal tool for PatunganYuk IDN to streamline and customize long URLs for internal communication, reporting, and operational efficiency. Secure and reliable URL shortening for internal use only.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="PatunganYuk IDN Internal URL Shortener Tool">
    <meta property="og:description"
        content="An internal tool for PatunganYuk IDN to streamline and customize long URLs for internal communication, reporting, and operational efficiency. Secure and reliable URL shortening for internal use only.">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PatunganYuk IDN Internal URL Shortener Tool">
    <meta name="twitter:description"
        content="An internal tool for PatunganYuk IDN to streamline and customize long URLs for internal communication, reporting, and operational efficiency. Secure and reliable URL shortening for internal use only.">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
            <!-- Logo PatunganYuk IDN -->
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="https://res.cloudinary.com/boxity-id/image/upload/q_65/v1720974567/4_ligzdg.png"
                    alt="PatunganYuk IDN Logo" class="img-fluid" style="width: 200px;">
            </a>

            <!-- Button "Need help?" -->
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-primary">Need help?</button>
            </div>
        </header>
    </div>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <!-- Success Alert with Short URL -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <br>
                        <strong>Your short URL is: </strong>
                        <a href="{{ session('short_url') }}" target="_blank">{{ session('short_url') }}</a>
                        <button class="btn btn-sm btn-secondary"
                            onclick="copyToClipboard('{{ session('short_url') }}')">Copy</button>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                    @endif
                    <script>
                        function copyToClipboard(text) {
                            var tempInput = document.createElement("input");
                            tempInput.style.position = "absolute";
                            tempInput.style.left = "-1000px";
                            tempInput.value = text;
                            document.body.appendChild(tempInput);
                            tempInput.select();
                            document.execCommand("copy");
                            document.body.removeChild(tempInput);
                            alert("Short URL copied to clipboard!");
                        }
                    </script>

                    <!-- Error Alert -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- Left Side -->
                    <div class="col-md-6">
                        <h1 class="text-primary">URL Shortener - Simplify and Customize Your Links</h1>
                        <p>Make your long URLs shorter and easier to share with our URL shortening tool. This tool
                            allows you to create custom, manageable short URLs, helping you streamline your links for
                            social media, emails, and other digital campaigns.</p>
                        <h3 class="text-primary">How to Create a Short URL Using this tool?</h3>
                        <p>Start by entering your name, and the long URL you wish to shorten.
                            Once the details are provided, click "Build UTM URL" to generate your customized short link.
                            While you can personalize the slug of your short link, the domain remains fixed to maintain
                            integrity and brand consistency.</p>

                    </div>
                    <!-- Right Side (Form) -->
                    <div class="col-md-6">

                        <form action="{{ route('shortlinks.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your name" name="name">
                            </div>
                            <div class="mb-3">
                                <input type="url" class="form-control" placeholder="URL Links that you want to shorten"
                                    id="url_links" name="url_links">
                            </div>
                            <button type="submit" class="btn submitUrl btn-primary w-100">Build UTM URL</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h2>History Data</h2>
                        <!-- Success Alert with updated Short URL -->
                        @if (session('successEdit'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('successEdit') }}
                            <br>
                            <strong>Your updated short URL is: </strong>
                            <a href=" {{ session('short_url') }}" target="_blank">{{ session('short_url') }}</a>
                            <button class="btn btn-sm btn-secondary"
                                onclick="copyToClipboard('{{ session('short_url') }}')">Copy</button>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                        @endif

                        <!-- Script for copying URL to clipboard -->
                        <script>
                            function copyToClipboard(text) {
                                var tempInput = document.createElement("input");
                                tempInput.style.position = "absolute";
                                tempInput.style.left = "-1000px";
                                tempInput.value = text;
                                document.body.appendChild(tempInput);
                                tempInput.select();
                                document.execCommand("copy");
                                document.body.removeChild(tempInput);
                                alert("Short URL copied to clipboard!");
                            }
                        </script>

                        <!-- Error Alert for validation failures -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="table-responsive-lg">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>JIRA Ticket</th>
                                        <th>Original URL</th>
                                        <th>Short URL</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shortLinks as $shortLink)
                                    <tr>
                                        <td><a
                                                href="https://emamarkets.atlassian.net/browse/{{ $shortLink->jira_ticket }}">{{
                                                $shortLink->jira_ticket }}</a> <br> {{ $shortLink->name }}</td>
                                        <td style="word-wrap: break-word;
    white-space: normal;
    max-width: 600px;">{{ $shortLink->url_links }}</td>
                                        <td><a href="{{ url($shortLink->short_link) }}" target="_blank">{{
                                                url($shortLink->short_link)
                                                }}</a></td>
                                        <td>
                                            <button class="btn btn-sm btn-secondary"
                                                onclick="copyToClipboard('{{ session('short_url') }}')">
                                                <i class="fas fa-copy"></i>
                                            </button>

                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $shortLink->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('shortlinks.destroy', $shortLink->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal untuk edit short URL -->
                                    <div class="modal fade" id="editModal{{ $shortLink->id }}" tabindex="-1"
                                        aria-labelledby="editModalLabel{{ $shortLink->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $shortLink->id }}">Edit
                                                        Short URL</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('shortlinks.update', $shortLink->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="short_link" class="form-label">Short URL</label>
                                                            <input type="text" class="form-control" name="short_link"
                                                                value="{{ $shortLink->short_link }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-dark py-4 mt-5">
        <div class="container">
            <div class="row justify-content-center align-items-center mt-3">
                <div class="col-md-10">
                    <?php $Y= date('Y')?>
                    <p class="mb-0">Copyright © {{ $Y }} PatunganYuk IDN</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>