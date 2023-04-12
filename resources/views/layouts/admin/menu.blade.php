  <!-- sidebar -->
  <div class="sidebar px-4 py-4 py-md-4 me-0">
      <div class="d-flex flex-column h-100">
          <a class="mb-0 ">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <span>
                  <img src="{{ asset('storage/users/' . $header_logo) }}" alt="logo-small" width="150px" height="100px">
              </span>
               </a>
          <!-- Menu: main ul -->
          <ul class="menu-list flex-grow-1 mt-3">
              <li><a class="m-link " href="{{ route('admin.home') }}"><i class="icofont-home fs-5"></i>
                      <span>الرئيسية</span></a></li>
              @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 3)
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                          <i class="icofont-chart-flow fs-5"></i> <span>الاقسام</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                      <!-- Menu: Sub menu ul -->
                      <ul class="sub-menu collapse" id="categories">
                          <li><a class="ms-link" href="{{ route('admin.categories') }}">عرض الاقسام</a></li>

                      </ul>
                  </li>
              @endif
              @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 3)
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                          <i class="icofont-truck-loaded fs-5"></i> <span>المنتجات</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                      <!-- Menu: Sub menu ul -->
                      <ul class="sub-menu collapse" id="menu-product">
                          <li><a class="ms-link" href="{{ route('admin.products') }}">عرض المنتجات</a></li>
                          <li><a class="ms-link" href="{{ route('admin.add.product') }}">اضف منتج</a></li>

                      </ul>
                  </li>
              @endif
              {{-- @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2) --}}
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-order" href="#">
                          <i class="icofont-notepad fs-5"></i> <span>الطلبات</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>

                      {{-- <ul class="sub-menu collapse" id="menu-order">
                            <li><a class="ms-link" href="{{route('admin.sorders')}}">طلبات خاصة</a></li>
                           
                        </ul> --}}
                      <ul class="sub-menu collapse" id="menu-order">
                          <li><a class="ms-link" href="{{ route('admin.orders') }}">الطلبات الجديدة</a></li>

                      </ul>

                      <ul class="sub-menu collapse" id="menu-order">
                          <li><a class="ms-link" href="{{ route('orderss.list') }}">الطلبات تم شحنها</a></li>

                      </ul>


                      <ul class="sub-menu collapse" id="menu-order">
                          <li><a class="ms-link" href="{{ route('sh.admin.orders') }}">طلبات تم استلامها</a></li>

                      </ul>

                      <ul class="sub-menu collapse" id="menu-order">
                          <li><a class="ms-link" href="{{ route('shs.admin.orders') }}">طلبات تم الغائها </a></li>

                      </ul>

                  </li>
              {{-- @endif --}}
              @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 3)
              <li class="collapsed">
                  <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-productf" href="#">
                      <i class="icofont-paper fs-5"></i> <span>نكهات/اوزان الطلب الخاص</span> <span
                          class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                  <!-- Menu: Sub menu ul -->
                  <ul class="sub-menu collapse" id="menu-productf">
                      <li><a class="ms-link" href="{{ route('admin.flavors') }}">النكهات</a></li>
                      <li><a class="ms-link" href="{{ route('admin.weights') }}">الاوزان</a></li>

                  </ul>
              </li>
              @endif


              @if (auth()->user()->is_admin == 1 || auth()->user()->is_admin == 2)
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-pro" href="#">
                          <i class="icofont-paper fs-5"></i> <span>التقارير الماليه</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                      <!-- Menu: Sub menu ul -->
                      <ul class="sub-menu collapse" id="menu-pro">
                          {{-- <li><a class="ms-link" href="{{ route('report') }}"> التقارير الطلبات</a></li>
                          <li><a class="ms-link" href="{{ route('total') }}"> التقارير المدفوعات</a></li> --}}
                          <li><a class="ms-link" href="{{ route('reportmony') }}"> التقارير الماليه</a></li>
                      </ul>
                  </li>
                  {{-- @if (auth()->user()->is_admin == 1)
                    @endif --}}
              @endif

              @if (auth()->user()->is_admin == 1)
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#customers-info" href="#">
                          <i class="icofont-funky-man fs-5"></i> <span>المستخدمين</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                      <!-- Menu: Sub menu ul -->

                      <ul class="sub-menu collapse" id="customers-info">
                          <li><a class="ms-link" href="{{ route('admin.user') }}">عرض المستخدمين</a></li>
                      </ul>
                      {{-- @elseif(auth()->user()->is_admin == 2)
                   
                    @elseif(auth()->user()->is_admin == 3)
                  
                    @else --}}



                  </li>
              @endif

              @if (auth()->user()->is_admin == 1)
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#app" href="#">
                          <i class="icofont-space fs-5"></i> <span>الدول\المدن</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                      <!-- Menu: Sub menu ul -->
                      <ul class="sub-menu collapse" id="app">
                          <li><a class="ms-link" href="{{ route('admin.countries') }}">عرض الدول\المدن</a></li>
                      </ul>
                  </li>
              @endif
              {{-- @if (auth()->user()->is_admin == 1)
                  <li><a class="m-link" href="{{ route('payments.index') }}"><i class="icofont-bill-alt fs-5"></i>
                          <span> عمليات الدفع </span></a></li>
              @endif --}}



              @if (Auth::user()->id == 1)
                  <li class="collapsed">
                      <a class="m-link" data-bs-toggle="collapse" data-bs-target="#customers-info2" href="#">
                          <i class="icofont-funky-man fs-5"></i> <span>المشرفين</span> <span
                              class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                      <!-- Menu: Sub menu ul -->
                      <ul class="sub-menu collapse" id="customers-info2">
                          <li><a class="ms-link" href="{{ route('admin.admin') }}">عرض المشرفين</a></li>
                      </ul>
                      <ul class="sub-menu collapse" id="customers-info2">
                          <li><a class="ms-link" href="{{ route('admin.admin.add') }}">اضف مشرف</a></li>
                      </ul>
                      <ul class="sub-menu collapse" id="customers-info2">
                          <li><a class="ms-link" href="/admin/admin/profile/1">المشرف الرئيسي</a></li>
                      </ul>
                  </li>
              @endif


              @if (auth()->user()->is_admin == 1)
                  <li><a class="m-link" href="{{ route('admin.discounts') }}"><i class="icofont-code fs-5"></i>
                          <span> اكواد الخصم </span></a></li>
              @endif
              <li><a class="m-link" href="{{ route('admin.carousels') }}"><i class="icofont-file-bmp fs-5"></i>
                      <span> عروض الصفحة الرئيسية</span></a></li>


              @if (auth()->user()->is_admin == 1)
                  <li><a class="m-link" href="{{ route('admin.contact') }}"><i class="icofont-file-bmp fs-5"></i>
                          <span> التواصل معنا</span></a></li>

                  <li><a class="m-link" href="{{ route('settings.index') }}"><i class="icofont-gear fs-5"></i>
                          <span> الاعدادات </span></a></li>
              @endif
          </ul>
          <!-- Menu: menu collepce btn -->
          <button type="button" class="btn btn-link sidebar-mini-btn text-light">
              <span class="ms-2"><i class="icofont-bubble-right"></i></span>
          </button>
      </div>
  </div>
