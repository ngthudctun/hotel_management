<?php
include './model/vocabularies.php';
$vocabularies = new Vocabularies();
$AllWords = $vocabularies->getWords();
$getWordsTopics = $vocabularies->getWordsTopics();
$getTopics = $vocabularies->getTopics();
$getPartsOfSpeech = $vocabularies->getPartsOfSpeech();
if(isset($_POST['word'])){
    $getSearch = $vocabularies->getSearch($_POST['word']);
}