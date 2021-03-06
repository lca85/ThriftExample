<?php
namespace ThriftSampleBundle\Util;

/**
 * Autogenerated by Thrift Compiler (0.9.3)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class FileInf {
  static $_TSPEC;

  /**
   * @var string
   */
  public $FileName = null;
  /**
   * @var string
   */
  public $extension = null;
  /**
   * @var bool
   */
  public $isDir = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'FileName',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'extension',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'isDir',
          'type' => TType::BOOL,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['FileName'])) {
        $this->FileName = $vals['FileName'];
      }
      if (isset($vals['extension'])) {
        $this->extension = $vals['extension'];
      }
      if (isset($vals['isDir'])) {
        $this->isDir = $vals['isDir'];
      }
    }
  }

  public function getName() {
    return 'FileInf';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->FileName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->extension);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->isDir);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('FileInf');
    if ($this->FileName !== null) {
      $xfer += $output->writeFieldBegin('FileName', TType::STRING, 1);
      $xfer += $output->writeString($this->FileName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->extension !== null) {
      $xfer += $output->writeFieldBegin('extension', TType::STRING, 2);
      $xfer += $output->writeString($this->extension);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->isDir !== null) {
      $xfer += $output->writeFieldBegin('isDir', TType::BOOL, 3);
      $xfer += $output->writeBool($this->isDir);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


