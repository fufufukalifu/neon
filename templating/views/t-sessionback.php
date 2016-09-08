<?php

if (empty($this->session->userdata['HAKAKSES'])) {
    header("location:" . base_url());
} else {
    
}
?>