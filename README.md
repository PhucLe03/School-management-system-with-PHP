# School management system with PHP

## Overview - Tổng quan

Ứng dụng giúp giảng viên quản lý điểm số sinh viên sử dụng PHP và MySQL.

## Database - Cơ sở dữ liệu

Database gồm các thực thể:
- Giảng viên
- Sinh viên
- Quản lý/ Nhân viên
- Môn/Khóa học
- Lớp học
- Bài giảng/ Bài tập/ Bài kiểm tra
- Điểm

## Application - Ứng dụng

Ứng dụng hỗ trợ 3 quyền truy cập với các chức năng chính khác nhau:
- Giảng viên
    - Xem danh sách lớp mình dạy
    - Thêm/Sửa/Xóa các bài giảng, bài tập, bài kiểm tra trong lớp
    - Xem danh sách sinh viên của lớp
    - Nhập/Chỉnh sửa điểm của sinh viên
- Sinh viên
    - Xem danh sách lớp học
    - Xem bài giảng, bài tập, bài kiểm tra trong lớp
    - Xem điểm của môn/khóa học
- Quản lý/ Nhân viên
    - Tạo tài khoản giảng viên, sinh viên
    - Tạo môn/khóa học
    - Tạo lớp học với giảng viên phụ trách
    <!-- - Thêm sinh viên vào lớp học -->

Các chức năng chung:
- Đăng nhập
- Xem thông tin tài khoản
- Đổi mật khẩu

## Reference

Template from [codingWithElias](https://github.com/codingWithElias/school-management-system-php).