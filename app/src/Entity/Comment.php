<?php

namespace App\Entity;

use DateTime;
use Exception;

class Comment extends BaseEntity
{
    private int $comment_id;
    private DateTime $comment_date;
    private string $comment_content;
    private string $userFirstName;
    private int $user_id;
    private int $post_id;

    /**
     * @return int
     */
    public function getComment_id(): int
    {
        return $this->comment_id;
    }

    /**
     * @param int $comment_id
     * @return Comment
     */
    protected function setComment_id(int $comment_id): self
    {
        $this->comment_id = $comment_id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getComment_date(): DateTime
    {
        return $this->comment_date;
    }

    /**
     * @param string $comment_date
     * @return Comment
     * @throws Exception
     */
    public function setComment_date(string $comment_date): self
    {
        $this->comment_date = new DateTime($comment_date);
        return $this;
    }

    /**
     * @return string
     */
    public function getComment_content(): string
    {
        return $this->comment_content;
    }

    /**
     * @param string $comment_content
     * @return Comment
     */
    public function setComment_content(string $comment_content): self
    {
        $this->comment_content = $comment_content;
        return $this;
    }

    /**
     * @return int
     */
    public function getUser_id(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return Comment
     */
    public function setUser_id(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

        /**
     * @return string
     */
    public function getUserFirstName(): string
    {
        return $this->userFirstName;
    }

    /**
     * @param string $userFirstName
     * @return Comment
     */
    public function setUserFirstName(string $userFirstName): self
    {
        $this->userFirstName = $userFirstName;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getPost_id(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     * @return Comment
     */
    public function setPost_id(int $post_id): self
    {
        $this->post_id = $post_id;
        return $this;
    }
}