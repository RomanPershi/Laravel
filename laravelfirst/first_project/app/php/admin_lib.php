<?php
function characterListOut($fieldTable, $product, $table_select, $text_part, $name)
{
    $result = " <div class='characteristics_part'>
                        <div class='text_part'>" . $text_part . "</div>
                        <select name='" . $name . "' class='select_product'>
                            <option value='" . $product->$fieldTable->id . "'>" . $product->$fieldTable->title . "</option>
                            ";
    foreach ($table_select as $table_part) {
        if ($table_part->id != $product->$fieldTable->id) {
            $result = $result . "<option value='" . $table_part->id . "'>" . $table_part->title . "</option>";
        }
    }
    $result = $result . "  </select>
                    </div>";
    echo $result;
}

function characterBoolOut($fieldTable, $product, $first_value, $second_value, $text_part)
{
    echo "<div class='characteristics_part'>
              <div class='text_part'>" . $text_part . "</div>
              <select name='" . $fieldTable . "' class='select_product'>
              <option value=" . $product->$fieldTable . ">" . ($product->$fieldTable == 0 ? $first_value : $second_value) . "</option>
              <option value=" . ($product->$fieldTable == 0 ? 1 : 0) . ">" . ($product->$fieldTable == 0 ? $second_value : $first_value) . "</option>
              </select>
              </div>";

}

function constructListProduct($table, $label, $name)
{
    $result = "<label>" . $label . "</label>" .
        "<select name=" . $name . " class='form-control'>";
    foreach ($table as $some_table_part)
        $result = $result . "<option value =" . $some_table_part->id . ">" . $some_table_part->title . "</option>";
    echo $result . "</select>";
}

function constructBoolProduct($label, $name)
{
    echo "<label>" . $label . "</label>" .
        "<select name=" . $name . " class='form-control'>
            <option value='0'>No</option>
            <option value='1'>Yes</option>
        </select>";
}

function getStatus($status, $first, $second)
{
    if ($status == 1)
        return $first;
    if ($status == 2)
        return $second;
}

function characterShopOut($column, $text_part)
{
    echo "<div class='characteristics_part'>
              <div class='text_part'>" . $text_part . "</div>
                    <div class='select_product'>" . $column . "</div>
              </div>";

}

function characterShopBoolOut($column, $text_part, $value1, $value2)
{
    $value = $column == 1 ? $value1 : $value2;
    echo "<div class='characteristics_part'>
              <div class='text_part'>" . $text_part . "</div>
                    <div class='select_product'>" . $value . "</div>
              </div>";

}
