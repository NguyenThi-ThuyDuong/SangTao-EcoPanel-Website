<?php
    $hotline_display = !empty($optsetting['hotline']) ? $optsetting['hotline'] : (!empty($optsetting['dienthoai']) ? $optsetting['dienthoai'] : '0988.688.789');
    $hotline_clean = preg_replace('/[^0-9]/', '', $hotline_display);
    $zalo_display = !empty($optsetting['zalo']) ? preg_replace('/[^0-9]/', '', $optsetting['zalo']) : '0988688789';
?>
<!-- 12. TIỆN ÍCH NỔI -->
<aside class="floating-contact" aria-label="Tiện ích liên hệ nhanh">
  <!-- Nút Gọi điện thoại -->
  <a
    href="tel:<?= $hotline_clean ?>"
    class="float-btn float-phone"
    aria-label="Gọi điện thoại tư vấn ngay"
  >
    <i class="fa-solid fa-phone" aria-hidden="true"></i>
  </a>
  <!-- Nút Chat Zalo -->
  <a
    href="https://zalo.me/<?= $zalo_display ?>"
    target="_blank"
    rel="noopener noreferrer"
    class="float-btn float-zalo"
    aria-label="Chat Zalo với chúng tôi"
  >
    <i class="fa-solid fa-comment-dots" aria-hidden="true"></i>
  </a>
  <!-- Nút Mở modal báo giá -->
  <button
    type="button"
    class="float-btn float-quote open-quote-modal"
    aria-label="Mở form nhận báo giá"
  >
    <i class="fa-solid fa-file-invoice-dollar" aria-hidden="true"></i>
  </button>
  <!-- Nút Scroll to Top -->
  <button
    type="button"
    class="float-btn float-backtotop"
    id="btnBackToTop"
    aria-label="Cuộn lên đầu trang"
  >
    <i class="fa-solid fa-arrow-up" aria-hidden="true"></i>
  </button>
</aside>
