<?php

namespace App\Helpers;

trait DictSeeder
{
    /**
     * @param $modelName
     * @param $filename
     * @return void
     */
    private function seedFromFile($modelName, $filename)
    {
        $jsonData = $this->parseFile($filename);
        foreach ($jsonData as $entityData) {
            $entityModel = new $modelName($entityData);
            $entityModel->save();
        }
    }

    /**
     * @param $filename
     * @return mixed
     */
    private function parseFile($filename): mixed
    {
        $data = file_get_contents(base_path('database/migrations/data/' . $filename));
        return json_decode($data, true);
    }


}
