

@extends('Admin.layout.index')
@section('content')
<div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
      <div class="nav-item dropdown">
        <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Đóng</a>
        <div class="dropdown-menu mt-0">
          <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Đóng tất cả</a>
          <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Đóng tất cả trang trước đó</a>
        </div>
      </div>
      <a class="nav-link bg-light" href="#" data-widget="iframe-scrollleft"><i class="fas fa-angle-double-left"></i></a>
      <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
      <a class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i class="fas fa-angle-double-right"></i></a>
      <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
    </div>
    <div class="tab-content">
      <div class="tab-empty">
            
      </div>
      <div class="tab-loading">
        <div>
          
        </div>
      </div>
    </div>
  </div>
    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
    <i class="fas fa-chevron-up"></i>
  </a>

  @endsection