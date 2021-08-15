<section class="section-long">
  <div class="container">
    <div class="section-head">
      <h2 class="section-title text-uppercase">Hasil Pencarian</h2>
    </div>

    <div class="card-deck">
      <?php foreach($data['results'] as $i => $result) : ?>
        <?php 
          if(in_array(null, $result, true)) {
            continue;
          }
        ?>
        <div class="card" style="width: 14rem">
          <img src="https://image.tmdb.org/t/p/w500/<?= $result['poster_path']; ?>" class="card-img-top" alt="<?= $result['original_title']; ?>" />
          <div class="card-body">
            <h4 class="entity-title">
              <a class="content-link" href="<?= BASEURL; ?>/home/detail/<?= $result['id']; ?>"><?= $result['title']; ?></a>
            </h4>
          </div>
          <div class="card-footer">
            <div class="entity-info">
              <div class="info-lines">
                <div class="info info-short">
                  <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                  <span class="info-text"><?= $result['vote_average']; ?>/10</span>
                </div>
                <div class="info info-short">
                  <span class="text-theme info-icon"><i class="fas fa-calendar"></i></span>
                  <span class="info-text"> <?= date("d M Y", strtotime($result['release_date'])); ?></span>
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
