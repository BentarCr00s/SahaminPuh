<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateToggleDislikeFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE FUNCTION toggle_dislike(p_comment_id INT, p_user_id INT) RETURNS BOOLEAN
            BEGIN
                DECLARE v_is_like BOOLEAN;

                SELECT is_like INTO v_is_like
                FROM comment_likes
                WHERE comment_id = p_comment_id AND user_id = p_user_id;

                IF v_is_like IS NULL THEN
                    INSERT INTO comment_likes (comment_id, user_id, is_like)
                    VALUES (p_comment_id, p_user_id, FALSE);
                    UPDATE comments SET dislikes_count = dislikes_count + 1 WHERE id = p_comment_id;
                    RETURN TRUE;
                ELSEIF v_is_like = FALSE THEN
                    DELETE FROM comment_likes
                    WHERE comment_id = p_comment_id AND user_id = p_user_id;
                    UPDATE comments SET dislikes_count = dislikes_count - 1 WHERE id = p_comment_id;
                    RETURN FALSE;
                ELSE
                    UPDATE comment_likes
                    SET is_like = FALSE
                    WHERE comment_id = p_comment_id AND user_id = p_user_id;
                    UPDATE comments SET likes_count = likes_count - 1, dislikes_count = dislikes_count + 1 WHERE id = p_comment_id;
                    RETURN TRUE;
                END IF;
            END ;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION IF EXISTS toggle_dislike');
    }
}
