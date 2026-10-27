<?php
    $email_display = !empty($optsetting['email']) ? $optsetting['email'] : 'info@sangtaoecopanel.com';
    $diachi_display = !empty($optsetting['diachi']) ? $optsetting['diachi'] : 'Số 12 Đường số 3, KCN Tân Bình, Phường Tây Thạnh, Quận Tân Phú, TP. HCM';
    $worktime_display = !empty($optsetting['worktime']) ? $optsetting['worktime'] : 'T2 - T7: 07:30 - 18:00';
    $hotline_display = !empty($optsetting['hotline']) ? $optsetting['hotline'] : (!empty($optsetting['dienthoai']) ? $optsetting['dienthoai'] : '0988.688.789');
    $hotline_clean = preg_replace('/[^0-9]/', '', $hotline_display);
    $zalo_display = !empty($optsetting['zalo']) ? preg_replace('/[^0-9]/', '', $optsetting['zalo']) : '0988688789';
    $fanpage_display = !empty($optsetting['fanpage']) ? $optsetting['fanpage'] : 'https://facebook.com';
    $youtube_display = !empty($optsetting['youtube']) ? $optsetting['youtube'] : 'https://youtube.com';
    $company_name = !empty($setting['ten' . $lang]) ? $setting['ten' . $lang] : 'SÁNG TẠO ECOPANEL';
    $slogan_display = !empty($optsetting['slogan']) ? $optsetting['slogan'] : 'NGUYỄN THANH TUYỀN • THIẾT KẾ & THI CÔNG NHÀ LẮP GHÉP';
    
    // Logo from Admin
    $logo_img = '';
    if (!empty($logo['photo']) && file_exists(UPLOAD_PHOTO_L . $logo['photo'])) {
        $logo_img = UPLOAD_PHOTO_L . $logo['photo'];
    } elseif (file_exists('assets/images/logo.png')) {
        $logo_img = 'assets/images/logo.png';
    } else {
        $logo_img = 'assets/images/logo.png';
    }
?>
<!-- Topbar -->
<aside class="topbar" aria-label="Thông tin liên hệ nhanh">
  <div class="container">
    <div class="topbar-wrapper">
      <div class="topbar-row topbar-row-1">
        <div class="topbar-item topbar-address">
          <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
          <span>Văn phòng: <?= $diachi_display ?></span>
        </div>
        <div class="topbar-item topbar-time">
          <i class="fa-solid fa-clock" aria-hidden="true"></i>
          <span><?= $worktime_display ?></span>
        </div>
      </div>
      <div class="topbar-row topbar-row-2">
        <div class="topbar-item topbar-email">
          <i class="fa-solid fa-envelope" aria-hidden="true"></i>
          <a href="mailto:<?= $email_display ?>"><?= $email_display ?></a>
        </div>
        <div class="topbar-item highlight-phone">
          <i class="fa-solid fa-phone-volume" aria-hidden="true"></i>
          <a href="tel:<?= $hotline_clean ?>">Hotline: <?= $hotline_display ?> (Mr. Tuyền)</a>
        </div>
        <div class="topbar-socials" aria-label="Mạng xã hội">
          <a href="<?= $fanpage_display ?>" aria-label="Facebook" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="<?= $youtube_display ?>" aria-label="YouTube" target="_blank" rel="noopener"><i class="fa-brands fa-youtube"></i></a>
          <a href="https://zalo.me/<?= $zalo_display ?>" aria-label="Zalo" target="_blank" rel="noopener"><i class="fa-solid fa-comment-dots"></i></a>
        </div>
      </div>
    </div>
  </div>
</aside>

<!-- Header -->
<header class="header-main" id="siteHeader" role="banner">
  <div class="container">
    <div class="header-wrapper">
      <!-- Logo thương hiệu -->
      <a href="#trang-chu" class="header-logo" aria-label="Về trang chủ Sáng Tạo EcoPanel">
        <div class="logo-img-wrapper">
          <img src="<?= $logo_img ?>" alt="Logo <?= $company_name ?>" class="logo-img" onerror="this.src='assets/images/logo.png';">
        </div>
        <div class="logo-text-wrapper">
          <div class="logo-title">SÁNG TẠO <span>ECOPANEL</span></div>
          <div class="logo-sub"><?= $slogan_display ?></div>
        </div>
      </a>

      <!-- Menu Điều Hướng Chính -->
      <nav class="header-nav" aria-label="Điều hướng chính website">
        <ul class="nav-list">
          <li class="nav-item active">
            <a href="#trang-chu" class="nav-link">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a href="#gioi-thieu" class="nav-link">
              Giới thiệu <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu" aria-label="Menu con Giới thiệu">
              <li><a href="#gioi-thieu" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Tổng quan doanh nghiệp</a></li>
              <li><a href="#gioi-thieu" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Tầm nhìn - Sứ mệnh</a></li>
              <li><a href="#gioi-thieu" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Năng lực nhà máy &amp; Đội ngũ</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#panel" class="nav-link">
              Panel <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu" aria-label="Menu con Panel">
              <li><a href="#panel" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Panel cách nhiệt (EPS, PU/PIR)</a></li>
              <li><a href="#panel" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Panel chống cháy (Rockwool, Bông thủy tinh)</a></li>
              <li><a href="#panel" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Panel phòng sạch GMP</a></li>
              <li><a href="#panel" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Phụ kiện nhôm panel chuyên dụng</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#thi-cong" class="nav-link">
              Thi công <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu" aria-label="Menu con Thi công">
              <li><a href="#thi-cong" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Nhà xưởng panel trọn gói</a></li>
              <li><a href="#thi-cong" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Kho lạnh &amp; Kho đông bảo quản</a></li>
              <li><a href="#thi-cong" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Nhà ở dân dụng &amp; Homestay</a></li>
              <li><a href="#thi-cong" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Công trình phòng sạch y tế, điện tử</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#du-an" class="nav-link">
              Dự án <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu" aria-label="Menu con Dự án">
              <li><a href="#du-an" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Dự án Nhà xưởng công nghiệp</a></li>
              <li><a href="#du-an" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Dự án Hệ thống Kho lạnh</a></li>
              <li><a href="#du-an" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Dự án Nhà ở - Văn phòng</a></li>
              <li><a href="#du-an" class="dropdown-link"><i class="fa-solid fa-angle-right" aria-hidden="true"></i> Dự án khác</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#tin-tuc" class="nav-link">Tin tức</a>
          </li>
          <li class="nav-item">
            <a href="#lien-he" class="nav-link">Liên hệ</a>
          </li>
        </ul>
      </nav>

      <!-- Hành Động Header -->
      <div class="header-actions">
        <button type="button" class="btn btn-primary btn-header-quote open-quote-modal" id="btnHeaderQuote">
          <i class="fa-solid fa-file-invoice" aria-hidden="true"></i> Nhận Báo Giá
        </button>
        <button type="button" class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Mở menu di động" aria-expanded="false" aria-controls="mobileDrawer">
          <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-drawer-backdrop" id="mobileDrawerBackdrop" aria-hidden="true"></div>
<aside class="mobile-drawer" id="mobileDrawer" aria-label="Menu di động">
  <div class="mobile-drawer-header">
    <div class="logo-title">SÁNG TẠO <span>ECOPANEL</span></div>
    <button class="mobile-drawer-close" id="mobileDrawerClose" aria-label="Đóng menu"><i class="fa-solid fa-xmark"></i></button>
  </div>
  <nav>
    <ul class="mobile-nav-list">
      <li><a href="#trang-chu" class="mobile-nav-link active">Trang chủ <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#gioi-thieu" class="mobile-nav-link">Giới thiệu <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#panel" class="mobile-nav-link">Panel <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#thi-cong" class="mobile-nav-link">Thi công <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#du-an" class="mobile-nav-link">Dự án <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#tin-tuc" class="mobile-nav-link">Tin tức <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#lien-he" class="mobile-nav-link">Liên hệ <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
      <li><a href="#hinh-anh" class="mobile-nav-link">Hình ảnh thực tế <i class="fa-solid fa-angle-right" aria-hidden="true"></i></a></li>
    </ul>
  </nav>
  <div style="margin-top: 24px;">
    <button type="button" class="btn btn-primary open-quote-modal" style="width: 100%;">
      <i class="fa-solid fa-calculator" aria-hidden="true"></i> Yêu cầu báo giá nhanh
    </button>
    <div style="margin-top: 14px; text-align: center; font-size: 0.88rem; color: #64748B;">
      <strong>Hotline: <?= $hotline_display ?></strong>
    </div>
  </div>
</aside>
