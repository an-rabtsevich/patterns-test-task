<?php

require_once 'DBConnection.php';

/** defines methods of Posts and Articles Factories */
interface ContentAbstractFactory
{
    public function createContent($arrayOfFields);
}

/** implements post creation */
class PostsFactory implements ContentAbstractFactory
{
    public function createContent($arrayOfFields)
    {
        return new Post($arrayOfFields);
    }
}

/** implements article creation */
class ArticlesFactory implements ContentAbstractFactory
{
    public function createContent($arrayOfFields)
    {
        return new Article($arrayOfFields);
    }
}

/** defines methods of Posts and Articles Classes */
interface Content
{
    public function __construct($arrayOfFields);
    public function saveIntoDb();
    public function getContent();
}

/** create a post and save it into db */
class Post implements Content
{
    private $writerName;
    private $text;
    private $createdAt;

    public function __construct($arrayOfFields)
    {
        foreach ($arrayOfFields as $key => $value) {
            $this->$key = $value;
        }
        $this->saveIntoDb();
    }
    public function getContent()
    {
        $post = $this->writerName . PHP_EOL . $this->text . PHP_EOL . $this->createdAt;
        return $post;
    }

    public function saveIntoDb()
    {
        global $db;
        $query = "INSERT INTO `posts` (`post_id`, `writer_name`, `text`, `created_at`) VALUES (NULL, '$this->writerName', '$this->text', '$this->createdAt')";
        return $db->connection->query($query);
    }
}

/** create an article and save it into db */
class Article implements Content
{
    private $writerName;
    private $keywords;
    private $header;
    private $text;
    private $createdAt;

    public function __construct($arrayOfFields)
    {
        foreach ($arrayOfFields as $key => $value) {
            $this->$key = $value;
        }
        $this->saveIntoDb();
    }

    public function getContent()
    {
        $article = $this->writerName . PHP_EOL . $this->keywords . PHP_EOL . $this->header . PHP_EOL . $this->text . PHP_EOL . $this->createdAt;
        return $article;
    }

    public function saveIntoDb()
    {
        global $db;
        $query = "INSERT INTO `articles` (`article_id`, `writer_name`, `keywords`, `header`, `text`, `created_at`) VALUES (NULL, '$this->writerName', '$this->keywords', '$this->header', '$this->text', '$this->createdAt')";
        return $db->connection->query($query);
    }
}

$db = new DBConnection();

$postsAbstractFactory = new PostsFactory();
$articlesAbstractFactory = new ArticlesFactory();

$postInfo = [
    'writerName' => 'Geralt', 
    'text' => "another day at witchers work", 
    'createdAt' => date('Y-m-d')
];
$post = $postsAbstractFactory->createContent($postInfo);
var_dump($post->getContent());

$articleInfo = [
    'writerName' => 'Severus Snape', 
    'keywords' => "magic, double agent", 
    'header' => "what is it like to be a double agent", 
    'text' => "some text", 
    'createdAt' => date('Y-m-d')
];
$article = $articlesAbstractFactory->createContent($articleInfo);
var_dump($article->getContent());

?>