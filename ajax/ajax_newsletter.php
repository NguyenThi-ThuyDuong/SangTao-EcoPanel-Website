<?php
include "ajax_config.php";

header('Content-Type: application/json; charset=utf-8');

$ten = isset($_POST['ten']) ? htmlspecialchars(trim($_POST['ten'])) : '';
$dienthoai = isset($_POST['dienthoai']) ? htmlspecialchars(trim($_POST['dienthoai'])) : '';
$dichvu = isset($_POST['dichvu']) ? htmlspecialchars(trim($_POST['dichvu'])) : '';
$noidung = isset($_POST['noidung']) ? htmlspecialchars(trim($_POST['noidung'])) : '';
$type = isset($_POST['type']) ? htmlspecialchars(trim($_POST['type'])) : 'baogia';

if (empty($dienthoai)) {
    echo json_encode(['status' => 0, 'message' => 'Vui lòng nhập số điện thoại liên hệ!']);
    exit;
}

if (!preg_match('/^[0-9]{10,11}$/', $dienthoai)) {
    echo json_encode(['status' => 0, 'message' => 'Số điện thoại không hợp lệ (10-11 chữ số)!']);
    exit;
}

// Anti-spam check: check if same phone submitted in last 60 seconds
$recent = $d->rawQueryOne("SELECT id FROM #_newsletter WHERE dienthoai = ? AND ngaytao > ? LIMIT 1", array($dienthoai, time() - 60));
if (!empty($recent)) {
    echo json_encode(['status' => 0, 'message' => 'Bạn vừa gửi yêu cầu. Chúng tôi sẽ liên hệ lại ngay trong giây lát!']);
    exit;
}

$full_content = "";
if (!empty($dichvu)) {
    $full_content .= "Dịch vụ/Sản phẩm: " . $dichvu . "\n";
}
if (!empty($noidung)) {
    $full_content .= "Ghi chú/Diện tích: " . $noidung;
}

$data = array(
    'ten' => $ten,
    'dienthoai' => $dienthoai,
    'noidung' => $full_content,
    'tinhtrang' => '1',
    'type' => $type,
    'hienthi' => 1,
    'ngaytao' => time()
);

if ($d->insert('newsletter', $data)) {
    echo json_encode(['status' => 1, 'message' => 'Gửi yêu cầu báo giá thành công! Kỹ sư Sáng Tạo EcoPanel sẽ liên hệ lại trong 15 phút.']);
} else {
    echo json_encode(['status' => 0, 'message' => 'Có lỗi xảy ra trong quá trình gửi yêu cầu, vui lòng gọi trực tiếp hotline 0988.688.789!']);
}
