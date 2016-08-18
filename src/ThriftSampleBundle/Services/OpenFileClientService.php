<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpenFileClientService
 *
 * @author lisbey
 */
namespace ThriftSampleBundle\Services;
use ThriftSampleBundle\Util\OpenFileServiceClient;
use ThriftSampleBundle\Util\FileInf;
use Thrift\Transport\TSocket;
use Thrift\Transport\TBufferedTransport;
use Thrift\Protocol\TBinaryProtocol;
use Symfony\Component\HttpFoundation\RequestStack;
class OpenFileClientService {
    private $request;
    private $transport;
    private $client;
    public function setRequest(RequestStack $request_stack)
    {
        $this->request = $request_stack->getCurrentRequest();
    }
    private function openConnection() {
        
            // Create a thrift connection (Boiler plate)
            $socket = new TSocket($this->request->getClientIp(), '9090');

            $this->transport = new TBufferedTransport($socket);
            $protocol = new TBinaryProtocol($this->transport);

            // Create a calculator client
            $this->client = new OpenFileServiceClient($protocol);

            // Open up the connection
            $this->transport->open();
        
    }
    public function openFile($path,$extension) {
        try {
            $this->openConnection();


            $fileInfo=new FileInf();
                $fileInfo->FileName=$path;
                $fileInfo->extension=$extension;
            // Perform operation on the server
            $this->client->openFile($fileInfo,null);

            // And finally, we close the thrift connection
            $this->transport->close();

        } 

        catch (\Exception $tx) {
            // a general thrift exception, like no such server
            echo "ThriftException: ".$tx->getMessage()."\r\n";
        }
    }
    public function listFolder($path) {
        try {
            $this->openConnection();
            // Perform operation on the server
            $result=$this->client->listFolder($path);
           
            // And finally, we close the thrift connection
            $this->transport->close();
            return $result;
        } 

        catch (\Exception $tx) {
            // a general thrift exception, like no such server
            echo "ThriftException: ".$tx->getMessage()."\r\n";
        }
    }
}
