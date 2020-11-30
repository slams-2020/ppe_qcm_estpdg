<?php
namespace controllers\crud\viewers;

use Ubiquity\controllers\crud\viewers\ModelViewer;
 /**
  * Class GroupControllerViewer
  */
class GroupControllerViewer extends ModelViewer{
    public function getFormCaptions($captions, $className, $instance){
        return ['Titre','Id','Name','Je sais pas','Createur'];
    }
}
