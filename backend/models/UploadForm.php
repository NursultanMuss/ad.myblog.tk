<?php
/**
 * Created by PhpStorm.
 * User: TOTOshKa
 * Date: 12.01.2017
 * Time: 21:49
 */

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}