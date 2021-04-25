<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class JsonResponse implements \JsonSerializable
{
    const STATUS_SUCCESS = true;
    const STATUS_ERROR = false;

    private $data=[];
    private $error;
    private $success = false;


    public function __construct($data=[],string $error='')
    {
        if ($this->shouldBeJson($data)) {
            $this->data = $data;
        }
        $this->error=$error;
        $this->success=! empty($data);
    }



    /**
     * @return array
     */

    public function success($data = [])
    {
        $this->success = true;
        $this->data = $data;
        $this->error = '';
    }

    public function fail($error = '')
    {
        $this->success = false;
        $this->error = $error;
        $this->data = [];
    }

    private function shouldBeJson($content): bool
    {
        return $content instanceof Arrayable ||
            $content instanceof Jsonable ||
            $content instanceof \ArrayObject ||
            $content instanceof \JsonSerializable ||
            is_array($content);
    }


    public function jsonSerialize()
    {
        return [
            'success' => $this->success,
            'data' => $this->data,
            'error' => $this->error,
        ];
    }
}
