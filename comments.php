<section class="section">
    <div class="wrapper">
        <h2>
            <?php
            if (!have_comments()) {
                echo "Ei kommentteja";
            } else if (get_comments_number() > 1) {
                echo get_comments_number() . " kommenttia";
            } else {
                echo get_comments_number() . " kommentti";
            }
            ?>
        </h2>

        <div class="comments-wrapper">

            <div class="comment-module">
                <ul>
                    <?php
                    wp_list_comments(
                        array(
                            'avatar_size' => 50,
                            'max_depth' => 3,
                            'walker' => new My_Comment_Walker(),
                        )
                    );
                    ?>
                </ul>

            </div>
        </div>

        <?php
        if (comments_open()) {
            // Required fields
            $req = get_option('require_name_email');
            $required_indicator = ' <span class="required">*</span>';
            $required_attribute = ' required="required"';

            // Define texts to different fields
            $comment_send = 'Lähetä';
            $comment_reply = 'Jätä vastaus';
            $comment_reply_to = 'Vastaa henkilön %s viestiin';
            $comment_author = 'Nimi';
            $comment_email = 'Sähköposti';
            $comment_body = 'Kirjoita kommenttisi';
            $comment_before = 'Sähköpostiosoitettasi ei julkaista.<br>Pakolliset kentät on merkitty *-merkillä.';
            $comment_abort = 'Peru vastaus';

            $comments_args = array(
                // Define Fields
                'fields' => array(
                    // Author field
                    'author' => sprintf(
                        '<div class="comments-flex-wrapper"><p class="comment-form-author">%s %s</p>',
                        sprintf(
                            '<label for="author">%s%s</label>',
                            __($comment_author),
                            ($req ? $required_indicator : '')
                        ),
                        sprintf(
                            '<input id="author" name="author" type="text" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
                            esc_attr($commenter['comment_author']),
                            ($req ? $required_attribute : '')
                        )
                    ),
                    // Email field
                    'email' => sprintf(
                        '<p class="comment-form-email">%s %s</p></div>',
                        sprintf(
                            '<label for="email">%s%s</label>',
                            __($comment_email),
                            ($req ? $required_indicator : '')
                        ),
                        sprintf(
                            '<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
                            ($html5 ? 'type="email"' : 'type="text"'),
                            esc_attr($commenter['comment_author_email']),
                            ($req ? $required_attribute : '')
                        )
                    ),
                ),
                // Redefine your own textarea (the comment body).
                'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body . '"></textarea></p>',
                // Change the title of send button
                'label_submit' => __($comment_send),
                // Change the title of the reply section
                'title_reply' => __($comment_reply),
                // Change the title of the reply section for replies
                'title_reply_to' => __($comment_reply_to),
                // Cancel Reply Text
                'cancel_reply_link' => __($comment_abort),
                // Message Before Comment
                'comment_notes_before' => __($comment_before),
                // Remove "Text or HTML to be displayed after the set of comment fields".
                'comment_notes_after' => '',
                // Submit button ID
                'id_submit' => 'comment-submit',
            );

            // Output the comment form with customized fields
            comment_form($comments_args);
        }
        ?>
    </div>
</section>