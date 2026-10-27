<!-- Modal Popup Nhận Báo Giá -->
<div
  class="modal-overlay"
  id="quoteModal"
  role="dialog"
  aria-modal="true"
  aria-labelledby="modal-title"
>
  <div class="modal-content">
    <button class="modal-close" id="quoteModalClose" aria-label="Đóng popup">
      <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="modal-header">
      <div class="section-badge">
        <i class="fa-solid fa-calculator" aria-hidden="true"></i> Báo giá trực tiếp
      </div>
      <h3 id="modal-title">Yêu Cầu Báo Giá &amp; Tư Vấn Kỹ Thuật</h3>
      <p>
        Sáng Tạo EcoPanel - Nguyễn Thanh Tuyền sẽ liên hệ lại ngay trong 15 phút.
      </p>
    </div>
    <form id="quoteForm">
      <div class="form-group">
        <label class="form-label" for="quoteName">Họ và tên của bạn: *</label>
        <input
          type="text"
          id="quoteName"
          name="quoteName"
          class="form-control"
          placeholder="Ví dụ: Anh Hoàng / Chị Linh"
          required
        />
      </div>
      <div class="form-group">
        <label class="form-label" for="quotePhone"
          >Số điện thoại liên hệ (Zalo): *</label
        >
        <input
          type="tel"
          id="quotePhone"
          name="quotePhone"
          class="form-control"
          placeholder="Ví dụ: 0988xxxxxx"
          required
          pattern="[0-9]{10,11}"
        />
      </div>
      <div class="form-group">
        <label class="form-label" for="quoteService"
          >Dịch vụ / Sản phẩm bạn quan tâm: *</label
        >
        <select id="quoteService" name="quoteService" class="form-control" required>
          <option value="Mua tấm Panel cách nhiệt (EPS, PU, Rockwool)">
            Mua tấm Panel cách nhiệt (EPS, PU, Rockwool)
          </option>
          <option value="Thi công Nhà xưởng Panel trọn gói">
            Thi công Nhà xưởng Panel trọn gói
          </option>
          <option value="Thi công Kho lạnh / Kho đông bảo quản">
            Thi công Kho lạnh / Kho đông bảo quản
          </option>
          <option value="Xây dựng Nhà lắp ghép / Văn phòng / Homestay">
            Xây dựng Nhà lắp ghép / Văn phòng / Homestay
          </option>
          <option value="Thi công Phòng sạch chuẩn GMP">
            Thi công Phòng sạch chuẩn GMP
          </option>
          <option value="Mua phụ kiện nhôm định hình và cửa panel">
            Mua phụ kiện nhôm định hình và cửa panel
          </option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label" for="quoteArea"
          >Diện tích dự kiến (m²) hoặc ghi chú thêm:</label
        >
        <textarea
          id="quoteArea"
          name="quoteArea"
          class="form-control"
          rows="3"
          placeholder="Ví dụ: Nhà xưởng khoảng 1.500m2 tại Bình Dương, cần thi công vách và trần panel..."
        ></textarea>
      </div>
      <button
        type="submit"
        class="btn btn-primary"
        style="width: 100%; padding: 13px"
      >
        <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Gửi Yêu Cầu Báo Giá Ngay
      </button>
    </form>
  </div>
</div>

<!-- Lightbox Modal -->
<div
  class="lightbox-modal"
  id="lightboxModal"
  role="dialog"
  aria-modal="true"
  aria-label="Xem ảnh phóng to"
>
  <div class="lightbox-content">
    <button
      class="modal-close"
      id="lightboxClose"
      style="
        top: -45px;
        right: 0;
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
      "
      aria-label="Đóng ảnh"
    >
      <i class="fa-solid fa-xmark"></i>
    </button>
    <img
      src=""
      alt="Hình ảnh thực tế công trình"
      class="lightbox-img"
      id="lightboxImg"
    />
    <div class="lightbox-caption" id="lightboxCaption"></div>
  </div>
</div>
