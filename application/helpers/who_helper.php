<?php 

function who(){
    date_default_timezone_set('Asia/Jakarta');

    $ci = get_instance();
    if(!$ci->session->userdata('email_user')){
        redirect('auth');
    }
}

?>