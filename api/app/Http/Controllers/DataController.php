<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    private $spreadsheetId = '1pNDIjMFe2rb71ManHKpln_Y4mTdiocHrXgFn2pcBNB8';
    private $defaultSheetName = '2026 MIS';

    public function getSheetData()
    {
        list($sheetName, $lastCol) = $this->getSheetMetadata();

        $range = "{$sheetName}!A2:{$lastCol}";

        return $this->fetchData($range);
    }

    public function getSheetHeaders()
    {
        list($sheetName, $lastCol) = $this->getSheetMetadata();

        $range = "{$sheetName}!A1:{$lastCol}1";

        return $this->fetchData($range);
    }

    private function getSheetMetadata()
    {
        $apiKey = config('services.google.sheets_key');

        $metaResponse = Http::get("https://sheets.googleapis.com/v4/spreadsheets/{$this->spreadsheetId}", [
            'key' => $apiKey
        ]);

        if ($metaResponse->successful()) {
            $sheets = $metaResponse->json()['sheets'];

            $sheet = collect($sheets)->firstWhere('properties.title', $this->defaultSheetName) ?? $sheets[0];
            $sheetName = $sheet['properties']['title'];

            $colCount = $sheet['properties']['gridProperties']['columnCount'];
            $lastCol = $this->getColumnLetter($colCount);

            return [$sheetName, $lastCol];
        }

        return [$this->defaultSheetName, 'Z'];
    }

    private function fetchData($range)
    {
        $apiKey = config('services.google.sheets_key');

        $response = Http::get("https://sheets.googleapis.com/v4/spreadsheets/{$this->spreadsheetId}/values/{$range}", [
            'key' => $apiKey
        ]);

        if ($response->successful()) {
            return $response->json()['values'];
        }

        return response()->json(['error' => 'Unable to fetch data', 'details' => $response->json()], 500);
    }

    private function getColumnLetter($index)
    {
        $letter = '';
        while ($index > 0) {
            $temp = ($index - 1) % 26;
            $letter = chr(65 + $temp) . $letter;
            $index = intval(($index - $temp - 1) / 26);
        }
        return $letter;
    }
}
