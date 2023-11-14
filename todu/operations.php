<?php

function inputField($label, $type, $name, $pattern, $maxlength, $placeholder){
  $ele="
  <div class=\"form-group my-4\">
  <label>$label</label>
  <input type='$type' name='$name' class=\"form-control\" 
  pattern='$pattern' maxlength='$maxlength' placeholder='$placeholder' required>
</div>
  ";
  echo $ele;
}

function inputFields($placeholder, $name, $value, $type){
  $ele="
  <div class=\"form-group my-4\">
  <input type='$type' name='$name' placeholder='$placeholder' 
  class=\"form-control\" value='$value' autocomplete=\"off\">
</div>
  ";
  echo $ele;
}


function inputGallery($placeholder, $name, $value, $type){
  $ele="
  <div class=\"form-group my-4\">
  <input type='$type' name='$name' placeholder='$placeholder' 
  class=\"form-control\" value='$value' autocomplete=\"off\" multiple>
</div>
  ";
  echo $ele;
}



?>