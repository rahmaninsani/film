<section class="section-text-white position-relative">
  <div class="d-background" data-image-src="<?= BASEURL; ?>/assets/images/posters.jpg" data-parallax="scroll"></div>
  <div class="d-background bg-theme-blacked"></div>
  <div class="mt-auto container position-relative">
    <div class="top-block-head text-uppercase">
      <h2 class="display-4">
        Sedang
        <span class="text-theme">Tayang</span>
      </h2>
    </div>
    <div class="top-block-footer">
      <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
        <div class="slick-slides">
          <?php foreach($data['nowPlaying'] as $np) : ?>
            <div class="slick-slide">
              <article class="poster-entity" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                  <img class="embed-responsive-item" src="https://image.tmdb.org/t/p/w500/<?= $np['poster_path']; ?>" alt="<?= $np['original_title']; ?>" />
                </div>
                <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                <div class="d-over bg-highlight-bottom">
                  <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                    <a class="action-icon-theme action-icon-bordered rounded-circle" href="" data-magnific-popup="iframe">
                      <span class="icon-content"><i class="fas fa-play"></i></span>
                    </a>
                  </div>
                  <h4 class="entity-title">
                    <a class="content-link" href="movie-info-sidebar-right.html"><?= $np['title']; ?></a>
                  </h4>
                  <div class="entity-category">
                    <a class="content-link" href="movies-blocks.html">crime</a>,
                    <a class="content-link" href="movies-blocks.html">comedy</a>
                  </div>
                  <div class="entity-info">
                    <div class="info-lines">
                      <div class="info info-short">
                        <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                        <span class="info-text"><?= $np['vote_average']; ?></span>
                        <span class="info-rest">/ 10</span>
                      </div>
                      <div class="info info-short">
                        <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                        <span class="info-text"><?= $np['release_date']; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="slick-arrows">
          <div class="slick-arrow-prev">
            <span class="th-dots th-arrow-left th-dots-animated">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
          <div class="slick-arrow-next">
            <span class="th-dots th-arrow-right th-dots-animated">
              <span></span>
              <span></span>
              <span></span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-long">
  <div class="container">
    <div class="section-head">
      <h2 class="section-title text-uppercase">Film Populer</h2>
    </div>
    <?php foreach($data['popular'] as $p) : ?>
      <article class="movie-line-entity">
        <div class="entity-poster" data-role="hover-wrap">
          <div class="embed-responsive embed-responsive-poster">
            <img class="embed-responsive-item" src="https://image.tmdb.org/t/p/w500/<?= $p['poster_path']; ?>" alt="<?= $p['original_title']; ?>" />
          </div>
          <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
            <div class="entity-play">
              <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                <span class="icon-content"><i class="fas fa-play"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div class="entity-content">
          <h4 class="entity-title">
            <a class="content-link" href="movie-info-sidebar-right.html"><?= $p['title']; ?></a>
          </h4>
          <div class="entity-category">
            <a class="content-link" href="movies-blocks.html">crime</a>,
            <a class="content-link" href="movies-blocks.html">comedy</a>
          </div>
          <div class="entity-info">
            <div class="info-lines">
              <div class="info info-short">
                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                <span class="info-text"><?= $p['vote_average']; ?></span>
                <span class="info-rest">/ 10</span>
              </div>
              <div class="info info-short">
                <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                <span class="info-text"><?= $p['release_date']; ?></span>
              </div>
            </div>
          </div>
          <p class="text-short entity-text">
          <?= $p['overview']; ?>
          </p>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>