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
    - Thêm sinh viên vào lớp học

Các chức năng chung:
- Đăng nhập
- Xem thông tin tài khoản
- Đổi mật khẩu

## Technologies - Công nghệ sử dụng

- PHP
- MySQL
- HTML
- CSS
- Bootstrap 5
- Javascript

## Manual - Hướng dẫn sử dụng

- Yêu cầu:
    - Cài đặt [PHP](https://www.php.net/manual/en/install.php), [MySQL](https://dev.mysql.com/downloads/installer/) (khuyến khích cài đặt bằng [XAMPP](https://www.apachefriends.org/download.html)).
    - Clone hoặc download file từ repository này.
    ```c
    git clone https://github.com/PhucLe03/Teaching-Learning-management-system-with-PHP
    ```
- Set up database cho ứng dụng
    - Khởi động MySQL.
    - Tạo database tên `learning_teaching` trong MySQL.
    - Copy nội dung trong file [learning_teaching.sql](learning_teaching.sql) dán vào querybox trong database `learning_teaching` đã tạo trước đó.
    - Mở terminal và navigate vào folder tên `learning_teaching`.
    ```c
    cd learning_teaching
    ```
    - Khởi động ứng dụng với port tùy ý (ở đây dùng port 3000).
    ```c
    php -S localhost:3000
    ```

## Reference - Tham khảo

Template from [codingWithElias](https://github.com/codingWithElias/school-management-system-php).