<?php
if (!class_exists('My_Comment_Walker')) {

    class My_Comment_Walker extends Walker_Comment
    {

        protected function comment($comment, $depth, $args)
        {
            $comment_email = get_comment_author_email($comment);
            $gravatar = get_avatar($comment_email, 50);
            $GLOBALS['comment'] = $comment;

            echo '<li class="comment" id="comment-' . get_comment_ID() . '">';

            echo '<div class="comment-body">';
            echo '<div class="comment-authorinfo">';

            if (get_option('show_avatars', true) && $gravatar) {
                echo '<div class="comment-authorimage">' . $gravatar . '</div>';
            }

            if (get_comment_author_url()) {
                echo '<span class="comment-authorname">';
                echo '<a href="' . get_comment_author_url() . '" rel="external nofollow ugc" class="comment-authorurl url">';
                echo get_comment_author();
                echo '</a></span>';
            } else {
                echo '<span class="comment-authorname">' . get_comment_author() . '</span>';
            }

            echo '<span class="comment-date">' . get_comment_date() . '</span>';
            echo '</div>';

            echo '<p class="comment-text">';
            echo comment_text();

            if ('0' == $comment->comment_approved) {
                echo '<span class="comment-awaiting-moderation label label-info">' . __('Kommenttisi odottaa moderointia!') . '</span>';
            }

            echo '</p>';

            echo get_comment_reply_link(array(
                'add_below'  => true,
                'respond_id' => 'respond',
                'reply_text' => __('Vastaa'),
                'depth'      => $depth,
                'max_depth'  => $args['max_depth'],
                'before'     => '<div class="reply">',
                'after'      => '</div>'
            ));

            echo '</div>';
        }


        public function end_el(&$output, $comment, $depth = 0, $args = array())
        {
            $output .= '</li>';
        }
    }
}
