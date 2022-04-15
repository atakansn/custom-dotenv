<?php

class Env
{

    private array|string $file;

    public function __construct(private string $fileName)
    {
        $this->file = array_merge(array_filter(file($fileName),'trim'));
    }

    public function getFileContent(): array
    {
        return $this->file;
    }

    public function getLineVarible(int $number = 0) : string
    {
        return $this->file[$number];
    }

    public function contentMerge()
    {
        return array_reduce($this->getFileContent(),[$this,'reduce'],[]);
    }

    public function reduce($lines,$line)
    {
        [$key,$value] = explode('=',$line);
        $lines[$key] = $value;

        return $lines;
    }

    public function getValue($name)
    {
        return $this->contentMerge()[$name] ?? null;
    }

    public function addVarible(string $key, string $value=null)
    {
        $a = strtoupper($key) . '=' . $value . "\n";

        return file_put_contents($this->fileName,$a,FILE_APPEND);
    }

    public function rmVarible(string $key)
    {
        return file_put_contents($this->fileName,str_replace($key.'='.$this->getValue($key),'',file_get_contents($this->fileName)));
    }







}