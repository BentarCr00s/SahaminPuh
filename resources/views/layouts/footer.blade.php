<footer class="w-100 py-4 flex-shrink-0">
    <div class="container py-4">
        <div class="row gy-2 gx-0 justify-content-center">
            <div class="col-lg-4 col-md-6 text-center">
                <div class="d-flex flex-column align-items-center">
                    <x-application-logo type="horizontal" size="10em"/>
                    <h3 class="big text-muted">Take small steps towards something big.</h3>
                </div>
                <p class="small text-muted mb-0">
                    &copy; Copyrights. All rights reserved.
                    <a class="text-decoration-none text-success" href="{{ route('index') }}">
                        SahaminPuh
                    </a>
                </p>
            </div>
            <div class="col-lg-2 col-md-4 text-center">
                <h5 class="text-black mb-3">Informasi</h5>
                <ul class="list-unstyled text-muted">
                    <li>
                        <a class="text-decoration-none text-success" href="{{ route('tentang') }}">
                            Tentang
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
