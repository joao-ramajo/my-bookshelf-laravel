<?php

namespace App\Services;

use App\Models\Review;
use App\Models\User;

class ReviewService
{
    public static function getComment(Review $review): array
    {
        $username = User::where('id', $review->user_id)->value('username');
        $comment = $review->comment;
        $note = $review->note;

        return [
            'id' => $review->id,
            'username' => $username,
            'comment' => $comment,
            'note' => $note
        ];
    }
}
