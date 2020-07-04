<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2020/4/27 0027
 * Time: 11:05
 */

namespace EasySwoole\UEditor;


use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\UEditor\Config\CatcherConfig;

abstract class UEditorController extends Controller
{
    protected $rootPath = EASYSWOOLE_ROOT . '/Static';

    /** @var UEditor */
    protected $UEditor;

    public function __construct(array $configList = [])
    {
        $this->UEditor = new UEditor($this->rootPath);
        $this->UEditor->setConfigList($configList);
        parent::__construct();
    }

    function index()
    {
        $action = $this->request()->getRequestParam('action');
        $this->runAction($action);
    }


    protected function runAction($actionName)
    {
        switch ($actionName) {
            case "config":
                $this->config();
                break;
            case "uploadImage":
                $this->uploadImage();
                break;
            case "uploadScrawl":
                $this->uploadScrawl();
                break;
            case "catchImage":
                $this->catchImage();
                break;
            case "uploadVideo":
                $this->uploadVideo();
                break;
            case "uploadFile":
                $this->uploadFile();
                break;
            case "listImage":
                $this->listImage();
                break;
            case "listFile":
                $this->listFile();
                break;

        }

    }

    protected function catchImage()
    {
        $catchImageConfig = new CatcherConfig();
        $field = $catchImageConfig->getCatcherFieldName();
        $remoteList = $this->request()->getRequestParam($field);
        $result = $this->UEditor->catchImage($catchImageConfig, $remoteList);
        $this->response()->write(json_encode($result));
    }

    protected function uploadImage()
    {
        $result = $this->UEditor->uploadImage($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadScrawl()
    {
        $result = $this->UEditor->uploadScrawl($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadVideo()
    {
        $result = $this->UEditor->uploadVideo($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function uploadFile()
    {
        $result = $this->UEditor->uploadFile($this->request());
        $this->response()->write(json_encode($result));
    }

    protected function listImage()
    {
        $result = $this->UEditor->listImage();
        $this->response()->write(json_encode($result));
    }

    protected function listFile()
    {
        $result = $this->UEditor->listFile();
        $this->response()->write(json_encode($result));
    }

    protected function config()
    {
        $this->response()->write(json_encode($this->UEditor->getConfig()));
    }
}
