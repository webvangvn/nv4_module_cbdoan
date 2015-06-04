<?php

/**
 * @Project NUKEVIET 4.x
 * @Author hongoctrien (01692777913@yahoo.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @Copyright (C) 2012 2mit.org. All rights reserved
 * @Createdate 19-07-2012 14:43
 */

 if (! defined('NV_ADMIN') or ! defined('NV_MAINFILE')){
 die('Stop!!!');
}

$lang_translator['author'] ="hongoctrien (01692777913@yahoo.com)";
$lang_translator['createdate'] ="19/07/2012, 15:22";
$lang_translator['copyright'] ="@Copyright (C) 2012 2mit.org. All rights reserved";
$lang_translator['info'] ="";
$lang_translator['langtype'] ="lang_module";

$lang_module['error_csdl'] = "Có lỗi xảy ra, Vui lòng kiềm tra lại thông tin!";
$lang_module['delete_conf'] = "Trước khi xóa đơn vị, bạn phải chắc chắn không có cán bộ nào thuộc đơn vị này. Bạn có muốn tiếp tục?";

$lang_module['chucnang'] = "Chức năng";
$lang_module['upd'] = "Cập nhật";
$lang_module['config'] = "Cấu hình";
$lang_module['info'] = "Thông báo";

$lang_module['dsdonvi'] = "Danh sách đơn vị";
$lang_module['add_donvi'] = "Thêm đơn vị";
$lang_module['madvi'] = "Mã đơn vị";
$lang_module['edit_dv'] = "Sửa đơn vị";
$lang_module['tendvi'] = "Tên đơn vị";
$lang_module['error_tdv'] = "Tên đơn vị không được bỏ trống!";
$lang_module['dv_quytac'] = "- Mã đơn vị là một chuỗi ký tự bé hơn 20 ký tự, không được bỏ trống<br />- Mã đơn vị không được trùng nhau, chỉ được nhập một lần<br />- Tên đơn vị là một chuỗi bé hơn 100 ký tự, không được bỏ trống";

$lang_module['dschucvu'] = "Danh sách chức vụ";
$lang_module['macvu'] = "Mã chức vụ";
$lang_module['tenchucvu'] = "Tên chức vụ";
$lang_module['add_chucvu'] = "Thêm chức vụ";
$lang_module['edit_cv'] = "Sửa chức vụ";
$lang_module['error_mcv'] = "Nhập mã chức vụ!";
$lang_module['error_tcv'] = "Tên chức vụ không được bỏ trống!";
$lang_module['cv_quytac'] = "- Mã chức vụ là một chuỗi ký tự bé hơn 20 ký tự, không được bỏ trống<br />- Mã chức vụ không được trùng nhau, chỉ được nhập một lần<br />- Tên chức vụ là một chuỗi bé hơn 100 ký tự, không được bỏ trống";

$lang_module['cbdoan_add'] = "Thêm cán bộ đoàn";
$lang_module['ten'] = "Tên cán bộ đoàn (*)";
$lang_module['id'] = "Mã CB";
$lang_module['gtinh'] = "Giới tính";
$lang_module['ngsinh'] = "Ngày sinh (*)";
$lang_module['avt'] = "Hình đại diện";
$lang_module['dang'] = "Đảng viên";
$lang_module['que'] = "Quê quán";
$lang_module['diachi'] = "Địa chỉ";
$lang_module['donvi'] = "Đơn vị (*)";
$lang_module['chucvu'] = "Chức vụ (*)";
$lang_module['email'] = "Email";
$lang_module['yahoo'] = "Tài khoản yahoo";
$lang_module['skype'] = "Tài khoản skype";
$lang_module['face'] = "Địa chỉ facebook";
$lang_module['phone'] = "Điện thoại";
$lang_module['web'] = "Website";
$lang_module['tt'] = "Giới thiệu bản thân";
$lang_module['select_pic'] = "Chọn ảnh";
$lang_module['dscb'] = "Danh sách cán bộ";
$lang_module['gt'] = "Giới thiệu";

$lang_module['na'] = "N/A";
$lang_module['male'] = "Nữ";
$lang_module['female'] = "Nam";
$lang_module['chon_dv'] = "Chọn đơn vị";
$lang_module['chon_cv1'] = "Chọn chức vụ 1";
$lang_module['chon_cv2'] = "Chọn chức vụ 2";
$lang_module['chon_cv3'] = "Chọn chức vụ 3";
$lang_module['nvdoan'] = "Ngày vào đoàn";
$lang_module['nvdang'] = "Ngày vào đảng";
$lang_module['reset'] = "Làm lại";
$lang_module['edit_cb'] = "Sửa thông tin cán bộ";

$lang_module['no_name'] = "- Họ tên không được để trống!<br />";
$lang_module['no_ngsinh'] = "- Ngày sinh không được để trống!<br />";
$lang_module['no_dvi'] = "- Vui lòng chọn đơn vị!<br />";
$lang_module['tr_cvu'] = "- Các chức vụ không được giống nhau!<br />";
$lang_module['format_ngsinh'] = "- Định dạng ngày sinh không đúng! (dd/mm/yyyy)<br />";
$lang_module['format_nvdang'] = "- Định dạng ngày vào đảng không đúng! (dd/mm/yyyy)<br />";
$lang_module['format_nvdoan'] = "- Định dạng ngày vào đoàn không đúng! (dd/mm/yyyy)<br />";
$lang_module['format_email'] = "- Định dạng email không đúng!<br />";
$lang_module['format_phone'] = "- Định dạng số điện thoại không đúng!<br />";
$lang_module['no_cvu'] = "- Vui lòng chọn chức vụ!<br />";
$lang_module['no_dang'] = "- Cán bộ chưa vào đảng nên giá trị <b>\"Ngày vào đảng\"</b> phải bỏ trống!<br />";
$lang_module['e_dv'] = "Mã đơn vị phải là số, xem mã đơn vị tại <b>danh sách các đơn vị</b>.";
$lang_module['e_cv'] = "Mã chức vụ phải là số, xem mã chức vụ tại <b>danh sách các chức vụ</b>.";
$lang_module['csdl'] = "- Lỗi truy cập CSDL!<br />";
$lang_module['csdl_ok'] = "Cập nhật thành công!<br />";

$lang_module['data_manage'] = "Quản lý dữ liệu";
$lang_module['ins'] = "Chèn thêm: ";
$lang_module['upd'] = "Cập nhật: ";
$lang_module['rec'] = "Ghi lại";
$lang_module['import'] = "Import";
$lang_module['count_fe'] = "Tổng số bản ghi hiện có: ";
$lang_module['delete_all'] = "Xóa tất cả bản ghi";
$lang_module['deleted_conf'] = "Bạn có chắc chắn muốn xóa hết dữ liệu?";

$lang_module['toplip'] = "Hiển thị toplip";
$lang_module['page'] = "Số cán bộ trên 1 trang";
$lang_module['search'] = "Tìm kiếm cán bộ";

$lang_module['e_gt'] = "Giới tính phải là số (1. Nam, 0. Nữ)";
$lang_module['e_dang'] = "Đảng phải là số (1. Đã vào đảng, 0. Chưa vào đảng)";
$lang_module['emty_gt'] = "Giới tính không được bỏ trống";
$lang_module['em_dv'] = "Mã đơn vị không được trống.";
$lang_module['canthiet'] = "Không bỏ trống các thông tin bắt buộc (*)";

