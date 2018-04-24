<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ceres</title>
  </head>
  <script src="../js/phpFunctions.js"></script>
  <script>

  var tagList = [];
  function Tag(tagID, tagName, tagType) {
    this.tagID = tagID;
    this.tagName = tagName;
    this.tagType = tagType;
  }

  function checkTag() {
    var text = document.getElementById("txtSearch").value;
    var tagButtons = document.getElementById("suggestedTags");
    tagButtons.innerHTML = "";
    if (text != "") {
      var possibleTags = callPost("getTagList.php", "t=" + text);
      var wordList = possibleTags.split(",");
      var option;
      if (wordList.length > 33) {
        wordList.length = 33;
      }
      for (var i = 0; i < wordList.length - 3; i += 3) {
        var button = document.createElement("button");
        var type = wordList[i];
        var id = wordList[i+1];
        var name = wordList[i+2];
        button.id = id;
        button.innerHTML = name;
        button.name = type;
        button.onclick = function() {selectTag(this);};
        tagButtons.appendChild(button);
      }
    }
  }

  function selectTag(element) {
    var tagButtons = document.getElementById("tagList");
    var button = document.createElement("button");
    button.id = element.id;
    button.innerHTML = element.innerHTML;
    button.name = element.name;
    var newTag = new Tag(element.id, element.innerHTML, element.name);
    tagList.push(newTag);
    button.onclick = function() {removeTag(this);};
    tagButtons.appendChild(button);
    document.getElementById("txtSearch").value = "";
    checkTag();
    console.log(tagList);
  }

  function removeTag(element) {
    var removeIndex = tagList.map(function(tag) { return tag.name; }).indexOf(element.innerHTML);
    tagList.splice(removeIndex, 1);
    element.parentNode.removeChild(element);
    console.log(tagList.name);
  }

  function search() {
    if (tagList.length == 0) {
      alert("Please input a set of search terms");
    } else {
//      callStr =
    }
  }

  </script>

  <body>
    <div id="tagList"><input type="text" id="txtSearch" onkeyup="checkTag()" placeholder="Search for a recipe"></input></div>
    <div id="suggestedTags"></div>
    <button id="btnSearch" onclick="search()">Search</button>
  </body>
</html>
