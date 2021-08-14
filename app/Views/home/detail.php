<section class="after-head d-flex section-text-white position-relative">
  <div class="d-background" data-image-src="https://image.tmdb.org/t/p/original/<?= $data['detail']['poster_path']; ?>" data-parallax="scroll"></div>
  <div class="d-background bg-black-80"></div>
  <div class="top-block top-inner container">
    <div class="top-block-content">
      <h1 class="section-title">Detail Film</h1>
      <div class="page-breadcrumbs">
        <a class="content-link" href="/">Home</a>
        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
        <a class="content-link" href="#">Detail Film</a>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="sidebar-container">
    <div class="content">
      <section class="section-long">
        <div class="section-line">
          <div class="movie-info-entity">
            <div class="entity-poster" data-role="hover-wrap">
              <div class="embed-responsive embed-responsive-poster">
                <img class="embed-responsive-item" src="https://image.tmdb.org/t/p/original/<?= $data['detail']['poster_path']; ?>" alt="<?= $data['detail']['original_title']; ?>" />
              </div>
              <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                <div class="entity-play">
                  <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=<?= $data['video']; ?>" data-magnific-popup="iframe">
                    <span class="icon-content"><i class="fas fa-play"></i></span>
                  </a>
                </div>
              </div>
            </div>
            <div class="entity-content">
              <h2 class="entity-title"><?= $data['detail']['title']; ?></h2>
              <div class="entity-category">
                <?php foreach($data['detail']['genres'] as $g) : ?>
                  <a class="content-link" href="#"><?= $g['name']; ?></a>,
                <?php endforeach; ?>
              </div>
              <div class="entity-info">
                <div class="info-lines">
                  <div class="info info-short">
                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                    <span class="info-text"><?= $data['detail']['vote_average']; ?>/10</span>
                  </div>
                  <div class="info info-short">
                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                    <span class="info-text"><?= $data['detail']['runtime']; ?></span>
                    <span class="info-rest">&nbsp;menit</span>
                  </div>
                </div>
              </div>
              <ul class="entity-list">
                <li><span class="entity-list-title">Rilis:</span><?= date("d F Y", strtotime($data['detail']['release_date'])); ?></li>
                <li>
                  <span class="entity-list-title">Kru:</span>
                  <?php foreach($data['credit']['crew'] as $i => $c) : ?>
                    <a class="content-link" href="#"><?= $c['name']; ?></a>,
                    <?php 
                      if ($i > 4) {
                        echo '<a>...</a>';
                        break;
                      }
                    ?>
                  <?php endforeach; ?>
                </li>
                <li>
                  <span class="entity-list-title">Dibintangi:</span>
                  <?php foreach($data['credit']['cast'] as $i => $c) : ?>
                    <a class="content-link" href="#"><?= $c['name']; ?></a>,
                    <?php 
                      if ($i > 4) {
                        echo '<a>...</a>';
                        break;
                      }
                    ?>
                  <?php endforeach; ?>
                </li>
                <li>
                  <span class="entity-list-title">Perusahaan produksi:</span>
                  <?php foreach($data['detail']['production_companies'] as $pc) : ?>
                    <a class="content-link" href="#"><?= $pc['name']; ?></a>,
                  <?php endforeach; ?>
                </li>
                <li>
                  <span class="entity-list-title">Negara:</span>
                  <?php foreach($data['detail']['production_countries'] as $pc) : ?>
                    <a class="content-link" href="#"><?= $pc['name']; ?></a>,
                  <?php endforeach; ?>
                </li>
                <li>
                  <span class="entity-list-title">Bahasa:</span>
                  <?php foreach($data['detail']['spoken_languages'] as $sl) : ?>
                    <a class="content-link" href="#"><?= $sl['english_name']; ?></a>,
                  <?php endforeach; ?>
                </li>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="section-line">
          <div class="section-head">
            <h2 class="section-title text-uppercase">Sinopsis</h2>
          </div>
          <div class="section-description">
            <p class="lead">
              <?= $data['detail']['overview']; ?>
            </p>
          </div>
        </div>
        
        <?php if($data['review']) : ?>
          <div class="section-line">
            <div class="section-head">
              <h2 class="section-title text-uppercase">Ulasan</h2>
            </div>
            <?php foreach($data['review'] as $r) : ?>
              <div class="comment-entity">
                <div class="entity-inner">
                  <div class="entity-content">
                    <h4 class="entity-title"><a href="<?= $r['url']; ?>"><?= $r['author']; ?></a></h4>
                    <p class="entity-subtext"><?= $r['updated_at']; ?></p>
                    <p class="entity-text"><?= $r['content']; ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        <?php endif; ?>

        <div class="section-line">
          <div class="section-head">
            <h2 class="section-title text-uppercase">Rekomendasi</h2>
          </div>
          <div class="card-deck">
            <?php foreach($data['recommendation'] as $i => $r) : ?>
              <div class="card" style="width: 14rem;">
                <img src="https://image.tmdb.org/t/p/w500/<?= $r['poster_path']; ?>" class="card-img-top" alt="<?= $r['original_title']; ?>">
                <div class="card-body">
                  <h4 class="entity-title">
                    <a class="content-link" href="<?= BASEURL; ?>/home/detail/<?= $r['id']; ?>"><?= $r['title']; ?></a>
                  </h4> 
                </div>
                <div class="card-footer">
                  <div class="entity-info">
                    <div class="info-lines">
                      <div class="info info-short">
                        <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                        <span class="info-text"><?= round($r['vote_average'], 1); ?>/10</span>
                      </div>
                      <div class="info info-short">
                        <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                        <span class="info-text"> <?= date("d M Y", strtotime($r['release_date'])); ?></span>
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
              <?php 
                if ($i >= 8) {
                  break;
                }
              ?>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>