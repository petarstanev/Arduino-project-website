<?php
require_once("Models/Core/Model.php");
require_once("Models/SearchTime.php");
/**
 * Created by PhpStorm.
 * User: stb159
 * Date: 26/01/16
 * Time: 16:13
 */
class ExportToCSV extends Model
{
    var $HFTresults;
    var $tempResults;
   public function ExportToCSV(){
       parent::__construct();
       $this->HFTresults = $this->getHFTResults();
       $this->tempResults = $this->getTempResults();
   }

   public function exportAll(){
       $this->download_send_headers("data_export_" . date("Y-m-d") . ".csv");
       echo $this->generateCsv(array_merge($this->HFTresults,  $this->tempResults));
       die();
   }


    public function exportHFT(){
        $this->download_send_headers("data_export_" . date("Y-m-d") . ".csv");
        echo $this->generateCsv($this->HFTresults);
        die();
    }

    public function exportTemp(){
        $this->download_send_headers("data_export_" . date("Y-m-d") . ".csv");
        echo $this->generateCsv($this->tempResults);
        die();
    }

    function generateCsv($data )
    {
        var_dump($data);
        die();
        $delimiter = ',';
        $enclosure = '"';
        $contents='';
        $handle = fopen('php://temp', 'r+');

        foreach ($data as $line) {

            fputcsv($handle, $line, $delimiter, $enclosure);
        }
        rewind($handle);
        while (!feof($handle)) {
            $contents .= fread($handle, 8192);
        }
        fclose($handle);

        $contents = preg_replace("<pre .*\s . \/pre >", "", $contents);
       // $contents = preg_replace("\"", "", $contents);
        return $contents;
    }

    public function getHFTResults(){
        $sqlQuery = "SELECT *
                        FROM Sensors
                        INNER JOIN HFT
                        ON HFT.fk_nodeID = Sensors.nodeID;";


        $this->result = $this->db->query($sqlQuery);

        return $dataSet = $this->result->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }

    public function getTempResults()
    {
        $sqlQuery = "SELECT *
                        FROM Sensors
                        INNER JOIN Temp
                        ON Temp.fk_nodeID = Sensors.nodeID;";


        $this->result = $this->db->query($sqlQuery);

        return $dataSet = $this->result->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }

    function download_send_headers($filename)
    {
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");

        // force download
        //header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");

        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }
}