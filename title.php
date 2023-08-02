<?php
    $url = $_SERVER['REQUEST_URI'];
    $url_explode = explode('/', $url);

    if(in_array('users', $url_explode)) {
        $sc_title = end($url_explode);
        $sc_title_explode = explode('.', $sc_title);

        if(in_array('users-table', $sc_title_explode)) {
            $title = "Users | Dashboard";
        }elseif(in_array('user-profile', $sc_title_explode)) {
            $title = "User Profile | Dashboard";
        }elseif(in_array('edit_user', $sc_title_explode)) {
            $title = "User Edit | Dashboard";
        }
    }elseif(in_array('main_logo.php', $url_explode)) {
        $title = "Main Logo | Dashboard";
    }elseif(in_array('footer_logo.php', $url_explode)) {
        $title = "Footer Logo | Dashboard";
    }elseif(in_array('main_menu.php', $url_explode)) {
        $title = "Main Menu | Dashboard";
    }elseif(in_array('footer-content.php', $url_explode)) {
        $title = "Footer Content | Dashboard";
    }elseif(in_array('hero_area.php', $url_explode)) {
        $title = "Hero Area | Dashboard";
    }elseif(in_array('inbox.php', $url_explode)) {
        $title = "Inbox | Dashboard";
    }elseif(in_array('inbox', $url_explode)) {
        $sc_title = end($url_explode);
        $sc_title_explode = explode('.', $sc_title);

        if(in_array('message_view', $sc_title_explode)) {
            $title = "Message | Dashboard";
        }
    }elseif(in_array('sections.php', $url_explode)) {
        $title = "Sections | Dashboard";
    }elseif(in_array('expertise.php', $url_explode)) {
        $title = "Expertise | Dashboard";
    }elseif(in_array('portfolio.php', $url_explode)) {
        $title = "Portfolio | Dashboard";
    }else {
        $title = "Dashboard";
    }
    

