<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ADMIN PANEL</li>
        @can('adminModer',auth()->user())
            <li class="nav-item">
                <a href="/admin/Manufacturer" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Manufacturers
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/ColorKey" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        ColorKeys
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/InterfaceConnect" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        InterfaceConnects
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/KeyboardColor" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        KeyboardColors
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/TypeKeyboard" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        TypeKeyboards
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/Product" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Products
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
        @endcan
        @can('admin',auth()->user())
            <li class="nav-item">
                <a href="/admin/User" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Users
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
        @endcan
        @can('adminWorker',auth()->user())
            <li class="nav-item">
                <a href="/admin/Order" class="nav-link">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Orders
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
            </li>
        @endcan
        @if ($define == 'Product')
            <form id="slideForm" onsubmit="submitingSlider(this)" method="post" enctype="multipart/form-data">
                <li class="nav-header">FILTER</li>
                <div name="title" class="slider_title">Model</div>
                <input name="title-model" class="form-control form-control-sidebar" placeholder="Model">
                <input name="withfilter" value="1" type="hidden" class="form-control form-control-sidebar">
                {{betweenInput('Count','count')}}
                {{betweenInput('Price','price')}}
                {{filterListOut($manufacturer,'Manufacturer','manufacturer_id')}}
                {{filterBoolOut('is_gaming','Yes','No','Is gaming')}}
                {{filterListOut($type_keyboard,'Type Keyboard','type_keyboard_id')}}
                {{filterBoolOut('type_connect','Wired','Unwired','TypeConnect')}}
                {{filterBoolOut('number_block','Yes','No','Number Block')}}
                {{filterListOut($interface_connect,'Interface Connect','interface_connect_id')}}
                {{betweenInput('Keys','keys')}}
                {{filterListOut($color_keys,'Color Keys','color_keys')}}
                {{filterListOut($keyboard_color,'Keyboard Color','keyboard_color_id')}}
                {{filterBoolOut('is_noising','Yes','No','Is noising')}}
                <div style="width: 100%;">
                    <button name="withfilter" value="1" style="margin-top: 10px;width: 100%;" type="submit"
                            class="btn btn-primary">Apply
                    </button>
                </div>
            </form>
        @endif
        @if ($define == 'User')
            <form id="slideForm" onsubmit="submitingSlider(this)" method="post" enctype="multipart/form-data">
                <li class="nav-header">FILTER</li>
                <input name="name-model" class="form-control form-control-sidebar" placeholder="Name">
                <input name="withfilter" value="1" type="hidden" class="form-control form-control-sidebar">
                    <?php unset($roles[0], $roles[2]) ?>
                {{filterListOut($roles,'Role','role_id')}}
                <div style="width: 100%;">
                    <button name="withfilter" value="1" style="margin-top: 10px;width: 100%;" type="submit"
                            class="btn btn-primary">Apply
                    </button>
                </div>
            </form>
        @endif
        @if($define == 'Order')
            <form id="slideForm" onsubmit="submitingSlider(this)" method="post" enctype="multipart/form-data">
                <li class="nav-header">FILTER</li>
                <input name="withfilter" value="1" type="hidden" class="form-control form-control-sidebar">
                {{filterDateOut('Date','delivery_date')}}
                <div style="width: 100%;">
                    <button name="withfilter" value="1" style="margin-top: 10px;width: 100%;" type="submit"
                            class="btn btn-primary">Apply
                    </button>
                </div>
            </form>
        @endif
    </ul>
</nav>
