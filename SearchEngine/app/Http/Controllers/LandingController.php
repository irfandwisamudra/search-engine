<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LandingController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');
        $rank = $request->input('rank');

        $process = new Process(["C:\Users\Huawei Indonesia\AppData\Local\Programs\Python\Python311\python.exe", "query.py", "indexdb", $rank, $query]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $list_data = array_filter(explode("\n", $process->getOutput()));

        $data = array();

        foreach ($list_data as $book) {
            $dataj =  json_decode($book, true);
            array_push($data, '
            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card h-100">
                    <div class="row g-0 h-100">
                        <div class="col-4">
                            <img src="http://books.toscrape.com/' . $dataj['image'] . '" class="img-fluid rounded-start h-100 w-100" alt="' . $dataj['title'] . '">
                        </div>
                        <div class="col-8">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><a target="_blank" href="http://books.toscrape.com/catalogue/' . $dataj['url'] . '">' . $dataj['title'] . '</a></h5>
                                <p class="card-text text-success">Price: ' . $dataj['price'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ');
        }
        return response()->json($data);
    }
}
