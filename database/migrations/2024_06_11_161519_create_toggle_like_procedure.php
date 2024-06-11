<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateToggleLikeProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE toggle_like(IN p_comment_id INT, IN p_user_id INT)
            BEGIN
                DECLARE v_is_like BOOLEAN;

                SELECT is_like INTO v_is_like
                FROM comment_likes
                WHERE comment_id = p_comment_id AND user_id = p_user_id;

                IF v_is_like IS NULL THEN
                    INSERT INTO comment_likes (comment_id, user_id, is_like)
                    VALUES (p_comment_id, p_user_id, TRUE);
                    UPDATE comments SET likes_count = likes_count + 1 WHERE id = p_comment_id;
                ELSEIF v_is_like = TRUE THEN
                    DELETE FROM comment_likes
                    WHERE comment_id = p_comment_id AND user_id = p_user_id;
                    UPDATE comments SET likes_count = likes_count - 1 WHERE id = p_comment_id;
                ELSE
                    UPDATE comment_likes
                    SET is_like = TRUE
                    WHERE comment_id = p_comment_id AND user_id = p_user_id;
                    UPDATE comments SET likes_count = likes_count + 1, dislikes_count = dislikes_count - 1 WHERE id = p_comment_id;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS toggle_like');
    }
}
