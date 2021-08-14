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
                <div class="d-over bg-highlight-bottom">
                  <h4 class="entity-title">
                    <a class="content-link" href="<?= BASEURL; ?>/home/detail/<?= $np['id']; ?>"><?= $np['title']; ?></a>
                  </h4>
                  <div class="entity-info">
                    <div class="info-lines">
                      <div class="info info-short">
                        <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                        <span class="info-text"><?= $np['vote_average']; ?>/10</span>
                      </div>
                      <div class="info info-short">
                        <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                        <span class="info-text">
                          <?= date("d M Y", strtotime($np['release_date'])); ?>
                        </span>
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

    <div class="card-deck">
      <?php foreach($data['popular'] as $i => $p) : ?>
        <div class="card" style="width: 14rem;">
          <img src="https://image.tmdb.org/t/p/w500/<?= $p['poster_path']; ?>" class="card-img-top" alt="<?= $p['original_title']; ?>">
          <div class="card-body">
            <h4 class="entity-title">
              <a class="content-link" href="<?= BASEURL; ?>/home/detail/<?= $p['id']; ?>"><?= $p['title']; ?></a>
            </h4> 
          </div>
          <div class="card-footer">
            <div class="entity-info">
              <div class="info-lines">
                <div class="info info-short">
                  <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                  <span class="info-text"><?= $p['vote_average']; ?>/10</span>
                </div>
                <div class="info info-short">
                  <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                  <span class="info-text"> <?= date("d M Y", strtotime($p['release_date'])); ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; ?>
        <?php if($i % 4 == 0) : ?>
          </div>
          <div class="card-deck mt-4">
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>