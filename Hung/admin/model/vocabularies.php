<!--Admin:  ./mvc/model/products.php -->
<?php

class Vocabularies
{
    private $conn;

    function __construct()
    {
        $this->conn = new DB;
    }

    function getWords()
    {
        $sql = 'select * from words';
        return $this->conn->getAll($sql);
    }

    function getTopics()
    {
        $sql = 'select * from topics';
        return $this->conn->getAll($sql);
    }

    function getPartsOfSpeech()
    {
        $sql = 'select * from partsofspeech';
        return $this->conn->getAll($sql);
    }

    function getWordsTopics()
    {
        $sql = 'SELECT words.*, topics.topic_name, partsofspeech.part_of_speech_name FROM words
            JOIN topics ON words.topic_id=topics.topic_id
            JOIN partsofspeech ON words.part_of_speech_id = partsofspeech.part_of_speech_id
            ORDER BY words.word';
        return $this->conn->getAll($sql);
    }

    function getSearch($word)
    {
        $sql = "SELECT words.*, topics.topic_name, partsofspeech.part_of_speech_name FROM words
            JOIN topics ON words.topic_id=topics.topic_id
            JOIN partsofspeech ON words.part_of_speech_id = partsofspeech.part_of_speech_id
            WHERE words.word like '%$word%'";
        return $this->conn->getAll($sql);
    }

    function getWord($id)
    {
        $sql = 'select * from words where word_id=' . $id;
        return $this->conn->queryId($sql);
    }

    function getNewWords($top)
    {
        $sql = 'select * from words order by created desc limit ' . $top;
        return $this->conn->getAll($sql);
    }



    //admin
    //insert products
    function insWords($data)
    {
        $sql = "insert into words(word, transcription, meaning, example_sentence, part_of_speech_id, topic_id) values(?,?,?,?,?,?)";
        $params = [$data['word'], $data['transcription'], $data['meaning'], $data['example_sentence'], $data['part_of_speech_id'], $data['topic_id']];
        return $this->conn->query($sql, $params);
    }

    //update products
    function updWords($id, $data)
    {
        $sql = "update words set word=?, meaning=?, example_sentence=?, part_of_speech_id=?, topic_id=?, where word_id=?";
        $params = [$data['word'], $data['meaning'], $data['example_sentence'], $data['part_of_speech_id'], $data['topic_id'], $id];
        return $this->conn->query($sql, $params);
    }

    //delete a products where ID
    function delWords($id)
    {
        $sql = "delete from words where word_id = ?";
        return $this->conn->query($sql, [$id]);
    }


    // insert topics
    function insTopic($data)
    {
        $sql = "insert into topics(topic_name) value(?)";
        $params = [$data['topic_name']];
        return $this->conn->query($sql, $params);
    }
    // insert sentence
    function insSentence($data)
    {
        $sql = "insert into sentences(sentence, meaning) values(?,?)";
        $params = [$data['sentence'], $data['meaning']];
        return $this->conn->query($sql, $params);
    }
}
