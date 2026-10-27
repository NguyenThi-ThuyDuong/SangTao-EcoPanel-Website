# SÁNG TẠO ECOPANEL - NGUYỄN THANH TUYỀN
> Website Doanh nghiệp & Quản trị Nội dung (CMS) chuyên ngành sản xuất tấm Panel cách nhiệt, chống cháy và thi công nhà xưởng, kho lạnh, nhà lắp ghép chất lượng cao.

---

## 1. THÔNG TIN HỆ THỐNG & KHỞI CHẠY

* **Thư mục dự án:** `D:\ThucTap\SangTaoEcoPanel`
* **Website Frontend:** [http://localhost:8000/](http://localhost:8000/)
* **Trang Quản trị Admin CMS:** [http://localhost:8000/sota/](http://localhost:8000/sota/)
  * **Tài khoản đăng nhập:** `admin`
  * **Mật khẩu:** `admin`
* **Cơ sở dữ liệu:**
  * **Hệ quản trị:** MySQL (Host: `127.0.0.1`, Cổng: `3306`)
  * **Database Name:** `sangtao_ecopanel`
  * **File SQL sao lưu đồng bộ:** `database_sangtao_ecopanel.sql` (nằm tại thư mục gốc dự án)

---

## 2. HƯỚNG DẪN KHỞI ĐỘNG NHANH

### Cách 1: Khởi động 1-Click
Nhấp đúp vào file `run.bat` tại thư mục dự án. Script sẽ tự khởi động server cục bộ và mở trình duyệt tại `http://localhost:8000/`.

### Cách 2: Chạy qua dòng lệnh (Terminal / PowerShell)
1. Đảm bảo dịch vụ MySQL đang chạy (qua Laragon hoặc XAMPP).
2. Chạy lệnh:
   ```bash
   cd D:\ThucTap\SangTaoEcoPanel
   php -S 127.0.0.1:8000 router.php
   ```
3. Mở trình duyệt truy cập:
   * Trang chủ: `http://localhost:8000/`
   * Quản trị: `http://localhost:8000/sota/`

---

## 3. CƠ CHẾ QUẢN TRỊ 100% CÁC SECTION TRANG CHỦ

Toàn bộ các thành phần hiển thị trên trang chủ đều được kết nối trực tiếp với cơ sở dữ liệu và quản trị linh hoạt qua Admin CMS:

| STT | Section Ngoài Trang Chủ | Mục Quản Lý Trong Admin | Bảng Dữ Liệu MySQL | Mô Tả Khả Năng Tùy Biến |
| :---: | :--- | :--- | :--- | :--- |
| **1** | **Header & Topbar** | **Thiết lập thông tin** | `table_setting` | Đổi Hotline, Email, Địa chỉ văn phòng, Giờ làm việc, Zalo, Slogan thương hiệu |
| **2** | **Logo & Favicon** | **Hình ảnh & Video > Logo / Favicon** | `table_photo` | Tải ảnh logo mới, tự động đồng bộ trên toàn trang và tab trình duyệt |
| **3** | **Slideshow Banner** | **Hình ảnh & Video > Slideshow** | `table_photo` (`slider`) | Thêm, sửa, xóa slide, đổi ảnh banner, tiêu đề, mô tả, link nút bấm |
| **4** | **Giới thiệu EcoPanel** | **Trang tĩnh > Giới thiệu** | `table_static` (`gioi-thieu`) | Đổi bài viết giới thiệu, ảnh nhà xưởng thực tế, hồ sơ năng lực |
| **5** | **Sản phẩm Panel** | **Quản lý sản phẩm > Sản phẩm** | `table_product` (`san-pham`) | Thêm/sửa danh mục, bảng thông số kỹ thuật (EPS, PU, Rockwool...), giá và hình ảnh |
| **6** | **Dịch vụ & Quy trình** | **Quản lý bài viết > Dịch vụ** | `table_news` (`dich-vu`) | Quản lý các gói thi công nhà xưởng, kho lạnh, homestay lắp ghép |
| **7** | **Dự án tiêu biểu** | **Quản lý bài viết > Dự án** | `table_news` (`du-an`) | Đăng hồ sơ công trình hoàn thiện: diện tích m², địa điểm, tiến độ, hình ảnh thực tế |
| **8** | **Hình ảnh thực tế** | **Hình ảnh & Video > Hình ảnh thực tế** | `table_photo` (`hinh-anh`) | Thêm ảnh công trường, xưởng sản xuất, tự động hiển thị phóng to Lightbox |
| **9** | **Tin tức & Báo giá** | **Quản lý bài viết > Tin tức** | `table_news` (`tin-tuc`) | Soạn thảo bài viết cẩm nang, tiêu chuẩn PCCC, cập nhật bảng báo giá vật liệu mới |
| **10**| **Đối tác chiến lược** | **Hình ảnh & Video > Đối tác** | `table_photo` (`doi-tac`) | Quản lý danh sách thương hiệu tôn thép đồng hành (Hoa Sen, Đông Á, Zacs, Hòa Phát...) |
| **11**| **Quản lý báo giá (Leads)** | **Quản lý nhận tin > Đăng ký nhận báo giá** | `table_newsletter` | Lưu tự động mọi yêu cầu báo giá của khách hàng từ form hoặc modal ngoài website |

---

## 4. CẤU TRÚC THƯ MỤC CHÍNH

```
SangTaoEcoPanel/
├── ajax/                      # Xử lý các request AJAX (gửi form báo giá, lọc sản phẩm)
├── assets/                    # Tài nguyên giao diện (CSS, JS, Webfonts, Images)
│   ├── css/style.css          # File CSS giao diện chính của website
│   └── js/main.js             # File xử lý sự kiện tương tác giao diện
├── libraries/                 # Thư viện core framework, router, PDO Database
│   ├── config.php             # Cấu hình kết nối MySQL và hệ thống
│   └── type/                  # Cấu hình phân hệ module (product, news, photo, static)
├── sota/                      # Hệ thống trang quản trị Admin CMS
├── templates/                 # Giao diện hiển thị người dùng (Frontend View)
│   ├── index/index_tpl.php    # Template hiển thị toàn bộ nội dung trang chủ
│   └── layout/                # Template khung: menu, header, footer, modal
├── upload/                    # Thư mục lưu trữ hình ảnh tải lên từ Admin
├── database_sangtao_ecopanel.sql # Bản sao lưu cơ sở dữ liệu mới nhất
├── router.php                 # Router điều hướng cho PHP Built-in Server
├── run.bat                    # File kích hoạt chạy nhanh 1-Click
└── README.md                  # Tài liệu mô tả dự án
```
