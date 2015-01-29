<?php
if ( ! empty($modals) && !is_array($modals)) {
    foreach($modals as $modal){
        echo $modal;
    }
}