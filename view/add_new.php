<?php
    add_action("init","add_style_and_script");
    function add_style_and_script(){
        wp_enqueue_script("datatablejs","https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js");
        wp_enqueue_script("bootsrapjs","https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");
        wp_enqueue_script("scriptjs",plugin_dir_url.'\assets\js\script.js',"",true);

        wp_enqueue_style("custom_style",plugin_dir_url.'\assets\css\style.css');
        wp_enqueue_style("bootstrap_style","https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
        wp_enqueue_style("datatable_style","https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css");
    }
?>