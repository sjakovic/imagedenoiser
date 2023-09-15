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
<body class="d-flex flex-column min-vh-100">
<main style="height: auto;">
    <div class="container px-5 pb-5">
        @isset($showPreview)
            <div class="row gx-5 pt-3 align-items-center">
                <section>
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <table class="table table-striped">
                                        <tr class="bg-gradient-primary-to-secondary text-center">
                                            <th class="text-white">FILTER TYPE</th>
                                            <th class="text-white">KERNEL SIZE</th>
                                        </tr>
                                        <tr class="text-center">
                                            <td>{{ $filterType }}</td>
                                            <td>{{ $kernel }}x{{ $kernel }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                        <div class="text-uppercase">Before</div>
                                    </div>
                                    <div>
                                        <img src="{{ $originalImage }}" width="450" height="auto"/>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                        <div class="text-uppercase">After</div>
                                    </div>
                                    <div>
                                        <img src="{{ $denoisedImage }}" width="450" height="auto"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endif
        <div class="row gx-5 align-items-center">
            <div class="col-md-5 text-center">
                <h1 class="display-5 fw-bolder">
                    <span class="text-gradient d-inline">Image Denoiser</span>
                </h1>
                <!-- Header text content-->
                <div class="text-center text-xxl-start pt-5">
                    <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                        <div class="text-uppercase">Remove noise from image</div>
                    </div>
                    <div class="fs-4 fw-light text-muted">
                        Welcome to imagedenoiser.com - Your Go-To Solution for Crystal Clear Images! Remove unwanted noise and enhance image quality with our advanced denoising tools. Achieve stunning, professional-grade results in just a few clicks!
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="d-flex justify-content-center mt-xxl-0">
                    <div class="profile">
                        <section>
                            <!-- Skillset Card-->
                            <div class="card shadow border-0 rounded-4">
                                <div class="card-body p-5">
                                    <!-- Professional skills list-->
                                    <div>
                                        @if($errors->any())
                                            <div class="alert alert-danger align-items-center">
                                                @foreach($errors->all() as $error)
                                                    <div>{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        @endif
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
                                                <select name="filter_type" class="form-select">
                                                    @foreach($filters as $value => $name)
                                                        <option value="{{ $value }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center mb-4">
                                                <div
                                                    class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3">
                                                    <i class="bi bi-dot"></i></div>
                                                <h3 class="fw-bolder mb-0"><span
                                                        class="text-gradient d-inline">Smoothing Level</span></h3>
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
</main>
<!-- Footer-->
<footer class="py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-ite flex-sm-row">
            <div class="col-auto">
                <span class="small">Copyright &copy; Image Denoiser 2023</span>
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
