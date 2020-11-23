<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{Route('admin')}}" class="nav-link">
        <div class="nav-profile-image">
          <img src="images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span> <!--change to offline or busy as needed-->              
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">David Grey. H</span>
          <span class="text-secondary text-small">Project Manager</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{Route('admin')}}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#quanlyhinhanh" aria-expanded="false" aria-controls="quanlyhinhanh">
        <span class="menu-title">Quản Lý Hình Ảnh</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="quanlyhinhanh">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('quanlyhinhanh')}}">Danh Sách Hình Ảnh</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{Route('themhinhanh')}}">Thêm Hình Ảnh</a></li>

        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#quanlymenu" aria-expanded="false" aria-controls="quanlymenu">
        <span class="menu-title">Quản Lý Menu</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse" id="quanlymenu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('quanlymenu')}}">Danh Sách Menu</a></li>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlysanpham" aria-expanded="false" aria-controls="quanlysanpham">
          <span class="menu-title">Quản Lý Sản Phẩm</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlysanpham">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlysanpham')}}">Danh Sách Sản Phẩm</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlytrip" aria-expanded="false" aria-controls="quanlytrip">
          <span class="menu-title">Quản Lý Trips</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlytrip">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlytrip')}}">Danh sách Trips</a></li>
          </ul>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlyblog" aria-expanded="false" aria-controls="quanlyblog">
          <span class="menu-title">Quản Lý Blog</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlyblog">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlyblog')}}">Danh Sách Blog</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('themmoiblog')}}">Thêm Blog</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('danhmucblog')}}">Danh Mục Blog</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('themdanhmucblog')}}">Thêm Danh Mục Blog</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlylienhe" aria-expanded="false" aria-controls="quanlylienhe">
          <span class="menu-title">Quản Lý Liên Hệ</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlylienhe">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{Route('thongtinlienhe')}}"> Ds Thông Tin Liên Hệ</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlylienhe')}}">Chỉnh Sửa Liên Hệ</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlythongtin" aria-expanded="false" aria-controls="quanlythongtin">
          <span class="menu-title">Quản Lý Thông Tin</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlythongtin">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlythongtin')}}">Chỉnh Sửa Thông Tin</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlybill" aria-expanded="false" aria-controls="quanlybill">
          <span class="menu-title">Quản Lý Bills</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlybill">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlybill')}}">Danh sách bills</a></li>
          </ul>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlyabout" aria-expanded="false" aria-controls="quanlyabout">
          <span class="menu-title">Quản Lý About</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlyabout">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('suaabout')}}"> Sửa About</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('elementor')}}"> Sửa About Elementor</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('questions')}}"> Sửa About Questions</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quanlybanner" aria-expanded="false" aria-controls="quanlybanner">
          <span class="menu-title">Quản Lý Banner</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="quanlybanner">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{Route('quanlybanner')}}"> Danh Sách Banner</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{Route('thembanner')}}">Thêm Banner</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
