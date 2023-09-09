<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Image Denoiser</title>
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column h-100">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5 justify-content-center">
            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">
                    Image Denoiser
                </span></h1>
        </div>
    </nav>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-xxl-5">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
                        <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                            <div
                                class="text-uppercase">Remove noise from image
                            </div>
                        </div>
                        <div class="fs-3 fw-light text-muted">1. Select image</div>
                        <div class="fs-3 fw-light text-muted">2. Choose filter type</div>
                        <div class="fs-3 fw-light text-muted">3. Set Kernel size</div>
                        <div class="fs-3 fw-light text-muted">4. Press "CONVERT"</div>
                    </div>
                </div>
                <div class="col-xxl-7">
                    <!-- Header profile picture-->
                    <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                        <div class="profile">
                            <section>
                                <!-- Skillset Card-->
                                <div class="card shadow border-0 rounded-4 mb-5">
                                    <div class="card-body p-5">
                                        <!-- Professional skills list-->
                                        <div class="mb-5">
                                            <form name="denoise_form"
                                                  enctype="multipart/form-data"
                                                  method="POST"
                                                  action="{{ route('denoise-image') }}">
                                                @csrf
                                                <div class="d-flex align-items-center mb-4">
                                                    <div
                                                        class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                                        <i class="bi bi-image"></i></div>
                                                    <h3 class="fw-bolder mb-0"><span
                                                            class="text-gradient d-inline">Select image</span></h3>
                                                </div>
                                                <div class="row row-cols-1 row-cols-md-3 mb-4">
                                                    <input type="file" name="image_file" class="form-control"/>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <div
                                                        class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                                        <i class="bi bi-filter"></i></div>
                                                    <h3 class="fw-bolder mb-0"><span
                                                            class="text-gradient d-inline">Choose filter</span></h3>
                                                </div>
                                                <div class="row row-cols-1 row-cols-md-3 mb-4">
                                                    <select name="filter_type" class="form-control">
                                                        <option>Mean filtering</option>
                                                        <option>Median filtering</option>
                                                        <option>Gaussian blur</option>
                                                        <option>Bilateral filtering</option>
                                                        <option>Wavelet transformation</option>
                                                    </select>
                                                </div>
                                                <div class="d-flex align-items-center mb-4">
                                                    <div
                                                        class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                                        <i class="bi bi-dot"></i></div>
                                                    <h3 class="fw-bolder mb-0"><span
                                                            class="text-gradient d-inline">Set Kernel size</span></h3>
                                                </div>
                                                <div class="row row-cols-1 row-cols-md-3 mb-4">
                                                    <input type="number" name="kernel" class="form-control" min="3"
                                                           max="99"
                                                           value="3">
                                                </div>
                                                <div class="row row-cols-1 row-cols-md-3 mb-4">
                                                    <input type="submit" class="form-control bg-primary
                                                bg-gradient-primary-to-secondary text-white rounded-3 pt-3 pb-3
                                                fs-3"
                                                           value="CONVERT">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>
<!-- Footer-->
<footer class="bg-white py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0">Copyright &copy; Image Denoiser 2023</div>
            </div>
            <div class="col-auto">
                <a class="small" href="#!">Privacy</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Terms</a>
                <span class="mx-1">&middot;</span>
                <a class="small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
