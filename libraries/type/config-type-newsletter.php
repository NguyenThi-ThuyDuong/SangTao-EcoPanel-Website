<?php
    /* Đăng ký nhận tin */
    $nametype = "newsletter";
    $config['newsletter'][$nametype]['title_main'] = "Đăng ký nhận tin";
    $config['newsletter'][$nametype]['file'] = false;
    $config['newsletter'][$nametype]['email'] = true;
    $config['newsletter'][$nametype]['guiemail'] = false;
    $config['newsletter'][$nametype]['ten'] = true;
    $config['newsletter'][$nametype]['dienthoai'] = true;
    $config['newsletter'][$nametype]['diachi'] = false;
    $config['newsletter'][$nametype]['chude'] = false;
    $config['newsletter'][$nametype]['noidung'] = true;
    $config['newsletter'][$nametype]['ghichu'] = false;
    $config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Mới tiếp nhận", "2" => "Đã liên hệ", "3" => "Đã hoàn thành");
    $config['newsletter'][$nametype]['showten'] = true;
    $config['newsletter'][$nametype]['showdienthoai'] = true;
    $config['newsletter'][$nametype]['showngaytao'] = true;
    $config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

    /* Yêu cầu báo giá */
    $nametype = "baogia";
    $config['newsletter'][$nametype]['title_main'] = "Yêu cầu báo giá";
    $config['newsletter'][$nametype]['file'] = false;
    $config['newsletter'][$nametype]['email'] = false;
    $config['newsletter'][$nametype]['guiemail'] = false;
    $config['newsletter'][$nametype]['ten'] = true;
    $config['newsletter'][$nametype]['dienthoai'] = true;
    $config['newsletter'][$nametype]['diachi'] = false;
    $config['newsletter'][$nametype]['chude'] = false;
    $config['newsletter'][$nametype]['noidung'] = true;
    $config['newsletter'][$nametype]['ghichu'] = false;
    $config['newsletter'][$nametype]['tinhtrang'] = array("1" => "Mới tiếp nhận", "2" => "Đang tư vấn", "3" => "Đã báo giá / chốt hợp đồng");
    $config['newsletter'][$nametype]['showten'] = true;
    $config['newsletter'][$nametype]['showdienthoai'] = true;
    $config['newsletter'][$nametype]['showngaytao'] = true;
    $config['newsletter'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';
?>
