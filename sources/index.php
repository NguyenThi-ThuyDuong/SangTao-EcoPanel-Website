<?php  
	if(!defined('SOURCES')) die("Error");
 
    /* Sliders */
    $slider = $d->rawQuery("select ten$lang, mota$lang, photo, link, options from #_photo where (type = ? or type = ?) and hienthi > 0 order by stt,id asc", array('slider', 'slide'));
    
    /* Đối tác */
    $doitac = $d->rawQuery("select ten$lang, mota$lang, photo, link, options from #_photo where type = ? and hienthi > 0 order by stt,id asc", array('doi-tac'));
    
    /* Hình ảnh thực tế */
    $gallery = $d->rawQuery("select ten$lang, mota$lang, photo, link, options from #_photo where type = ? and hienthi > 0 order by stt,id asc", array('hinh-anh'));

    /* Danh mục sản phẩm */
    $danhmuc_list = $d->rawQuery("select ten$lang, tenkhongdauvi, mota$lang, ngaytao, id from #_product_list where hienthi > 0 and type = 'san-pham' order by stt,id asc");
    
    /* Sản phẩm Panel */
    $sanpham = $d->rawQuery("select ten$lang, tenkhongdauvi, mota$lang, masp, gia, giamoi, ngaytao, photo, options, id_list, id from #_product where hienthi > 0 and type = 'san-pham' order by stt,id asc");

    /* Giới thiệu */
    $gioithieu = $d->rawQueryOne("select ten$lang, mota$lang, noidung$lang, photo, photo1, options from #_static where type = ?", array('gioi-thieu'));

    /* Dịch vụ thi công */
    $dichvu = $d->rawQuery("select ten$lang, tenkhongdauvi, id, photo, mota$lang, options from #_news where type = ? and hienthi > 0 order by stt,id asc", array('dich-vu'));
   
    /* Dự án tiêu biểu */
    $duan = $d->rawQuery("select ten$lang, tenkhongdauvi, id, photo, mota$lang, diachi, options from #_news where type = ? and hienthi > 0 order by stt,id asc", array('du-an'));

    /* Tin tức chuyên ngành */
    $tintuc = $d->rawQuery("select ten$lang, tenkhongdauvi, mota$lang, ngaytao, id, photo, options from #_news where type = ? and hienthi > 0 order by stt,id desc", array('tin-tuc'));

    /* SEO */
    $seoDB = $seo->getSeoDB(0,'setting','capnhat','setting');
    if(!empty($seoDB['title'.$seolang])) $seo->setSeo('h1',$seoDB['title'.$seolang]);
    if(!empty($seoDB['title'.$seolang])) $seo->setSeo('title',$seoDB['title'.$seolang]);
    if(!empty($seoDB['keywords'.$seolang])) $seo->setSeo('keywords',$seoDB['keywords'.$seolang]);
    if(!empty($seoDB['description'.$seolang])) $seo->setSeo('description',$seoDB['description'.$seolang]);
    $seo->setSeo('url',$func->getPageURL());
?>
