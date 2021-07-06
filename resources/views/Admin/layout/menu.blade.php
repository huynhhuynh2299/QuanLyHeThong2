  <?php
  // Check session
  $id_USER = Session()->get('id_USER');
  $USER_TEN = Session()->get('USER_TEN');
  $id_LOAIUSER = Session()->get('id_LOAIUSER');
  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="frontend/index3.html" class="brand-link">
      <img src="frontend/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Quản Lý Hệ Thống</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex row">
        <div class="image col-md-3">
          <img src="frontend/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info col-md-6">
          <a href='#' class='d-block'>{{ $USER_TEN }}</a>
        </div>
        <div class="col-md-2">
          <a href="#" class="alert-link btn" data-toggle="modal" data-target="#editInforUser">
            <i class="fas fa-cog"></i>
          </a>
        </div>

      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="tongquan" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng Quan

              </p>
            </a>

          </li>
          @if($id_USER == 1)
          <li class="nav-item">
            <a href="widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý người dùng
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="danhsachuser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="danhsachloaiuser" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách loại</p>
                </a>
              </li>

            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="widgets.html" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý giáo viên
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachgiaovien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách giáo viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themgiaovien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm học giáo viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="giaodiengiaovien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Giao diện giáo viên</p>
                </a>
              </li>



            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý học viên
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachhocvien" class="nav-link">
                  <i class="far fa-file-alt"></i>
                  <p>Danh sách học viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-chalkboard-teacher "></i>
                  <p>Công việc học viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themhocvien" class="nav-link">
                  <i class="fa fa-user-plus"></i>
                  <p>Thêm học viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="timkiemhocvien" class="nav-link">
                  <i class="fa fa-search"></i>
                  <p>Tìm kiếm học viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Quản lý cơ sở đào tạo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách cơ sở đào tạo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm cơ sở đào tạo</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Quản lý loại hình đạo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách loại hình đạo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm học loại hình đạo</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý ngành nghề
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách ngành nghề</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm ngành nghề</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản lý module
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm module</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản lý lớp
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="danhsachhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách lớp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themhocvien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm lớp</p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-header">HỖ TRỢ NGƯỜI DÙNG</li>
          <li class="nav-item">
            <a href="calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Lịch học
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Nhận hồ sơ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kanban.html" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Tổ chức lớp khóa học
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Tổ chức thi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Cấp nhận chứng chỉ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Thanh toán
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/faq.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/contact-us.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Khảo sát học viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 20px;">
                  <li class="nav-item">
                    <a href="examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 20px;">
                  <li class="nav-item">
                    <a href="examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frontend/starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Biểu mẫu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 20px;">
                  <li class="nav-item">
                    <a href="examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">

                <ul class="nav nav-treeview" style="margin-left: 20px;">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Login & Register
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px;">
                      <li class="nav-item">
                        <a href="examples/login.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Login v1</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/register.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register v1</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/forgot-password.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Forgot Password v1</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/recover-password.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Recover Password v1</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon far fa-plus-square"></i>
                      <p>
                        Quản lý người dùng
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px;">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                            Login & Register
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left: 20px;">
                          <li class="nav-item">
                            <a href="examples/login.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Login v1</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="examples/register.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Register v1</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="examples/forgot-password.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Forgot Password v1</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="examples/recover-password.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Recover Password v1</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon far fa-plus-square"></i>
                          <p>
                            THỐNG KÊ
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                      </li>


                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>
                            Login & Register v2
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="margin-left: 20px;">
                          <li class="nav-item">
                            <a href="examples/login-v2.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Login v2</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="examples/register-v2.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Register v2</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="examples/forgot-password-v2.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Forgot Password v2</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="examples/recover-password-v2.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Recover Password v2</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="examples/lockscreen.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Lockscreen</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/legacy-user-menu.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Legacy User Menu</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/language-menu.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Language Menu</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/404.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Error 404</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/500.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Error 500</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/pace.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Pace</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/blank.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Blank Page</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="frontend/starter.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Starter Page</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Login & Register v2
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="margin-left: 20px;">
                      <li class="nav-item">
                        <a href="examples/login-v2.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Login v2</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/register-v2.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Register v2</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/forgot-password-v2.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Forgot Password v2</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="examples/recover-password-v2.html" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Recover Password v2</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="examples/lockscreen.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Lockscreen</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/legacy-user-menu.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Legacy User Menu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/language-menu.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Language Menu</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/404.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Error 404</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/500.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Error 500</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/pace.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Pace</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/blank.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Blank Page</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="frontend/starter.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Starter Page</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 20px;">
                  <li class="nav-item">
                    <a href="examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="frontend/starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Tìm kiếm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">THỐNG KÊ</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Thống kê
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kế học phí</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê Giáo viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê học viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê ngành nghề</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 20px;">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 20px;">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <!-- Chỉnh sửa thông tin của user -->

  </aside>
  <div class="modal fade" id="editInforUser" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editUserModalLabel">Chỉnh sửa thông tin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="user/edit" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <!-- sua loi 419 -->
            {{csrf_field()}}
            <div class="card-body">
              <label for="USER_PASS_EDIT">Chỉnh sửa thông tin</label>
              <div class="form-group>
                  <span for=" USER_TEN_EDIT">Tên người dùng</span>
                <input type="text" class="form-control" id="USER_TEN_MENU_EDIT" name="USER_TEN" placeholder="Tên người dùng" value="{{ $USER_TEN}}">
                <input type="hidden" name="id_USER" value="{{ $id_USER }}">
                <input type="hidden" name="id_LOAIUSER" value="{{ $id_LOAIUSER }}">
              </div>
              <hr>
              <label for="USER_PASS_EDIT">Đổi mật khẩu</label>
              <div class="form-group">
                <span for="USER_PASS_EDIT">Mật khẩu hiện tại</span>
                <input type="password" class="form-control" id="USER_PASS_MENU_EDIT" name="USER_PASS" placeholder="Mật khẩu hiện tại">
              </div>
              <div class="form-group">
                <span for="USER_PASS_NEW_EDIT">Mật khẩu mới</span>
                <input type="password" class="form-control" id="USER_PASS_NEW_MENU_EDIT" name="USER_PASS_NEW" placeholder="Mật khẩu mới">
              </div>
              <div class="form-group">
                <span for="USER_PASS_COMFIRM_EDIT">Xác nhận mật khẩu</span>
                <input type="password" class="form-control" id="USER_PASS_COMFIRM_MENU_EDIT" name="USER_PASS_COMFIRM" placeholder="Xác nhận mật khẩu">
              </div>
            </div>
            <div class="modal-footer ">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>