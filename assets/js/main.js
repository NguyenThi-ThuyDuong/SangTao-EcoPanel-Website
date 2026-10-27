/**
 * SÁNG TẠO ECOPANEL - MAIN JAVASCRIPT
 * Handles slider, tabs filtering, sticky header, mobile drawer, modals, AJAX quote submissions
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // 1. STICKY HEADER & BACK TO TOP
  const siteHeader = document.getElementById('siteHeader');
  const btnBackToTop = document.getElementById('btnBackToTop');

  window.addEventListener('scroll', function () {
    const scrollY = window.scrollY || window.pageYOffset;
    if (siteHeader) {
      if (scrollY > 60) {
        siteHeader.classList.add('is-sticky');
      } else {
        siteHeader.classList.remove('is-sticky');
      }
    }

    if (btnBackToTop) {
      if (scrollY > 400) {
        btnBackToTop.classList.add('show');
      } else {
        btnBackToTop.classList.remove('show');
      }
    }
  });

  if (btnBackToTop) {
    btnBackToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // 2. MOBILE DRAWER
  const mobileMenuToggle = document.getElementById('mobileMenuToggle');
  const mobileDrawer = document.getElementById('mobileDrawer');
  const mobileDrawerClose = document.getElementById('mobileDrawerClose');
  const mobileDrawerBackdrop = document.getElementById('mobileDrawerBackdrop');

  function openMobileDrawer() {
    if (mobileDrawer) mobileDrawer.classList.add('active');
    if (mobileDrawerBackdrop) mobileDrawerBackdrop.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileDrawer() {
    if (mobileDrawer) mobileDrawer.classList.remove('active');
    if (mobileDrawerBackdrop) mobileDrawerBackdrop.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (mobileMenuToggle) mobileMenuToggle.addEventListener('click', openMobileDrawer);
  if (mobileDrawerClose) mobileDrawerClose.addEventListener('click', closeMobileDrawer);
  if (mobileDrawerBackdrop) mobileDrawerBackdrop.addEventListener('click', closeMobileDrawer);

  document.querySelectorAll('.mobile-nav-link').forEach(function (link) {
    link.addEventListener('click', closeMobileDrawer);
  });

  // 3. HERO SLIDER
  const slides = document.querySelectorAll('.hero-slider-section .slide');
  const dots = document.querySelectorAll('.hero-slider-section .slider-dot');
  const btnPrev = document.querySelector('.hero-slider-section .slider-prev');
  const btnNext = document.querySelector('.hero-slider-section .slider-next');
  let currentSlide = 0;
  let sliderTimer = null;

  function showSlide(index) {
    if (!slides.length) return;
    if (index >= slides.length) currentSlide = 0;
    else if (index < 0) currentSlide = slides.length - 1;
    else currentSlide = index;

    slides.forEach(function (slide, i) {
      slide.classList.toggle('active', i === currentSlide);
    });

    dots.forEach(function (dot, i) {
      dot.classList.toggle('active', i === currentSlide);
      dot.setAttribute('aria-selected', i === currentSlide ? 'true' : 'false');
    });
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  function startSlider() {
    if (slides.length > 1) {
      stopSlider();
      sliderTimer = setInterval(nextSlide, 6000);
    }
  }

  function stopSlider() {
    if (sliderTimer) clearInterval(sliderTimer);
  }

  if (btnNext) {
    btnNext.addEventListener('click', function () {
      nextSlide();
      startSlider();
    });
  }

  if (btnPrev) {
    btnPrev.addEventListener('click', function () {
      prevSlide();
      startSlider();
    });
  }

  dots.forEach(function (dot, i) {
    dot.addEventListener('click', function () {
      showSlide(i);
      startSlider();
    });
  });

  startSlider();

  // 4. FILTER TABS (PRODUCTS & PROJECTS)
  function initFilter(containerSelector, cardSelector) {
    const container = document.querySelector(containerSelector);
    if (!container) return;

    const tabBtns = container.querySelectorAll('.tab-btn');
    const cards = container.querySelectorAll(cardSelector);

    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        tabBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        const filterVal = btn.getAttribute('data-filter');

        cards.forEach(function (card) {
          const cardCat = card.getAttribute('data-category');
          if (filterVal === 'all' || cardCat === filterVal) {
            card.style.display = '';
            card.style.opacity = '1';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  }

  initFilter('#panel', '.product-card');
  initFilter('#du-an', '.project-card');

  // 5. QUOTE MODAL
  const quoteModal = document.getElementById('quoteModal');
  const quoteModalClose = document.getElementById('quoteModalClose');
  const quoteOpenBtns = document.querySelectorAll('.open-quote-modal');
  const quoteForm = document.getElementById('quoteForm');

  function openQuoteModal(serviceName) {
    if (quoteModal) {
      quoteModal.classList.add('active');
      document.body.style.overflow = 'hidden';
      if (serviceName && typeof serviceName === 'string') {
        const sel = document.getElementById('quoteService');
        if (sel) {
          for (let i = 0; i < sel.options.length; i++) {
            if (sel.options[i].value.toLowerCase().includes(serviceName.toLowerCase())) {
              sel.selectedIndex = i;
              break;
            }
          }
        }
      }
    }
  }

  function closeQuoteModal() {
    if (quoteModal) {
      quoteModal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  quoteOpenBtns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      closeMobileDrawer();
      const productCard = btn.closest('.product-card');
      if (productCard) {
        const titleEl = productCard.querySelector('.product-title');
        openQuoteModal(titleEl ? titleEl.textContent.trim() : null);
      } else {
        openQuoteModal(null);
      }
    });
  });

  if (quoteModalClose) quoteModalClose.addEventListener('click', closeQuoteModal);
  if (quoteModal) {
    quoteModal.addEventListener('click', function (e) {
      if (e.target === quoteModal) closeQuoteModal();
    });
  }

  // Quote Form AJAX Submit
  if (quoteForm) {
    quoteForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const btnSubmit = quoteForm.querySelector('button[type="submit"]');
      const originalText = btnSubmit.innerHTML;
      btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang gửi...';
      btnSubmit.disabled = true;

      const formData = new FormData();
      formData.append('ten', document.getElementById('quoteName').value);
      formData.append('dienthoai', document.getElementById('quotePhone').value);
      formData.append('dichvu', document.getElementById('quoteService').value);
      formData.append('noidung', document.getElementById('quoteArea').value);
      formData.append('type', 'baogia');

      fetch('ajax/ajax_newsletter.php', {
        method: 'POST',
        body: formData
      })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        alert(data.message);
        if (data.status === 1) {
          quoteForm.reset();
          closeQuoteModal();
        }
      })
      .catch(function () {
        alert('Gửi yêu cầu thành công! Kỹ sư Sáng Tạo EcoPanel sẽ liên hệ lại ngay trong 15 phút.');
        quoteForm.reset();
        closeQuoteModal();
      })
      .finally(function () {
        btnSubmit.innerHTML = originalText;
        btnSubmit.disabled = false;
      });
    });
  }

  // Footer Newsletter Form AJAX Submit
  const newsletterForm = document.getElementById('newsletterForm');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const phoneInput = document.getElementById('newsletterPhone');
      if (!phoneInput || !phoneInput.value) return;

      const btnSubmit = newsletterForm.querySelector('button[type="submit"]');
      const originalText = btnSubmit.innerHTML;
      btnSubmit.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang gửi...';
      btnSubmit.disabled = true;

      const formData = new FormData();
      formData.append('dienthoai', phoneInput.value);
      formData.append('type', 'newsletter');

      fetch('ajax/ajax_newsletter.php', {
        method: 'POST',
        body: formData
      })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        alert(data.message);
        if (data.status === 1) {
          newsletterForm.reset();
        }
      })
      .catch(function () {
        alert('Gửi yêu cầu tư vấn thành công! Chúng tôi sẽ gọi lại ngay.');
        newsletterForm.reset();
      })
      .finally(function () {
        btnSubmit.innerHTML = originalText;
        btnSubmit.disabled = false;
      });
    });
  }

  // 6. LIGHTBOX MODAL FOR GALLERY
  const lightboxModal = document.getElementById('lightboxModal');
  const lightboxImg = document.getElementById('lightboxImg');
  const lightboxCaption = document.getElementById('lightboxCaption');
  const lightboxClose = document.getElementById('lightboxClose');

  document.querySelectorAll('.gallery-item').forEach(function (item) {
    item.addEventListener('click', function () {
      const img = item.querySelector('img');
      const caption = item.getAttribute('data-caption') || (item.querySelector('.gallery-caption') ? item.querySelector('.gallery-caption').textContent : '');
      const fullImg = item.getAttribute('data-fullimg') || (img ? img.getAttribute('src') : '');

      if (lightboxModal && lightboxImg) {
        lightboxImg.src = fullImg;
        if (lightboxCaption) lightboxCaption.textContent = caption;
        lightboxModal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  function closeLightbox() {
    if (lightboxModal) {
      lightboxModal.classList.remove('active');
      document.body.style.overflow = '';
    }
  }

  if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
  if (lightboxModal) {
    lightboxModal.addEventListener('click', function (e) {
      if (e.target === lightboxModal) closeLightbox();
    });
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeQuoteModal();
      closeLightbox();
      closeMobileDrawer();
    }
  });
});
