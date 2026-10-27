<?php
    $stat_years = !empty($optsetting['stat_years']) ? $optsetting['stat_years'] : '10+ Năm';
    $stat_years_label = !empty($optsetting['stat_years_label']) ? $optsetting['stat_years_label'] : 'Kinh nghiệm chuyên sâu ngành Panel';
    $stat_projects = !empty($optsetting['stat_projects']) ? $optsetting['stat_projects'] : '650+';
    $stat_projects_label = !empty($optsetting['stat_projects_label']) ? $optsetting['stat_projects_label'] : 'Dự án nhà xưởng & kho lạnh bàn giao';
    $stat_quality = !empty($optsetting['stat_quality']) ? $optsetting['stat_quality'] : '100%';
    $stat_quality_label = !empty($optsetting['stat_quality_label']) ? $optsetting['stat_quality_label'] : 'Đạt kiểm định cách nhiệt & PCCC';
    $stat_team = !empty($optsetting['stat_team']) ? $optsetting['stat_team'] : '60+';
    $stat_team_label = !empty($optsetting['stat_team_label']) ? $optsetting['stat_team_label'] : 'Kỹ sư & đội thợ thi công chuyên nghiệp';

    // Parse options for About Us
    $about_opt = !empty($gioithieu['options']) ? json_decode($gioithieu['options'], true) : [];
    $about_features = $about_opt['features'] ?? [
        ['title' => 'Chống Nóng & Cách Âm', 'desc' => 'Hệ số dẫn nhiệt cực thấp, giảm 65% nhiệt lượng môi trường.'],
        ['title' => 'Chống Cháy Lan Đạt Chuẩn', 'desc' => 'Panel Rockwool đạt cấp chống cháy EI60 - EI120 chuẩn PCCC.'],
        ['title' => 'Thi Công Siêu Nhanh', 'desc' => 'Lắp ghép dạng module ngàm Z-lock, rút ngắn 2/3 thời gian thi công.'],
        ['title' => 'Thân Thiện Môi Trường', 'desc' => 'Dễ dàng tháo dỡ, mở rộng quy mô, tái sử dụng đến 95% vật liệu.']
    ];
    $badge_title = $about_opt['badge_title'] ?? 'Sáng Tạo EcoPanel';
    $badge_desc = $about_opt['badge_desc'] ?? 'Cam kết chất lượng - Tiến độ chuẩn xác - Giá thành gốc tại xưởng sản xuất.';
    $founder_name = $about_opt['founder_name'] ?? 'Nguyễn Thanh Tuyền';
    $founder_title = $about_opt['founder_title'] ?? 'Đại Diện Điều Hành & Quản Lý Kỹ Thuật';
?>

<!-- Slide Banner & Stats -->
<section class="hero-slider-section" id="trang-chu" aria-label="Banner nổi bật và năng lực">
  <div class="hero-slider-container">
    <?php if (!empty($slider) && count($slider) > 0) { ?>
      <?php foreach ($slider as $k => $v) { 
          $s_opt = !empty($v['options']) ? json_decode($v['options'], true) : [];
          $s_tag = $s_opt['tag'] ?? 'Giải Pháp Xanh - Tiết Kiệm Năng Lượng';
          $s_icon = $s_opt['icon'] ?? 'fa-solid fa-leaf';
          $s_img = (!empty($v['photo']) && file_exists(UPLOAD_PHOTO_L . $v['photo'])) 
                    ? UPLOAD_PHOTO_L . $v['photo'] 
                    : (file_exists('assets/images/' . $v['photo']) ? 'assets/images/' . $v['photo'] : 'assets/images/slider-1.jpg');
      ?>
        <div class="slide <?= ($k == 0) ? 'active' : '' ?>">
          <div class="slide-bg" style="background-image: url('<?= $s_img ?>');"></div>
          <div class="slide-overlay"></div>
          <div class="container slide-content-wrap">
            <div class="slide-content">
              <div class="slide-tag">
                <i class="<?= $s_icon ?>" aria-hidden="true"></i> <?= $s_tag ?>
              </div>
              <?php if ($k == 0) { ?>
                <h1 class="slide-title"><?= htmlspecialchars_decode($v['ten' . $lang]) ?></h1>
              <?php } else { ?>
                <div class="slide-title"><?= htmlspecialchars_decode($v['ten' . $lang]) ?></div>
              <?php } ?>
              <p class="slide-desc"><?= htmlspecialchars_decode($v['mota' . $lang]) ?></p>
              <div class="slide-btns">
                <button type="button" class="btn btn-primary btn-lg open-quote-modal">
                  <i class="fa-solid fa-phone" aria-hidden="true"></i> Nhận Báo Giá Trực Tiếp
                </button>
                <a href="<?= !empty($v['link']) ? $v['link'] : '#du-an' ?>" class="btn btn-outline-white btn-lg">
                  <i class="fa-solid fa-building-circle-check" aria-hidden="true"></i> Xem Dự Án Mẫu
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } else { ?>
      <!-- Fallback Default Slide -->
      <div class="slide active">
        <div class="slide-bg" style="background-image: url('assets/images/slider-1.jpg');"></div>
        <div class="slide-overlay"></div>
        <div class="container slide-content-wrap">
          <div class="slide-content">
            <div class="slide-tag"><i class="fa-solid fa-leaf"></i> Giải Pháp Xanh - Tiết Kiệm Năng Lượng</div>
            <h1 class="slide-title">Thiết Kế &amp; Thi Công <span>Nhà Lắp Ghép</span> - Nhà Xưởng Panel Hiện Đại</h1>
            <p class="slide-desc">Sáng Tạo EcoPanel - Nguyễn Thanh Tuyền mang đến giải pháp thi công panel cách nhiệt, chống nóng, chống cháy toàn diện.</p>
            <div class="slide-btns">
              <button type="button" class="btn btn-primary btn-lg open-quote-modal"><i class="fa-solid fa-phone"></i> Nhận Báo Giá Trực Tiếp</button>
              <a href="#du-an" class="btn btn-outline-white btn-lg"><i class="fa-solid fa-building-circle-check"></i> Xem Dự Án Mẫu</a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- Slider Controls -->
    <button class="slider-arrow slider-prev" aria-label="Slide trước"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
    <button class="slider-arrow slider-next" aria-label="Slide sau"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>

    <div class="slider-dots" role="tablist" aria-label="Chuyển slide">
      <?php for ($i = 0; $i < max(count($slider), 1); $i++) { ?>
        <div class="slider-dot <?= ($i == 0) ? 'active' : '' ?>" role="tab" aria-selected="<?= ($i == 0) ? 'true' : 'false' ?>" aria-label="Slide <?= ($i + 1) ?>"></div>
      <?php } ?>
    </div>
  </div>

  <!-- Stats Bar -->
  <aside class="hero-stats-bar" aria-label="Thống kê số liệu năng lực">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-icon"><i class="fa-solid fa-award" aria-hidden="true"></i></div>
          <div class="stat-info">
            <div class="stat-number"><?= $stat_years ?></div>
            <div class="stat-label"><?= $stat_years_label ?></div>
          </div>
        </div>
        <div class="stat-item">
          <div class="stat-icon"><i class="fa-solid fa-city" aria-hidden="true"></i></div>
          <div class="stat-info">
            <div class="stat-number"><?= $stat_projects ?></div>
            <div class="stat-label"><?= $stat_projects_label ?></div>
          </div>
        </div>
        <div class="stat-item">
          <div class="stat-icon"><i class="fa-solid fa-square-check" aria-hidden="true"></i></div>
          <div class="stat-info">
            <div class="stat-number"><?= $stat_quality ?></div>
            <div class="stat-label"><?= $stat_quality_label ?></div>
          </div>
        </div>
        <div class="stat-item">
          <div class="stat-icon"><i class="fa-solid fa-users-gear" aria-hidden="true"></i></div>
          <div class="stat-info">
            <div class="stat-number"><?= $stat_team ?></div>
            <div class="stat-label"><?= $stat_team_label ?></div>
          </div>
        </div>
      </div>
    </div>
  </aside>
</section>

<!-- Giới thiệu -->
<section class="section section-bg-white" id="gioi-thieu" aria-labelledby="about-heading">
  <div class="container">
    <div class="about-grid">
      <!-- Cột hình ảnh năng lực -->
      <figure class="about-images-wrapper">
        <?php
          $about_img = (!empty($gioithieu['photo']) && file_exists(UPLOAD_STATIC_L . $gioithieu['photo']))
              ? UPLOAD_STATIC_L . $gioithieu['photo']
              : (file_exists('assets/images/about-factory.jpg') ? 'assets/images/about-factory.jpg' : 'assets/images/noimage.png');
        ?>
        <img src="<?= $about_img ?>" alt="Nhà máy và quy trình thi công Sáng Tạo EcoPanel - Nguyễn Thanh Tuyền" class="about-main-img" onerror="this.src='assets/images/noimage.png';">
        <figcaption class="about-sub-badge">
          <div class="badge-icon"><i class="fa-solid fa-shield-heart" aria-hidden="true"></i></div>
          <h4><?= $badge_title ?></h4>
          <p><?= $badge_desc ?></p>
        </figcaption>
      </figure>

      <!-- Cột nội dung giới thiệu -->
      <article class="about-content">
        <div class="section-badge">
          <i class="fa-solid fa-circle-info" aria-hidden="true"></i> Về chúng tôi
        </div>
        <h2 class="section-title" id="about-heading">
          <?= !empty($gioithieu['ten' . $lang]) ? htmlspecialchars_decode($gioithieu['ten' . $lang]) : 'Đối Tác Tin Cậy Về <span>Nhà Lắp Ghép &amp; Panel</span> Hàng Đầu' ?>
        </h2>
        <div class="about-lead">
          <?= !empty($gioithieu['mota' . $lang]) ? htmlspecialchars_decode($gioithieu['mota' . $lang]) : '<strong>Sáng Tạo EcoPanel (Nguyễn Thanh Tuyền)</strong> tự hào là thương hiệu tiên phong chuyên sản xuất, phân phối tấm panel cách nhiệt và tổng thầu thi công nhà lắp ghép, nhà xưởng, kho lạnh uy tín tại miền Nam và toàn quốc.' ?>
        </div>
        <div class="about-desc">
          <?= !empty($gioithieu['noidung' . $lang]) ? htmlspecialchars_decode($gioithieu['noidung' . $lang]) : 'Với dây chuyền sản xuất đồng bộ công nghệ hiện đại cùng đội ngũ kỹ sư nhiệt huyết, chúng tôi cam kết mang tới những giải pháp kiến trúc xanh, tiết kiệm năng lượng điện, rút ngắn tối đa thời gian xây dựng và tối ưu ngân sách cho các chủ đầu tư.' ?>
        </div>

        <ul class="about-features-list">
          <?php foreach ($about_features as $af) { ?>
            <li class="about-feature-item">
              <div class="about-feature-icon"><i class="fa-solid fa-check" aria-hidden="true"></i></div>
              <div>
                <h5><?= $af['title'] ?></h5>
                <p><?= $af['desc'] ?></p>
              </div>
            </li>
          <?php } ?>
        </ul>

        <div class="about-actions">
          <button type="button" class="btn btn-primary open-quote-modal">
            <i class="fa-solid fa-handshake" aria-hidden="true"></i> Nhận Hồ Sơ Năng Lực
          </button>
          <div class="about-founder">
            <div class="founder-info">
              <h5><?= $founder_name ?></h5>
              <span><?= $founder_title ?></span>
            </div>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- Sản phẩm -->
<section class="section section-bg-subtle" id="panel" aria-labelledby="panel-heading">
  <div class="container">
    <header class="section-header">
      <div class="section-badge">
        <i class="fa-solid fa-layer-group" aria-hidden="true"></i> Sản phẩm chính hãng
      </div>
      <h2 class="section-title" id="panel-heading">
        Hệ Thống <span>Tấm Panel Cách Nhiệt</span> Đạt Chuẩn
      </h2>
      <p class="section-desc">
        Đa dạng các chủng loại tấm Panel lõi xốp EPS, PU/PIR, Bông khoáng Rockwool, Bông thủy tinh và phụ kiện nhôm định hình cao cấp phục vụ mọi quy mô công trình.
      </p>
    </header>

    <!-- Filter Tabs -->
    <nav class="filter-tabs-wrapper" aria-label="Bộ lọc phân loại panel">
      <button class="tab-btn active" data-filter="all">Tất cả sản phẩm</button>
      <?php if (!empty($danhmuc_list)) { foreach ($danhmuc_list as $dm) { ?>
        <button class="tab-btn" data-filter="<?= $dm['tenkhongdauvi'] ?>"><?= $dm['ten' . $lang] ?></button>
      <?php } } ?>
    </nav>

    <!-- Product Cards Grid -->
    <div class="products-grid">
      <?php if (!empty($sanpham)) { foreach ($sanpham as $sp) {
          $p_opt = !empty($sp['options']) ? json_decode($sp['options'], true) : [];
          $p_cat = $p_opt['cat_slug'] ?? 'cach-nhiet';
          $p_badge = $p_opt['badge'] ?? 'Bán chạy nhất';
          $p_badge_cls = $p_opt['badge_class'] ?? '';
          $p_specs = $p_opt['specs'] ?? [];
          $p_img = (!empty($sp['photo']) && file_exists(UPLOAD_PRODUCT_L . $sp['photo']))
                    ? UPLOAD_PRODUCT_L . $sp['photo']
                    : (file_exists('assets/images/' . $sp['photo']) ? 'assets/images/' . $sp['photo'] : 'assets/images/noimage.png');
      ?>
        <article class="product-card" data-category="<?= $p_cat ?>">
          <figure class="product-img-wrap">
            <?php if (!empty($p_badge)) { ?>
              <span class="product-badge <?= $p_badge_cls ?>"><?= $p_badge ?></span>
            <?php } ?>
            <img src="<?= $p_img ?>" alt="<?= $sp['ten' . $lang] ?>" onerror="this.src='assets/images/noimage.png';">
          </figure>
          <div class="product-body">
            <div class="product-category">
              <?php
                if (!empty($danhmuc_list)) {
                  foreach ($danhmuc_list as $dm) {
                    if ($dm['id'] == $sp['id_list'] || $dm['tenkhongdauvi'] == $p_cat) {
                      echo $dm['ten' . $lang];
                      break;
                    }
                  }
                }
              ?>
            </div>
            <h3 class="product-title"><?= $sp['ten' . $lang] ?></h3>
            <div class="product-specs">
              <?php if (!empty($p_specs) && is_array($p_specs)) { foreach ($p_specs as $label => $val) { ?>
                <div class="spec-row"><span><?= $label ?></span><strong><?= $val ?></strong></div>
              <?php } } else { ?>
                <div class="spec-row"><span>Mô tả:</span><strong><?= $sp['mota' . $lang] ?></strong></div>
              <?php } ?>
            </div>
            <footer class="product-footer">
              <div>
                <div class="product-price-label">Giá tại xưởng:</div>
                <div class="product-price">Liên hệ báo giá tốt</div>
              </div>
              <button type="button" class="btn btn-primary btn-sm product-btn-quote open-quote-modal" aria-label="Yêu cầu báo giá <?= $sp['ten' . $lang] ?>">
                <i class="fa-solid fa-cart-flatbed" aria-hidden="true"></i> Báo Giá
              </button>
            </footer>
          </div>
        </article>
      <?php } } ?>
    </div>
  </div>
</section>

<!-- Dịch vụ & Quy trình thi công -->
<section class="section section-bg-white" id="thi-cong" aria-labelledby="services-heading">
  <div class="container">
    <header class="section-header">
      <div class="section-badge">
        <i class="fa-solid fa-helmet-safety" aria-hidden="true"></i> Dịch vụ thế mạnh
      </div>
      <h2 class="section-title" id="services-heading">
        Giải Pháp <span>Thi Công Trọn Gói</span> Chuyên Nghiệp
      </h2>
      <p class="section-desc">
        Sáng Tạo EcoPanel - Nguyễn Thanh Tuyền sở hữu đội ngũ thợ lành nghề, trang thiết bị cơ giới chuyên dụng, cam kết bàn giao đúng tiến độ và tiêu chuẩn kỹ thuật khắt khe.
      </p>
    </header>

    <div class="services-grid">
      <?php if (!empty($dichvu)) { foreach ($dichvu as $dv) {
          $dv_opt = !empty($dv['options']) ? json_decode($dv['options'], true) : [];
          $dv_icon = $dv_opt['icon'] ?? 'fa-solid fa-industry';
          $dv_checklist = $dv_opt['checklist'] ?? [];
          $dv_img = (!empty($dv['photo']) && file_exists(UPLOAD_NEWS_L . $dv['photo']))
                    ? UPLOAD_NEWS_L . $dv['photo']
                    : (file_exists('assets/images/' . $dv['photo']) ? 'assets/images/' . $dv['photo'] : 'assets/images/noimage.png');
      ?>
        <article class="service-card">
          <figure class="service-thumb">
            <img src="<?= $dv_img ?>" alt="<?= $dv['ten' . $lang] ?>" onerror="this.src='assets/images/noimage.png';">
            <div class="service-icon-floating"><i class="<?= $dv_icon ?>" aria-hidden="true"></i></div>
          </figure>
          <div class="service-content">
            <h3 class="service-title"><?= $dv['ten' . $lang] ?></h3>
            <p class="service-desc"><?= $dv['mota' . $lang] ?></p>
            <ul class="service-checklist">
              <?php foreach ($dv_checklist as $chk) { ?>
                <li><i class="fa-solid fa-circle-check" aria-hidden="true"></i> <?= $chk ?></li>
              <?php } ?>
            </ul>
            <a href="#lien-he" class="service-link">Tư vấn báo giá <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
          </div>
        </article>
      <?php } } ?>
    </div>

    <?php
      $process_title = !empty($optsetting['process_title']) ? $optsetting['process_title'] : 'Quy Trình Thi Công 5 Bước Chuẩn Kỹ Thuật Tại Sáng Tạo EcoPanel';
      $default_steps = [
        ['num' => '01', 'title' => 'Tiếp Nhận &amp; Tư Vấn', 'desc' => 'Lắng nghe nhu cầu, quy mô diện tích và mục đích sử dụng công trình.'],
        ['num' => '02', 'title' => 'Khảo Sát Hiện Trạng', 'desc' => 'Đội ngũ kỹ sư đo đạc thực tế mặt bằng, lên bản vẽ phối cảnh 2D/3D chi tiết.'],
        ['num' => '03', 'title' => 'Báo Giá &amp; Hợp Đồng', 'desc' => 'Dự toán chi tiết, minh bạch không phát sinh chi phí, cam kết tiến độ.'],
        ['num' => '04', 'title' => 'Sản Xuất &amp; Lắp Dựng', 'desc' => 'Gia công panel tại xưởng, vận chuyển tới công trường thi công an toàn.'],
        ['num' => '05', 'title' => 'Nghiệm Thu &amp; Bảo Hành', 'desc' => 'Bàn giao công trình, kiểm tra cách nhiệt và kích hoạt bảo hành dài hạn.']
      ];
      $process_steps = (!empty($optsetting['process_steps']) && is_array($optsetting['process_steps'])) ? $optsetting['process_steps'] : $default_steps;
    ?>
    <!-- Quy trình thi công 5 bước -->
    <section class="process-box" aria-label="Quy trình thi công 5 bước chuẩn hóa">
      <header class="process-header">
        <h3><?= $process_title ?></h3>
      </header>
      <ol class="process-steps-grid">
        <?php foreach ($process_steps as $step) { ?>
          <li class="process-step">
            <div class="step-num-wrap"><?= $step['num'] ?></div>
            <h5><?= $step['title'] ?></h5>
            <p><?= $step['desc'] ?></p>
          </li>
        <?php } ?>
      </ol>
    </section>
  </div>
</section>

<!-- Dự án tiêu biểu -->
<section class="section section-bg-subtle" id="du-an" aria-labelledby="projects-heading">
  <div class="container">
    <header class="section-header">
      <div class="section-badge">
        <i class="fa-solid fa-folder-open" aria-hidden="true"></i> Hồ sơ năng lực
      </div>
      <h2 class="section-title" id="projects-heading">
        Dự Án <span>Tiêu Biểu Đã Hoàn Thành</span>
      </h2>
      <p class="section-desc">
        Các công trình thực tế đã được Sáng Tạo EcoPanel - Nguyễn Thanh Tuyền trực tiếp sản xuất vật tư và tổng thầu thi công bàn giao cho khách hàng.
      </p>
    </header>

    <!-- Filter Tab cho Dự án -->
    <nav class="filter-tabs-wrapper" aria-label="Bộ lọc loại hình dự án">
      <button class="tab-btn active" data-filter="all">Tất cả dự án</button>
      <button class="tab-btn" data-filter="nha-xuong">Nhà Xưởng</button>
      <button class="tab-btn" data-filter="kho-lanh">Kho Lạnh</button>
      <button class="tab-btn" data-filter="nha-o">Nhà Ở - Văn Phòng</button>
      <button class="tab-btn" data-filter="du-an-khac">Dự Án Khác</button>
    </nav>

    <!-- Projects Grid -->
    <div class="projects-grid">
      <?php if (!empty($duan)) { foreach ($duan as $da) {
          $da_opt = !empty($da['options']) ? json_decode($da['options'], true) : [];
          $da_cat = $da_opt['cat'] ?? 'nha-xuong';
          $da_tag = $da_opt['tag'] ?? 'Nhà Xưởng';
          $da_area = $da_opt['area'] ?? '10.000 m²';
          $da_time = $da_opt['time'] ?? '30 Ngày';
          $da_img = (!empty($da['photo']) && file_exists(UPLOAD_NEWS_L . $da['photo']))
                    ? UPLOAD_NEWS_L . $da['photo']
                    : (file_exists('assets/images/' . $da['photo']) ? 'assets/images/' . $da['photo'] : 'assets/images/noimage.png');
      ?>
        <article class="project-card" data-category="<?= $da_cat ?>">
          <img src="<?= $da_img ?>" alt="<?= $da['ten' . $lang] ?>" class="project-bg-img" onerror="this.src='assets/images/noimage.png';">
          <div class="project-overlay">
            <span class="project-tag"><?= $da_tag ?></span>
            <h3 class="project-title"><?= $da['ten' . $lang] ?></h3>
            <div class="project-meta">
              <span><i class="fa-solid fa-map-pin" aria-hidden="true"></i> <?= !empty($da['diachi']) ? $da['diachi'] : 'TP. HCM' ?></span>
              <span><i class="fa-solid fa-ruler-combined" aria-hidden="true"></i> <?= $da_area ?></span>
              <span><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> <?= $da_time ?></span>
            </div>
            <div class="project-btn-detail">Xem chi tiết công trình <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></div>
          </div>
        </article>
      <?php } } ?>
    </div>
  </div>
</section>

<!-- Hình ảnh thực tế -->
<section class="section section-bg-white" id="hinh-anh" aria-labelledby="gallery-heading">
  <div class="container">
    <header class="section-header">
      <div class="section-badge">
        <i class="fa-solid fa-camera" aria-hidden="true"></i> Hoạt động thực tế
      </div>
      <h2 class="section-title" id="gallery-heading">
        Hình Ảnh <span>Thực Tế Tại Công Trường &amp; Xưởng</span>
      </h2>
      <p class="section-desc">
        Khoảnh khắc ghi lại quá trình sản xuất tấm panel cách nhiệt và các công đoạn thi công lắp đặt thực tế của đội ngũ Sáng Tạo EcoPanel.
      </p>
    </header>

    <div class="gallery-grid">
      <?php if (!empty($gallery)) { foreach ($gallery as $g) {
          $g_opt = !empty($g['options']) ? json_decode($g['options'], true) : [];
          $g_span = ($g_opt['span'] ?? 1) == 2 ? 'span-2' : '';
          $g_img = (!empty($g['photo']) && file_exists(UPLOAD_PHOTO_L . $g['photo']))
                    ? UPLOAD_PHOTO_L . $g['photo']
                    : (file_exists('assets/images/' . $g['photo']) ? 'assets/images/' . $g['photo'] : 'assets/images/noimage.png');
      ?>
        <figure class="gallery-item <?= $g_span ?>" data-fullimg="<?= $g_img ?>" data-caption="<?= $g['ten' . $lang] ?>">
          <img src="<?= $g_img ?>" alt="<?= $g['mota' . $lang] ?>" onerror="this.src='assets/images/noimage.png';">
          <figcaption class="gallery-hover-overlay">
            <div class="gallery-icon-zoom"><i class="fa-solid fa-expand" aria-hidden="true"></i></div>
            <div class="gallery-caption"><?= $g['ten' . $lang] ?></div>
          </figcaption>
        </figure>
      <?php } } ?>
    </div>
  </div>
</section>

<!-- Tin tức -->
<section class="section section-bg-subtle" id="tin-tuc" aria-labelledby="news-heading">
  <div class="container">
    <header class="section-header">
      <div class="section-badge">
        <i class="fa-solid fa-newspaper" aria-hidden="true"></i> Kiến thức &amp; Tin tức
      </div>
      <h2 class="section-title" id="news-heading">
        Tin Tức <span>Ngành Xây Dựng &amp; Báo Giá</span> Mới Nhất
      </h2>
      <p class="section-desc">
        Cập nhật xu hướng thi công lắp ghép, cẩm nang chọn vật liệu panel đạt chuẩn PCCC và bảng báo giá vật liệu mới nhất 2026.
      </p>
    </header>

    <div class="news-grid">
      <?php if (!empty($tintuc)) { foreach ($tintuc as $tt) {
          $tt_opt = !empty($tt['options']) ? json_decode($tt['options'], true) : [];
          $tt_author = $tt_opt['author'] ?? 'Nguyễn Thanh Tuyền';
          $tt_date = date('d/m/Y', $tt['ngaytao']);
          $tt_date_iso = date('Y-m-d', $tt['ngaytao']);
          $tt_img = (!empty($tt['photo']) && file_exists(UPLOAD_NEWS_L . $tt['photo']))
                    ? UPLOAD_NEWS_L . $tt['photo']
                    : (file_exists('assets/images/' . $tt['photo']) ? 'assets/images/' . $tt['photo'] : 'assets/images/noimage.png');
      ?>
        <article class="news-card">
          <figure class="news-thumb">
            <img src="<?= $tt_img ?>" alt="<?= $tt['ten' . $lang] ?>" onerror="this.src='assets/images/noimage.png';">
            <div class="news-date-badge">
              <i class="fa-regular fa-calendar" aria-hidden="true"></i>
              <time datetime="<?= $tt_date_iso ?>"><?= $tt_date ?></time>
            </div>
          </figure>
          <div class="news-content">
            <h3 class="news-title"><?= $tt['ten' . $lang] ?></h3>
            <p class="news-desc"><?= $tt['mota' . $lang] ?></p>
            <footer class="news-footer">
              <div class="news-author">
                <i class="fa-solid fa-user-pen" aria-hidden="true"></i> <span><?= $tt_author ?></span>
              </div>
              <a href="#lien-he" class="news-readmore" aria-label="Đọc tiếp bài viết: <?= $tt['ten' . $lang] ?>">
                Đọc tiếp <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </a>
            </footer>
          </div>
        </article>
      <?php } } ?>
    </div>
  </div>
</section>

<!-- Đối tác -->
<section class="section section-bg-white" id="doi-tac" aria-label="Đối tác vật tư chiến lược" style="padding-top: 10px; padding-bottom: 70px;">
  <div class="container">
    <div class="partners-wrapper">
      <div class="partners-title">ĐỐI TÁC VẬT TƯ CHIẾN LƯỢC &amp; THƯƠNG HIỆU ĐỒNG HÀNH</div>
      <div class="partners-logo-grid">
        <?php
          $partner_icons = [
            'TÔN HOA SEN' => 'fa-solid fa-shield',
            'TÔN ĐÔNG Á' => 'fa-solid fa-gear',
            'BLUESCOPE ZACS' => 'fa-solid fa-gem',
            'THÉP HÒA PHÁT' => 'fa-solid fa-cubes',
            'TÔN PHƯƠNG NAM' => 'fa-solid fa-certificate'
          ];
          if (!empty($doitac) && count($doitac) > 0) {
            foreach ($doitac as $dt) {
              $p_name = mb_strtoupper($dt['ten' . $lang], 'UTF-8');
              $p_icon = $partner_icons[$p_name] ?? 'fa-solid fa-shield';
        ?>
          <div class="partner-logo-item">
            <?php if (!empty($dt['photo']) && file_exists(UPLOAD_PHOTO_L . $dt['photo'])) { ?>
              <img src="<?= UPLOAD_PHOTO_L . $dt['photo'] ?>" alt="<?= $p_name ?>" style="max-height: 28px; width: auto; object-fit: contain;">
            <?php } else { ?>
              <i class="<?= $p_icon ?>" aria-hidden="true"></i> <?= $p_name ?>
            <?php } ?>
          </div>
        <?php } } else { ?>
          <div class="partner-logo-item"><i class="fa-solid fa-shield" aria-hidden="true"></i> TÔN HOA SEN</div>
          <div class="partner-logo-item"><i class="fa-solid fa-gear" aria-hidden="true"></i> TÔN ĐÔNG Á</div>
          <div class="partner-logo-item"><i class="fa-solid fa-gem" aria-hidden="true"></i> BLUESCOPE ZACS</div>
          <div class="partner-logo-item"><i class="fa-solid fa-cubes" aria-hidden="true"></i> THÉP HÒA PHÁT</div>
          <div class="partner-logo-item"><i class="fa-solid fa-certificate" aria-hidden="true"></i> TÔN PHƯƠNG NAM</div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
