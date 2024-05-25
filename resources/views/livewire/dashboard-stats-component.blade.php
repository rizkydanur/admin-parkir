<div class="container mt-5">
    <h2 class="main-title">Dashboard</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
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
        <div class="col-md-4 mb-4">
            <article class="stat-cards-item">
                <div class="stat-cards-icon purple">
                    <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $tempatParkirKosong }}</p>
                    <p class="stat-cards-info__title">Tempat Parkir Tersedia</p>
                </div>
            </article>
        </div>
        <div class="col-md-4 mb-4">
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
