<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class KernelService extends AbstractController  
{
    public function loadProfile(UploadedFile $file)
    {
        $files_directory = $this->getParameter('profile_directory');
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
        $file->move($files_directory, $fileName);
        

        return $fileName;
    }

    public function loadProfileDevice(UploadedFile $file)
    {
        $device_directory = $this->getParameter('Device_directory');
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();
        $file->move($device_directory, $fileName);
        

        return $fileName;
    }
}