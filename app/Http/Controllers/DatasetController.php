<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SentimentEntry; // Ensure you create this model or use DB facade
use Illuminate\Support\Facades\DB;

class DatasetController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $path = $file->getRealPath();
        $data = array_map('str_getcsv', file($path));
        
        // Remove header if it exists (optional check)
        // array_shift($data); 

        $entries = [];

        foreach ($data as $row) {
            // Assuming the text to analyze is in the first column (index 0)
            $text = $row[0] ?? ''; 

            if (!empty($text)) {
                $sentiment = $this->analyzeSentiment($text);
                
                $entries[] = [
                    'original_text' => $text,
                    'sentiment_label' => $sentiment['label'],
                    'confidence_score' => $sentiment['score'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Bulk insert for performance
        DB::table('sentiment_entries')->insert($entries);

        return redirect()->back()->with('success', 'Dataset imported and analyzed successfully!');
    }

    // A simple internal function to simulate/mock the "Model"
    private function analyzeSentiment($text)
    {
        $text = strtolower($text);
        $positiveKeywords = ['good', 'great', 'excellent', 'happy', 'love', 'amazing', 'satisfied'];
        $negativeKeywords = ['bad', 'terrible', 'worst', 'sad', 'hate', 'angry', 'slow', 'poor'];

        $posCount = 0;
        $negCount = 0;

        foreach ($positiveKeywords as $word) {
            if (str_contains($text, $word)) $posCount++;
        }

        foreach ($negativeKeywords as $word) {
            if (str_contains($text, $word)) $negCount++;
        }

        if ($posCount > $negCount) {
            return ['label' => 'Positive', 'score' => 0.8 + ($posCount * 0.05)];
        } elseif ($negCount > $posCount) {
            return ['label' => 'Negative', 'score' => 0.8 + ($negCount * 0.05)];
        } else {
            return ['label' => 'Neutral', 'score' => 0.5];
        }
    }
}