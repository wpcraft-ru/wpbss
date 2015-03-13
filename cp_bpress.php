<?php
/*
Plugin Name: Systemo.biz Раздел техподдержки на базе BBPress
Plugin URI: http://systemo.biz
Description: BBpress portal
Version: 1.0.0
Author:  Systemo.biz
Author URI: http://systemo.biz
*/

add_filter( 'posts_where' , 'search_results_where');

function search_results_where($where) {
        global $wpdb;


        $user_idcp = get_current_user_id();
                        //проверка авторизован ли пользователь get_current_user_id() возвращает 0 если не аторизован
                if ( $user_idcp > 0 ) {
                        if (!bbp_is_search_results() AND !bbp_is_topic_archive() AND !bbp_is_single_forum() ) return $where;
                                //  если авторизованный пользователь не модератор или выше, то выдаем ему только его собственные темы форума
                        if ( !current_user_can( 'edit_others_posts' ) ) {

                                $ids = chek_reply_cp($user_idcp); //проверяем ответы из каких тем можно смотреть пользователю, далее вставляем ид этих тем в значениее ид родительской записи у ответа
                                $where .=  "AND IF($wpdb->posts.post_type IN ('topic'), $wpdb->posts.post_author = '$user_idcp', IF($wpdb->posts.post_type IN ('reply'), $wpdb->posts.post_parent IN ($ids), 1 )  )";
                        }
                                // если пользователь модератор и выше, то видит все темы форума
                        return $where;
                } else {
                        // тут вывод для не зарегистрированных пользователей, им нельзя видеть никакие темы форума, ни сами форумы
	   		$where .= "AND $wpdb->posts.post_type NOT IN ('topic','forum', 'reply')";
			return $where;
                }
}
// берем ид тем которые создал текущий пользователь, для правильного вывода ответов в поиске.
function chek_reply_cp($user_idcp){

        $posts_cp = get_posts( array(
                'numberposts'     => -1,
                'offset'          => 0,
                'author'          => $user_idcp,
                'orderby'         => 'post_date',
                'order'           => 'DESC',
                'post_type'       => 'topic',
                'post_status'     => 'any'
        ) );
        $ids=array();

        foreach($posts_cp as $post_cp){

                $id=$post_cp->ID;
                $ids[]=$id;
        }

        $my_ids = implode(",", $ids);

        return $my_ids;
}

//правильно расчитываем число тем в форуме
add_filter( 'bbp_get_forum_topic_count' , 'bbp_get_forum_topic_count_cp', 100, 2);

function bbp_get_forum_topic_count_cp($topics, $forum_id){

        if ( current_user_can( 'edit_others_posts' ) ) return $topics;

        $posts_cp = count_topic_cp($forum_id);

        $cnt = count($posts_cp);

        return $cnt;
}

add_filter( 'bbp_get_forum_post_count' , 'bbp_get_forum_post_count_cp', 100, 2);

//правильно расчитываем число сообщений в форуме
function bbp_get_forum_post_count_cp($topics, $forum_id){

        if ( current_user_can( 'edit_others_posts' ) ) return $topics;

        $posts_cp = count_topic_cp($forum_id);

        $cnt = count($posts_cp);

        foreach($posts_cp as $post_cp){

                $id=$post_cp->ID;
                $posts1_cp = get_posts( array(
                        'numberposts'     => -1,
                        'post_parent'     => $id,
                        'post_type'       => 'reply',
                        'post_status'     => 'any'
                ) );
                $cnt = $cnt + count($posts1_cp);
        }
        return $cnt;
}

add_filter( 'bbp_get_forum_reply_count' , 'bbp_get_podforum_post_count_cp', 100, 2);

//правильно расчитываем число сообщений в подфоруме
function bbp_get_podforum_post_count_cp($topics, $forum_id){

        if ( current_user_can( 'edit_others_posts' ) ) return $topics;

        $posts_cp = count_topic_cp($forum_id);

        $cnt = count($posts_cp);

        foreach($posts_cp as $post_cp){

                $id=$post_cp->ID;
                $posts1_cp = get_posts( array(
                        'numberposts'     => -1,
                        'post_parent'     => $id,
                        'post_type'       => 'reply',
                        'post_status'     => 'any'
                ) );
                $cnt = $cnt + count($posts1_cp);
        }
        return $cnt;
}


//функция получения тем по ид форума
function count_topic_cp($forum_id){

        $user_idcp = get_current_user_id();
        $posts_cp = get_posts( array(
                'numberposts'     => -1,
                'post_parent'     => $forum_id,
                'author'          => $user_idcp,
                'post_type'       => 'topic',
                'post_status'     => 'any'
        ) );
        return $posts_cp;
}