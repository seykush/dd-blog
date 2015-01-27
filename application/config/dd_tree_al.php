<?php
$config['main']['root_tag_open'] = '<ul data-parent-id="[parent_id]">';
$config['main']['root_tag_close'] = '</ul>';
$config['main']['child_tag_open'] = '<li data-id="[id]" data-name="[name]">'.
    '<div><span ><i></i> [name] </span>&nbsp'.
        '<div class="node-actions">'.
            '<a href="#" class="add-category" data-pk="[id]" data-toggle="modal" data-target="#categoryAddModal"><i class="glyphicon glyphicon-plus-sign"></i></a> '.
            '<a href="#" class="edit-category" data-pk="[id]" data-toggle="modal" data-target="#categoryEditModal"><i class="glyphicon glyphicon-pencil"></i></a> '.
            '<a href="javascript:void(0);" class="delete-category" data-pk="[id]"><i class="glyphicon glyphicon-trash"></i></a>'.
        '</div>'.
    '</div>';
$config['main']['child_tag_close'] = '</li>';

$config['multi_select']['root_tag_open'] = '<ul data-parent-id="[parent_id]">';
$config['multi_select']['root_tag_close'] = '</ul>';
$config['multi_select']['child_tag_open'] = '<li data-id="[id]" data-name="[name]">'.
    '<div><span ><i></i><span class="checkbox-wrapper"><input name="categories[]" value="[id]" type="checkbox" ></span><span> [name] </span></span>&nbsp'.
    '</div>';
$config['multi_select']['child_tag_close'] = '</li>';
