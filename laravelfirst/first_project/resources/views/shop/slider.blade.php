<?php include(app_path() . '/php/admin_lib_slider.php') ?>
<div class="search_menu">
    <div class="filter">
        <form id="slideForm" onsubmit="submitingSlider(this)" method="post" enctype="multipart/form-data">
            <div name="title" class="slider_title">Model</div>
            <input name="title-model" class="form-control form-control-sidebar" placeholder="Model">
            <input name="withfilter" value="1" type="hidden" class="form-control form-control-sidebar">
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
                        class="btn btn-light">Apply
                </button>
            </div>
        </form>
    </div>
</div>
