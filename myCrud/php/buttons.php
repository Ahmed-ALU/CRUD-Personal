<!-- This php file is direct, it is only for craeting the CRUD elements like the buttons and the input fields
instead of making it everytime in the html, in addition to make it easy for ourselves to call those elements anywhere
with no errors -->
<?php

function buttonTag($btnid, $styleclass, $text, $name, $attr){
    $btn = "
        <button name='$name' attr='$attr' class='$styleclass' id='$btnid'>$text</button>
    ";
    echo $btn;
}


function inputField($icon, $placeholder, $name, $value){
    $element = "    
        
        <div class=\"input-group mb-2\">
                        <div class=\"input-group-prepend\">
                            <div class=\"input-group-text bg-warning\">$icon</div>
                        </div>
                        <input type=\"text\" name='$name' value='$value' autocomplete=\"off\" placeholder='$placeholder' class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
                    </div>
    ";
    echo $element;
}