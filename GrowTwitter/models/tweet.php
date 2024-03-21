<?php


class Tweet
{
    private $id;
    private $content;
    private $userId;
    private $likes;

    public function __construct($content, $userId)
    {
        $this->id = uniqid();
        $this->content = $content;
        $this->userId = $userId;
        $this->likes = [];
    }

    public function addLike($userId)
    {
        $this->likes[] = $userId;
    }

    public function getLikes($users)
    {
        $numLikes = count($this->likes);
        if ($numLikes === 0) {
            return "";
        } else if ($numLikes === 1) {
            $firstLikerUsername = $this->getUsernameById($this->likes[0], $users);
            return "@{$firstLikerUsername} curtiu";
        } else {
            $firstLikerUsername = $this->getUsernameById($this->likes[0], $users);
            return "@{$firstLikerUsername} curtiu e " . ($numLikes - 1) . " outros";
        }
    }

    private function getUsernameById($userId, $users)
    {
        foreach ($users as $user) {
            if ($user->getId() === $userId) {
                return $user->getUsername();
            }
        }
        return null; 
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getContent()
    {
        return $this->content;
    }
}