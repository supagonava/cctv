<?php

namespace common\models;

use Yii;
use \yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

class MyFileUpload
{
    public $upload_folder = '';
    public $imageTypes = ["jpeg", "png", "jpg"];
    public $docTypes = ['docx', 'pdf', 'doc', 'xlxs', 'csv'];

    public function  UploadImage($instanceName, $to)
    {
        $data = [];
        $this->upload_folder =  $to ?? 'images';
        $image = UploadedFile::getInstanceByName($instanceName);
        $path = $this->getUploadPath();
        if (!empty($image) && in_array($image->extension, $this->imageTypes)) {
            $fileName = $image->basename . date('YmdHis') . '.' . $image->extension;
            if ($image->saveAs($path . $fileName)) {
                Image::getImagine()->open(($path . $fileName))->thumbnail(new Box(1000, 1000))->save($path . "thm" . $fileName);
                unlink($path . $fileName);
                $data['data'] = $this->upload_folder . "/thm$fileName";
                $data['status'] = "อัปโหลดสำเร็จ";
                return $data;
            }
            $data['data'] = null;
            $data['status'] = 'โปรดตรวจสอบชนิดของไฟล์ก่อนทำการอัปโหลด ไฟล์ที่รองรับได้แก่' . " jpeg png jpg";
            return $data;
        }
        $data['data'] = null;
        $data['status'] = 'โปรดตรวจสอบชนิดของไฟล์ก่อนทำการอัปโหลด ไฟล์ที่รองรับได้แก่' . " jpeg png jpg";
        return $data;
    }

    public function UploadDoc($instanceName, $to)
    {
        $this->upload_folder = $to ?? 'doc';
        $image = UploadedFile::getInstanceByName($instanceName);
        $path = $this->getUploadPath();
        if (!empty($image) && in_array($image->extension, $this->docTypes)) {
            $fileName = $image->basename . date('YmdHis') . '.' . $image->extension;
            if ($image->saveAs($path . $fileName)) {
                $data['data'] = $this->upload_folder . "/$fileName";
                $data['status'] = "อัปโหลดสำเร็จ";
                return $data;
            }
            $data['data'] = null;
            $data['message'] = 'โปรดตรวจสอบชนิดของไฟล์ก่อนทำการอัปโหลด ไฟล์ที่รองรับได้แก่' . " 'docx', 'pdf', 'doc', 'xlxs', 'csv'";
            return $data;
        }
        $data['data'] = null;
        $data['message'] = 'โปรดตรวจสอบชนิดของไฟล์ก่อนทำการอัปโหลด ไฟล์ที่รองรับได้แก่' . " 'docx', 'pdf', 'doc', 'xlxs', 'csv'";
        return $data;
    }

    public function getUploadPath()
    {
        return SiteInfo::backendWebroot() . $this->upload_folder . '/';
    }

    public static function removeFile($fullPath)
    {
        try {
            unlink($fullPath);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return true;
    }
}
