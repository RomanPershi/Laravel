<?php
function filterBoolOut($fieldTable, $first_value, $second_value, $text_part)
{
    echo "
              <div class='slider_title'>" . $text_part . "</div>
              <select style='width:100%;color:#c2c7d0;' name='" . $fieldTable . "-bool' class='select_slider'>
              <option class='option_select' value='any'>Any</option>
              <option class='option_select' value=1>" . $first_value . "</option>
              <option class='option_select' value=0>" . $second_value . "</option>
              </select>
              ";

}

function betweenInput($slider_title, $name)
{
    echo "<div class='slider_title'>" . $slider_title . "</div>
            <div class='between_input'>
                <input name=". $name . "-countmin class='form-control form-control-sidebar' placeholder='From'>
                <div class='place_between'></div>
                <input name=" . $name . "-countmax class='form-control form-control-sidebar' placeholder='To'>
            </div>";
}

function filterListOut($table_select, $text_part,$column)
{
    $result = '<div class="big_list">';
    $result =  $result.'<div style="cursor: pointer;" class="slider_title">' . $text_part.'</div>';
    $result = $result.'<div class="list">';
    foreach ($table_select as $table_part)
    {
        $result = $result.'<div onclick="inputRadio(this)" class="checklist" type="checklist">';
        $result = $result.'<input type="radio" name = "'.$column.'-list'.$table_part->title.'" value = '.$table_part->id.' autocomplete="off">';
        $result = $result.'<span class="checkname">' . $table_part->title . '</span>';
        $result = $result.'</div>';
    }
    $result = $result.'</div></div>';
    echo $result;
}
function filterDateOut($slider_title, $name)
{
    echo "<div class='slider_title'>" . $slider_title . "</div>
            <div style='display: block;color: #fff;' class='between_input'>
                From
                <input type='date' name=". $name . "-countmin class='form-control form-control-sidebar' placeholder='From'>
                <div class='place_between'></div>
                To
                <input type='date' name=" . $name . "-countmax class='form-control form-control-sidebar' placeholder='To'>
            </div>";
}
