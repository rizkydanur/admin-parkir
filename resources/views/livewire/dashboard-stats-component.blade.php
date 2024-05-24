<div class="container">
    <h2 class="main-title">Dashboard</h2>
    <div class="row row-cols-2">
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon primary">
                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $tempatParkirTersedia }}</p>
                    <p class="stat-cards-info__title">Tempat Parkir Tersedia</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon warning">
                    <i data-feather="zap" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $tempatParkirTerisi }}</p>
                    <p class="stat-cards-info__title">Tempat Parkir Terisi</p>
                </div>
            </article>
        </div>
        <br>
    <br>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon purple">
                    <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $tempatParkirKosong }}</p>
                    <p class="stat-cards-info__title">Tempat Parkir Kosong</p>
                </div>
            </article>
        </div>
        <br>
    <br>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                    <i data-feather="arrow-up" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $mobilMasuk }}</p>
                    <p class="stat-cards-info__title">Mobil Masuk</p>
                </div>
            </article>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-4 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                    <i data-feather="arrow-up" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $mobilKeluar }}</p>
                    <p class="stat-cards-info__title">Mobil Keluar</p>
                </div>
            </article>
        </div>
    </div>
</div>
