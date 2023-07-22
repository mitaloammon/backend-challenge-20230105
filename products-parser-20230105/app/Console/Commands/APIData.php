<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductParser;
use Exception;


class APIData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:a-p-i-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle(): void
    {
        $json = file_get_contents('https://static.openfoodfacts.org/data/delta/index.txt');
        $list = explode("\n", $json);

        $products = array($list);
        foreach ($products as $value) {
            $url = 'https://challenges.coode.sh/food/data/json/products_0' . $value[0] . '.json.gz';
            $file_name = basename($url);
            if (file_put_contents('./' . $file_name, file_get_contents('compress.zlib://' . $url))) {

                try {
                    ProductParser::create(['./' . $file_name]);
                } catch (Exception $e) {
                    echo "Exceção: " . $e->getMessage() . "\n";
                }
            }
        }
    }
}
