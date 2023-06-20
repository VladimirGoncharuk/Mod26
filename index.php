<?php
class DeleteMetaElement {
 
    public static function deleteMetaElement(string $falename){
        $html = new DOMDocument();
        $html->loadHTMLFile($falename);
        $meta = $html->getElementsByTagName('meta');
        $title = $html->getElementsByTagName('title');  
        for ($i = $meta->length - 1; $i >= 0; $i--) { 
            if($meta[$i]-> attributes['name']->value === "keywords"||$meta[$i]-> attributes['name']->value === "description"){
             $meta->item($i)->parentNode->removeChild($meta->item($i));
         }
        }
        for ($i = $title->length - 1; $i >= 0; $i--) {   
             $title->item($i)->parentNode->removeChild($title->item($i));   
        }
     $html->saveHTMLFile($falename);  
    }
}

DeleteMetaElement::deleteMetaElement('iteratorAction.html');