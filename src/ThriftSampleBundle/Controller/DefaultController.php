<?php

namespace ThriftSampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        return $this->render('ThriftSampleBundle:Default:index.html.twig');
    }
    public function loadDirAction()
    {
       // exit($this->get('request')->request->get('dir'));
        $openFileService=  $this->get("thrift_sample.openFile");
        $result=$openFileService->listFolder(urldecode($this->get('request')->request->get('dir')));
        
        
        
        return $this->render('ThriftSampleBundle:Default:dirContent.html.twig',array(
            'result'=>$result
        ));
    }
    public function openFileAction()
    {
       // exit($this->get('request')->request->get('dir'));
        $openFileService=  $this->get("thrift_sample.openFile");
        
        $openFileService->openFile(urldecode($this->get('request')->request->get('filename')),"");
        
        
        
        return new \Symfony\Component\HttpFoundation\JsonResponse("OK");
    }
}
