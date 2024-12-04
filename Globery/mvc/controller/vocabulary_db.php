<?php
include './mvc/model/vocabularies.php';
$vocabularies = new Vocabularies();
$AllWords = $vocabularies->getWords();
$getWordsTopics = $vocabularies->getWordsTopics();
$getTopics = $vocabularies->getTopics();
$getSentences = $vocabularies->getSentences();
$getPartsOfSpeech = $vocabularies->getPartsOfSpeech();
if(isset($_POST['word'])){
    $getSearch = $vocabularies->getSearch($_POST['word']);
}
if(isset($_POST['topic'])){
    $searchTopics = $vocabularies->searchTopics($_POST['topic']);
}
$getLimitWordsTopics = $vocabularies->getLimitWordsTopics(100);
